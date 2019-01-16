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

abstract class KeyOptions {

    /**
     * @param string $friendlyName A descriptive string for this resource, chosen
     *                             by your application, up to 64 characters long.
     * @return UpdateKeyOptions Options builder
     */
    public static function update($friendlyName = Values::NONE) {
        return new UpdateKeyOptions($friendlyName);
    }

}

class UpdateKeyOptions extends Options {

    /**
     * @param string $friendlyName A descriptive string for this resource, chosen
     *                             by your application, up to 64 characters long.
     */
    public function __construct($friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * A descriptive string for this resource, chosen by your application, up to 64 characters long.
     * 
     * @param string $friendlyName A descriptive string for this resource, chosen
     *                             by your application, up to 64 characters long.
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
        return '[Twilio.Api.V2010.UpdateKeyOptions ' . implode(' ', $options) . ']';
    }

}
