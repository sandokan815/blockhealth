<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1\Assistant;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 * 
 * @property string accountSid
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property array results
 * @property string language
 * @property string modelBuildSid
 * @property string query
 * @property string sampleSid
 * @property string assistantSid
 * @property string sid
 * @property string status
 * @property string url
 * @property string sourceChannel
 */
class QueryInstance extends InstanceResource {

    /**
     * Initialize the QueryInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $assistantSid The unique ID of the parent Assistant.
     * @param string $sid A 34-character string that uniquely identifies this
     *                    resource.
     * @return \Twilio\Rest\Autopilot\V1\Assistant\QueryInstance 
     */
    public function __construct(Version $version, array $payload, $assistantSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'results' => Values::array_get($payload, 'results'),
            'language' => Values::array_get($payload, 'language'),
            'modelBuildSid' => Values::array_get($payload, 'model_build_sid'),
            'query' => Values::array_get($payload, 'query'),
            'sampleSid' => Values::array_get($payload, 'sample_sid'),
            'assistantSid' => Values::array_get($payload, 'assistant_sid'),
            'sid' => Values::array_get($payload, 'sid'),
            'status' => Values::array_get($payload, 'status'),
            'url' => Values::array_get($payload, 'url'),
            'sourceChannel' => Values::array_get($payload, 'source_channel'),
        );

        $this->solution = array('assistantSid' => $assistantSid, 'sid' => $sid ?: $this->properties['sid'],);
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Autopilot\V1\Assistant\QueryContext Context for this
     *                                                          QueryInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new QueryContext(
                    $this->version, $this->solution['assistantSid'], $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a QueryInstance
     * 
     * @return QueryInstance Fetched QueryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the QueryInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return QueryInstance Updated QueryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the QueryInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Autopilot.V1.QueryInstance ' . implode(' ', $context) . ']';
    }

}
