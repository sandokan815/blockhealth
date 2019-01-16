<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1;

use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class RecordingSettingsContext extends InstanceContext {

    /**
     * Initialize the RecordingSettingsContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @return \Twilio\Rest\Video\V1\RecordingSettingsContext 
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();

        $this->uri = '/RecordingSettings/Default';
    }

    /**
     * Fetch a RecordingSettingsInstance
     * 
     * @return RecordingSettingsInstance Fetched RecordingSettingsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
                'GET', $this->uri, $params
        );

        return new RecordingSettingsInstance($this->version, $payload);
    }

    /**
     * Create a new RecordingSettingsInstance
     * 
     * @param string $friendlyName Friendly name of the configuration to be shown
     *                             in the console
     * @param array|Options $options Optional Arguments
     * @return RecordingSettingsInstance Newly created RecordingSettingsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($friendlyName, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
                    'FriendlyName' => $friendlyName,
                    'AwsCredentialsSid' => $options['awsCredentialsSid'],
                    'EncryptionKeySid' => $options['encryptionKeySid'],
                    'AwsS3Url' => $options['awsS3Url'],
                    'AwsStorageEnabled' => Serialize::booleanToString($options['awsStorageEnabled']),
                    'EncryptionEnabled' => Serialize::booleanToString($options['encryptionEnabled']),
        ));

        $payload = $this->version->create(
                'POST', $this->uri, array(), $data
        );

        return new RecordingSettingsInstance($this->version, $payload);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Video.V1.RecordingSettingsContext ' . implode(' ', $context) . ']';
    }

}
