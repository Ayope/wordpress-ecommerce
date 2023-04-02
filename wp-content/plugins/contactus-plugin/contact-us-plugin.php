<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<?php

/*
 * Plugin Name: Contact Us Plugin
 * Description: A Plugin For Contact Us Page
 */
// Create the database table on plugin activation
function contact_us_plugin_activation() {
    global $wpdb;
    $table_name = $wpdb->prefix . "contact_us_messages";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        subject VARCHAR(100) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'contact_us_plugin_activation' );

// Drop the database table on plugin deactivation
function contact_us_plugin_deactivation() {
    global $wpdb;
    $table_name = $wpdb->prefix . "contact_us_messages";
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);
}
register_deactivation_hook( __FILE__, 'contact_us_plugin_deactivation' );


// Add the plugin menu to the WordPress admin dashboard
function contact_us_plugin_menu() {
    add_menu_page(
        'Contact Us Plugin',
        'Contact Us',
        'manage_options',
        'contact-us-plugin',
        'list_received_emails',
        'dashicons-email'
    );
}
add_action( 'admin_menu', 'contact_us_plugin_menu' );

// Display the plugin settings page
function contact_us_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h1>Contact Us Plugin</h1>
        <p>A simple contact us plugin for WordPress.</p>
        <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
            <input type="hidden" name="action" value="contact_us_plugin_submit" />
            <div>
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" pattern="^[a-zA-Z\s]+$" required />
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required />
            </div>
            <div>
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" name="subject" pattern="^[a-zA-Z0-9\s]+$" required />
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea class="form-control" name="message" required></textarea>
            </div>
            <button class="mt-3" type="submit">Send</button>
        </form>
    </div>
    <?php
}
function list_received_emails()
{
    global $wpdb;
    $results = $wpdb->get_results("SELECT * FROM `wp_contact_us_messages` ;");
    ?>

    <h5>Contact emails</h5>
    <table class="table">
        <?php if (count($results) < 1) { ?>
            <div class="alert alert-danger">
                you do not have any incoming messages yet!
            </div>
        <?php } else { ?>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Name</th>
                <th>Sublect</th>
                <th>Message</th>
            </tr>
        <?php }
        foreach ($results as $entry) { ?>
            <tr>
                <td><?= $entry->id ?></td>
                <td><?= $entry->email ?></td>
                <td><?= $entry->name ?></td>
                <td><?= $entry->subject ?></td>
                <td><?= $entry->message ?></td>
            </tr>
        <?php } ?>

    </table>
<?php
}
// Handle the form submission
function contact_us_plugin_submit() {
    global $wpdb;
    $name = sanitize_text_field( $_POST['name'] );
    $email = sanitize_email( $_POST['email'] );
    $subject = sanitize_text_field( $_POST['subject'] );
    $message = sanitize_textarea_field( $_POST['message'] );

    // Perform form validation using regular expressions
    if ( !preg_match("/^[a-zA-Z\s]+$/", $name) ) {    
        wp_die( 'Invalid name. Please enter a valid name.' );
    }
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        wp_die( 'Invalid email. Please enter a valid email address.' );
    }
    if ( !preg_match("/^[a-zA-Z0-9\s]+$/", $subject) ) {
        wp_die( 'Invalid subject. Please enter a valid subject.' );
    }

    // Insert the form data into the database
    $table_name = $wpdb->prefix . 'contact_us_messages';
    $data = array(
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    );
    $format = array( '%s', '%s', '%s', '%s' );
    $wpdb->insert( $table_name, $data, $format );

    // Display the success message
    if ($wpdb->insert_id) {
        wp_die( 
            '<h1>Thank you for your message. We will get back to you soon.</h1>
            <br>
            <a href="http://localhost/wordpress/e-commerce%20wordpress/index.php/shop/">go back</a>
            ' );

    } else {
        wp_die( 'Message sending failed. Please try again.' );
    }
    
}
add_action( 'admin_post_contact_us_plugin_submit', 'contact_us_plugin_submit' );
add_action( 'admin_post_nopriv_contact_us_plugin_submit', 'contact_us_plugin_submit' );

// Add the shortcode for the contact form
function contact_us_plugin_shortcode() {
    ob_start();
    contact_us_plugin_settings_page();
    return ob_get_clean();
}
add_shortcode( 'contact_us_form', 'contact_us_plugin_shortcode' );
