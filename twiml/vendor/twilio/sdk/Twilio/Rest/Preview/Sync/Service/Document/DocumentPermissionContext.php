<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Sync\Service\Document;

use Twilio\InstanceContext;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class DocumentPermissionContext extends InstanceContext {

    /**
     * Initialize the DocumentPermissionContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $documentSid Sync Document SID or unique name.
     * @param string $identity Identity of the user to whom the Sync Document
     *                         Permission applies.
     * @return \Twilio\Rest\Preview\Sync\Service\Document\DocumentPermissionContext 
     */
    public function __construct(Version $version, $serviceSid, $documentSid, $identity) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'serviceSid' => $serviceSid,
            'documentSid' => $documentSid,
            'identity' => $identity,
        );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Documents/' . rawurlencode($documentSid) . '/Permissions/' . rawurlencode($identity) . '';
    }

    /**
     * Fetch a DocumentPermissionInstance
     * 
     * @return DocumentPermissionInstance Fetched DocumentPermissionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
                'GET', $this->uri, $params
        );

        return new DocumentPermissionInstance(
                $this->version, $payload, $this->solution['serviceSid'], $this->solution['documentSid'], $this->solution['identity']
        );
    }

    /**
     * Deletes the DocumentPermissionInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the DocumentPermissionInstance
     * 
     * @param boolean $read Read access.
     * @param boolean $write Write access.
     * @param boolean $manage Manage access.
     * @return DocumentPermissionInstance Updated DocumentPermissionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($read, $write, $manage) {
        $data = Values::of(array(
                    'Read' => Serialize::booleanToString($read),
                    'Write' => Serialize::booleanToString($write),
                    'Manage' => Serialize::booleanToString($manage),
        ));

        $payload = $this->version->update(
                'POST', $this->uri, array(), $data
        );

        return new DocumentPermissionInstance(
                $this->version, $payload, $this->solution['serviceSid'], $this->solution['documentSid'], $this->solution['identity']
        );
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
        return '[Twilio.Preview.Sync.DocumentPermissionContext ' . implode(' ', $context) . ']';
    }

}
