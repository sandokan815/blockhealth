<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V1\Flow\Execution;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep\ExecutionStepContextList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep\ExecutionStepContextList stepContext
 * @method \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep\ExecutionStepContextContext stepContext()
 */
class ExecutionStepContext extends InstanceContext {

    protected $_stepContext = null;

    /**
     * Initialize the ExecutionStepContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $flowSid Flow Sid.
     * @param string $executionSid Execution Sid.
     * @param string $sid Step Sid.
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStepContext 
     */
    public function __construct(Version $version, $flowSid, $executionSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('flowSid' => $flowSid, 'executionSid' => $executionSid, 'sid' => $sid,);

        $this->uri = '/Flows/' . rawurlencode($flowSid) . '/Executions/' . rawurlencode($executionSid) . '/Steps/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a ExecutionStepInstance
     * 
     * @return ExecutionStepInstance Fetched ExecutionStepInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
                'GET', $this->uri, $params
        );

        return new ExecutionStepInstance(
                $this->version, $payload, $this->solution['flowSid'], $this->solution['executionSid'], $this->solution['sid']
        );
    }

    /**
     * Access the stepContext
     * 
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep\ExecutionStepContextList 
     */
    protected function getStepContext() {
        if (!$this->_stepContext) {
            $this->_stepContext = new ExecutionStepContextList(
                    $this->version, $this->solution['flowSid'], $this->solution['executionSid'], $this->solution['sid']
            );
        }

        return $this->_stepContext;
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Studio.V1.ExecutionStepContext ' . implode(' ', $context) . ']';
    }

}
