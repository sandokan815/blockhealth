<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string friendlyName
 * @property string phoneNumber
 * @property string lata
 * @property string locality
 * @property string rateCenter
 * @property string latitude
 * @property string longitude
 * @property string region
 * @property string postalCode
 * @property string isoCountry
 * @property string addressRequirements
 * @property boolean beta
 * @property string capabilities
 */
class MobileInstance extends InstanceResource {

    /**
     * Initialize the MobileInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The 34 character string that uniquely identifies
     *                           your account.
     * @param string $countryCode The ISO Country code to lookup phone numbers for.
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MobileInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $countryCode) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'phoneNumber' => Values::array_get($payload, 'phone_number'),
            'lata' => Values::array_get($payload, 'lata'),
            'locality' => Values::array_get($payload, 'locality'),
            'rateCenter' => Values::array_get($payload, 'rate_center'),
            'latitude' => Values::array_get($payload, 'latitude'),
            'longitude' => Values::array_get($payload, 'longitude'),
            'region' => Values::array_get($payload, 'region'),
            'postalCode' => Values::array_get($payload, 'postal_code'),
            'isoCountry' => Values::array_get($payload, 'iso_country'),
            'addressRequirements' => Values::array_get($payload, 'address_requirements'),
            'beta' => Values::array_get($payload, 'beta'),
            'capabilities' => Values::array_get($payload, 'capabilities'),
        );

        $this->solution = array('accountSid' => $accountSid, 'countryCode' => $countryCode,);
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.MobileInstance]';
    }

}
