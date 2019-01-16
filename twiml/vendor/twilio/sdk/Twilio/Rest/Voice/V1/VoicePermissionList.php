<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Voice\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Rest\Voice\V1\VoicePermission\BulkCountryUpdateList;
use Twilio\Rest\Voice\V1\VoicePermission\CountryList;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 * 
 * @property \Twilio\Rest\Voice\V1\VoicePermission\CountryList countries
 * @property \Twilio\Rest\Voice\V1\VoicePermission\BulkCountryUpdateList bulkCountryUpdates
 * @method \Twilio\Rest\Voice\V1\VoicePermission\CountryContext countries(string $isoCode)
 */
class VoicePermissionList extends ListResource {

    protected $_countries = null;
    protected $_bulkCountryUpdates = null;

    /**
     * Construct the VoicePermissionList
     * 
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Voice\V1\VoicePermissionList 
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Access the countries
     */
    protected function getCountries() {
        if (!$this->_countries) {
            $this->_countries = new CountryList($this->version);
        }

        return $this->_countries;
    }

    /**
     * Access the bulkCountryUpdates
     */
    protected function getBulkCountryUpdates() {
        if (!$this->_bulkCountryUpdates) {
            $this->_bulkCountryUpdates = new BulkCountryUpdateList($this->version);
        }

        return $this->_bulkCountryUpdates;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws \Twilio\Exceptions\TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     * 
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Voice.V1.VoicePermissionList]';
    }

}
