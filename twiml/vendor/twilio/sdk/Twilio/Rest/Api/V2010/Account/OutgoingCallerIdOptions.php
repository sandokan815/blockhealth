<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class OutgoingCallerIdOptions {

    /**
     * @param string $friendlyName A human readable description of the caller ID
     * @return UpdateOutgoingCallerIdOptions Options builder
     */
    public static function update($friendlyName = Values::NONE) {
        return new UpdateOutgoingCallerIdOptions($friendlyName);
    }

    /**
     * @param string $phoneNumber Filter by phone number
     * @param string $friendlyName Filter by friendly name
     * @return ReadOutgoingCallerIdOptions Options builder
     */
    public static function read($phoneNumber = Values::NONE, $friendlyName = Values::NONE) {
        return new ReadOutgoingCallerIdOptions($phoneNumber, $friendlyName);
    }

}

class UpdateOutgoingCallerIdOptions extends Options {

    /**
     * @param string $friendlyName A human readable description of the caller ID
     */
    public function __construct($friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * A human readable description of a Caller ID, with maximum length of 64 characters. Defaults to a nicely formatted version of the phone number.
     * 
     * @param string $friendlyName A human readable description of the caller ID
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Api.V2010.UpdateOutgoingCallerIdOptions ' . implode(' ', $options) . ']';
    }

}

class ReadOutgoingCallerIdOptions extends Options {

    /**
     * @param string $phoneNumber Filter by phone number
     * @param string $friendlyName Filter by friendly name
     */
    public function __construct($phoneNumber = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['phoneNumber'] = $phoneNumber;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * Only show the caller id resource that exactly matches this phone number.
     * 
     * @param string $phoneNumber Filter by phone number
     * @return $this Fluent Builder
     */
    public function setPhoneNumber($phoneNumber) {
        $this->options['phoneNumber'] = $phoneNumber;
        return $this;
    }

    /**
     * Only show the caller id resource that exactly matches this name.
     * 
     * @param string $friendlyName Filter by friendly name
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Api.V2010.ReadOutgoingCallerIdOptions ' . implode(' ', $options) . ']';
    }

}
