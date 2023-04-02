<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v12/common/criteria.proto

namespace Google\Ads\GoogleAds\V12\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A topic criterion. Use topics to target or exclude placements in the
 * Google Display Network based on the category into which the placement falls
 * (for example, "Pets & Animals/Pets/Dogs").
 *
 * Generated from protobuf message <code>google.ads.googleads.v12.common.TopicInfo</code>
 */
class TopicInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The Topic Constant resource name.
     *
     * Generated from protobuf field <code>optional string topic_constant = 3;</code>
     */
    protected $topic_constant = null;
    /**
     * The category to target or exclude. Each subsequent element in the array
     * describes a more specific sub-category. For example,
     * "Pets & Animals", "Pets", "Dogs" represents the "Pets & Animals/Pets/Dogs"
     * category.
     *
     * Generated from protobuf field <code>repeated string path = 4;</code>
     */
    private $path;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $topic_constant
     *           The Topic Constant resource name.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $path
     *           The category to target or exclude. Each subsequent element in the array
     *           describes a more specific sub-category. For example,
     *           "Pets & Animals", "Pets", "Dogs" represents the "Pets & Animals/Pets/Dogs"
     *           category.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V12\Common\Criteria::initOnce();
        parent::__construct($data);
    }

    /**
     * The Topic Constant resource name.
     *
     * Generated from protobuf field <code>optional string topic_constant = 3;</code>
     * @return string
     */
    public function getTopicConstant()
    {
        return isset($this->topic_constant) ? $this->topic_constant : '';
    }

    public function hasTopicConstant()
    {
        return isset($this->topic_constant);
    }

    public function clearTopicConstant()
    {
        unset($this->topic_constant);
    }

    /**
     * The Topic Constant resource name.
     *
     * Generated from protobuf field <code>optional string topic_constant = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setTopicConstant($var)
    {
        GPBUtil::checkString($var, True);
        $this->topic_constant = $var;

        return $this;
    }

    /**
     * The category to target or exclude. Each subsequent element in the array
     * describes a more specific sub-category. For example,
     * "Pets & Animals", "Pets", "Dogs" represents the "Pets & Animals/Pets/Dogs"
     * category.
     *
     * Generated from protobuf field <code>repeated string path = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * The category to target or exclude. Each subsequent element in the array
     * describes a more specific sub-category. For example,
     * "Pets & Animals", "Pets", "Dogs" represents the "Pets & Animals/Pets/Dogs"
     * category.
     *
     * Generated from protobuf field <code>repeated string path = 4;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPath($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->path = $arr;

        return $this;
    }

}

