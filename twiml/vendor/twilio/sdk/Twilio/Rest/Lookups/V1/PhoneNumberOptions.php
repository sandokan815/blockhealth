<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Lookups\V1;

use Twilio\Options;
use Twilio\Values;

abstract class PhoneNumberOptions {

    /**
     * @param string $countryCode Optional ISO country code of the phone number.
     * @param string $type Indicates the type of information you would like
     *                     returned with your request.
     * @param string $addOns Indicates the particular Add-on you would like to use
     *                       to get more information.
     * @param string $addOnsData The add_ons_data
     * @return FetchPhoneNumberOptions Options builder
     */
    public static function fetch($countryCode = Values::NONE, $type = Values::NONE, $addOns = Values::NONE, $addOnsData = Values::NONE) {
        return new FetchPhoneNumberOptions($countryCode, $type, $addOns, $addOnsData);
    }

}

class FetchPhoneNumberOptions extends Options {

    /**
     * @param string $countryCode Optional ISO country code of the phone number.
     * @param string $type Indicates the type of information you would like
     *                     returned with your request.
     * @param string $addOns Indicates the particular Add-on you would like to use
     *                       to get more information.
     * @param string $addOnsData The add_ons_data
     */
    public function __construct($countryCode = Values::NONE, $type = Values::NONE, $addOns = Values::NONE, $addOnsData = Values::NONE) {
        $this->options['countryCode'] = $countryCode;
        $this->options['type'] = $type;
        $this->options['addOns'] = $addOns;
        $this->options['addOnsData'] = $addOnsData;
    }

    /**
     * Optional [ISO country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) of the phone number. This is used to specify the country when the number is provided in a national format.
     * 
     * @param string $countryCode Optional ISO country code of the phone number.
     * @return $this Fluent Builder
     */
    public function setCountryCode($countryCode) {
        $this->options['countryCode'] = $countryCode;
        return $this;
    }

    /**
     * Indicates the type of information you would like returned with your request. Possible values are `carrier` or `caller-name`. If not specified, the default is null.  Carrier information costs $0.005 per phone number looked up.  Caller Name information costs $0.01 per phone number looked up, and is currently ONLY available in the US.  You can retrieve both types of information by including two `Type` arguments or making two separate requests.
     * 
     * @param string $type Indicates the type of information you would like
     *                     returned with your request.
     * @return $this Fluent Builder
     */
    public function setType($type) {
        $this->options['type'] = $type;
        return $this;
    }

    /**
     * Indicates the particular Add-on you would like to use to get more information. Possible values are the *Add-on Unique Names* of Add-ons installed on your account. You can specify multiple instances of this parameter to invoke different Add-ons. See [Add-ons documentation](https://www.twilio.com/docs/api/addons) for information on installing Add-ons. Add-on pricing is available in your list of Installed Add-ons in the Console.
     * 
     * @param string $addOns Indicates the particular Add-on you would like to use
     *                       to get more information.
     * @return $this Fluent Builder
     */
    public function setAddOns($addOns) {
        $this->options['addOns'] = $addOns;
        return $this;
    }

    /**
     * The add_ons_data
     * 
     * @param string $addOnsData The add_ons_data
     * @return $this Fluent Builder
     */
    public function setAddOnsData($addOnsData) {
        $this->options['addOnsData'] = $addOnsData;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Lookups.V1.FetchPhoneNumberOptions ' . implode(' ', $options) . ']';
    }

}
