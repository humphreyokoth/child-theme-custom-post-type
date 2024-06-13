<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v16/services/customer_lifecycle_goal_service.proto

namespace Google\Ads\GoogleAds\V16\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [CustomerLifecycleGoalService.configureCustomerLifecycleGoals][].
 *
 * Generated from protobuf message <code>google.ads.googleads.v16.services.ConfigureCustomerLifecycleGoalsRequest</code>
 */
class ConfigureCustomerLifecycleGoalsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The ID of the customer performing the upload.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $customer_id = '';
    /**
     * Required. The operation to perform customer lifecycle goal update.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v16.services.CustomerLifecycleGoalOperation operation = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $operation = null;
    /**
     * Optional. If true, the request is validated but not executed. Only errors
     * are returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $validate_only = false;

    /**
     * @param string                                                            $customerId Required. The ID of the customer performing the upload.
     * @param \Google\Ads\GoogleAds\V16\Services\CustomerLifecycleGoalOperation $operation  Required. The operation to perform customer lifecycle goal update.
     *
     * @return \Google\Ads\GoogleAds\V16\Services\ConfigureCustomerLifecycleGoalsRequest
     *
     * @experimental
     */
    public static function build(string $customerId, \Google\Ads\GoogleAds\V16\Services\CustomerLifecycleGoalOperation $operation): self
    {
        return (new self())
            ->setCustomerId($customerId)
            ->setOperation($operation);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer_id
     *           Required. The ID of the customer performing the upload.
     *     @type \Google\Ads\GoogleAds\V16\Services\CustomerLifecycleGoalOperation $operation
     *           Required. The operation to perform customer lifecycle goal update.
     *     @type bool $validate_only
     *           Optional. If true, the request is validated but not executed. Only errors
     *           are returned, not results.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V16\Services\CustomerLifecycleGoalService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The ID of the customer performing the upload.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Required. The ID of the customer performing the upload.
     *
     * Generated from protobuf field <code>string customer_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setCustomerId($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer_id = $var;

        return $this;
    }

    /**
     * Required. The operation to perform customer lifecycle goal update.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v16.services.CustomerLifecycleGoalOperation operation = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Ads\GoogleAds\V16\Services\CustomerLifecycleGoalOperation|null
     */
    public function getOperation()
    {
        return $this->operation;
    }

    public function hasOperation()
    {
        return isset($this->operation);
    }

    public function clearOperation()
    {
        unset($this->operation);
    }

    /**
     * Required. The operation to perform customer lifecycle goal update.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v16.services.CustomerLifecycleGoalOperation operation = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Ads\GoogleAds\V16\Services\CustomerLifecycleGoalOperation $var
     * @return $this
     */
    public function setOperation($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V16\Services\CustomerLifecycleGoalOperation::class);
        $this->operation = $var;

        return $this;
    }

    /**
     * Optional. If true, the request is validated but not executed. Only errors
     * are returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * Optional. If true, the request is validated but not executed. Only errors
     * are returned, not results.
     *
     * Generated from protobuf field <code>bool validate_only = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

}

