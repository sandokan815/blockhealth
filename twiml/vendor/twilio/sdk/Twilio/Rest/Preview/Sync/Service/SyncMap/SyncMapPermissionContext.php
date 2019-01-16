<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Sync\Service\SyncMap;

use Twilio\InstanceContext;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class SyncMapPermissionContext extends InstanceContext {

    /**
     * Initialize the SyncMapPermissionContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $mapSid Sync Map SID or unique name.
     * @param string $identity Identity of the user to whom the Sync Map Permission
     *                         applies.
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapPermissionContext 
     */
    public function __construct(Version $version, $serviceSid, $mapSid, $identity) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'mapSid' => $mapSid, 'identity' => $identity,);

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Maps/' . rawurlencode($mapSid) . '/Permissions/' . rawurlencode($identity) . '';
    }

    /**
     * Fetch a SyncMapPermissionInstance
     * 
     * @return SyncMapPermissionInstance Fetched SyncMapPermissionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
                'GET', $this->uri, $params
        );

        return new SyncMapPermissionInstance(
                $this->version, $payload, $this->solution['serviceSid'], $this->solution['mapSid'], $this->solution['identity']
        );
    }

    /**
     * Deletes the SyncMapPermissionInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the SyncMapPermissionInstance
     * 
     * @param boolean $read Read access.
     * @param boolean $write Write access.
     * @param boolean $manage Manage access.
     * @return SyncMapPermissionInstance Updated SyncMapPermissionInstance
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

        return new SyncMapPermissionInstance(
                $this->version, $payload, $this->solution['serviceSid'], $this->solution['mapSid'], $this->solution['identity']
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
        return '[Twilio.Preview.Sync.SyncMapPermissionContext ' . implode(' ', $context) . ']';
    }

}
