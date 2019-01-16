<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V1\Flow\Engagement;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class EngagementContextContext extends InstanceContext {

    /**
     * Initialize the EngagementContextContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $flowSid Flow Sid.
     * @param string $engagementSid Engagement Sid.
     * @return \Twilio\Rest\Studio\V1\Flow\Engagement\EngagementContextContext 
     */
    public function __construct(Version $version, $flowSid, $engagementSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('flowSid' => $flowSid, 'engagementSid' => $engagementSid,);

        $this->uri = '/Flows/' . rawurlencode($flowSid) . '/Engagements/' . rawurlencode($engagementSid) . '/Context';
    }

    /**
     * Fetch a EngagementContextInstance
     * 
     * @return EngagementContextInstance Fetched EngagementContextInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
                'GET', $this->uri, $params
        );

        return new EngagementContextInstance(
                $this->version, $payload, $this->solution['flowSid'], $this->solution['engagementSid']
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
        return '[Twilio.Studio.V1.EngagementContextContext ' . implode(' ', $context) . ']';
    }

}
