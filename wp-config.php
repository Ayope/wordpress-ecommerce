<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'e-commerce_wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_WFF<BaRi(x`a3XD_l6X0*@liDQn:3T-scSOGU6K}`E<K5ellsOWKi GMXb.G#y^' );
define( 'SECURE_AUTH_KEY',  '&TiTP<5YY0v8P1E)Mw+B*JeLd) WLn0jz%pO|~I8d&N-PKF8fY5c4@$Vxl/pC~f8' );
define( 'LOGGED_IN_KEY',    '7ztsE*Q+KGbcoI#Cq.Vw=YRBf,GuldA#G`*wk*)1h8]<%WO&g7H(~6jbfrq6;t`u' );
define( 'NONCE_KEY',        '%)5i;#Kt&OT-w7i3.~kfX;PUPC+Gs6E{*cP;{-)b%&e<B0Aj@Y( I`[~X(w,QTi>' );
define( 'AUTH_SALT',        '~$@+FlHCsP[ZW1Tqchht_0xy>`hv(OgCrQ;v&T5rDh*-Iq^N!=8,Q23q<nkYuKd&' );
define( 'SECURE_AUTH_SALT', 'sQQ]hqNAk:/wNU#-|OFK@doGobDn;FV4L0Y>R[B@s>nvTVlP1lfn%``|i]7p^7d4' );
define( 'LOGGED_IN_SALT',   'PiK=Pqz{1.#5)29P=_3qd}I,lj,g*RMnE&8t_.No95Q$1.okZ^iH^FAb.iPKtVU ' );
define( 'NONCE_SALT',       'M}HnUZXbLsm!T{JD_BhPg5*g8TY)mbN`mJX1:Ak]C4g+WYf.kXJH[DnTt%CNe8tX' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
