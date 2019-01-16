<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Options;
use Twilio\Values;

abstract class EventOptions {

    /**
     * @param \DateTime $endDate Filter events by an end date.
     * @param string $eventType Filter events by those of a certain event type
     * @param integer $minutes Filter events by up to 'x' minutes in the past.
     * @param string $reservationSid Filter events by those pertaining to a
     *                               particular reservation
     * @param \DateTime $startDate Filter events by a start date.
     * @param string $taskQueueSid Filter events by those pertaining to a
     *                             particular queue
     * @param string $taskSid Filter events by those pertaining to a particular task
     * @param string $workerSid Filter events by those pertaining to a particular
     *                          worker
     * @param string $workflowSid The workflow_sid
     * @return ReadEventOptions Options builder
     */
    public static function read($endDate = Values::NONE, $eventType = Values::NONE, $minutes = Values::NONE, $reservationSid = Values::NONE, $startDate = Values::NONE, $taskQueueSid = Values::NONE, $taskSid = Values::NONE, $workerSid = Values::NONE, $workflowSid = Values::NONE) {
        return new ReadEventOptions($endDate, $eventType, $minutes, $reservationSid, $startDate, $taskQueueSid, $taskSid, $workerSid, $workflowSid);
    }

}

class ReadEventOptions extends Options {

    /**
     * @param \DateTime $endDate Filter events by an end date.
     * @param string $eventType Filter events by those of a certain event type
     * @param integer $minutes Filter events by up to 'x' minutes in the past.
     * @param string $reservationSid Filter events by those pertaining to a
     *                               particular reservation
     * @param \DateTime $startDate Filter events by a start date.
     * @param string $taskQueueSid Filter events by those pertaining to a
     *                             particular queue
     * @param string $taskSid Filter events by those pertaining to a particular task
     * @param string $workerSid Filter events by those pertaining to a particular
     *                          worker
     * @param string $workflowSid The workflow_sid
     */
    public function __construct($endDate = Values::NONE, $eventType = Values::NONE, $minutes = Values::NONE, $reservationSid = Values::NONE, $startDate = Values::NONE, $taskQueueSid = Values::NONE, $taskSid = Values::NONE, $workerSid = Values::NONE, $workflowSid = Values::NONE) {
        $this->options['endDate'] = $endDate;
        $this->options['eventType'] = $eventType;
        $this->options['minutes'] = $minutes;
        $this->options['reservationSid'] = $reservationSid;
        $this->options['startDate'] = $startDate;
        $this->options['taskQueueSid'] = $taskQueueSid;
        $this->options['taskSid'] = $taskSid;
        $this->options['workerSid'] = $workerSid;
        $this->options['workflowSid'] = $workflowSid;
    }

    /**
     * Filter events by an end date. This is helpful for defining a range of events to capture. Input is a GMT ISO 8601 Timestamp.
     * 
     * @param \DateTime $endDate Filter events by an end date.
     * @return $this Fluent Builder
     */
    public function setEndDate($endDate) {
        $this->options['endDate'] = $endDate;
        return $this;
    }

    /**
     * Filter events by those of a certain event type
     * 
     * @param string $eventType Filter events by those of a certain event type
     * @return $this Fluent Builder
     */
    public function setEventType($eventType) {
        $this->options['eventType'] = $eventType;
        return $this;
    }

    /**
     * Filter events by up to 'x' minutes in the past. This is helpful for events for the last 15 minutes, 240 minutes (4 hours), and 480 minutes (8 hours) to see trends. Defaults to 15 minutes.
     * 
     * @param integer $minutes Filter events by up to 'x' minutes in the past.
     * @return $this Fluent Builder
     */
    public function setMinutes($minutes) {
        $this->options['minutes'] = $minutes;
        return $this;
    }

    /**
     * Filter events by those pertaining to a particular reservation
     * 
     * @param string $reservationSid Filter events by those pertaining to a
     *                               particular reservation
     * @return $this Fluent Builder
     */
    public function setReservationSid($reservationSid) {
        $this->options['reservationSid'] = $reservationSid;
        return $this;
    }

    /**
     * Filter events by a start date. This is helpful for defining a range of events to capture. Input is a GMT ISO 8601 Timestamp.
     * 
     * @param \DateTime $startDate Filter events by a start date.
     * @return $this Fluent Builder
     */
    public function setStartDate($startDate) {
        $this->options['startDate'] = $startDate;
        return $this;
    }

    /**
     * Filter events by those pertaining to a particular queue
     * 
     * @param string $taskQueueSid Filter events by those pertaining to a
     *                             particular queue
     * @return $this Fluent Builder
     */
    public function setTaskQueueSid($taskQueueSid) {
        $this->options['taskQueueSid'] = $taskQueueSid;
        return $this;
    }

    /**
     * Filter events by those pertaining to a particular task
     * 
     * @param string $taskSid Filter events by those pertaining to a particular task
     * @return $this Fluent Builder
     */
    public function setTaskSid($taskSid) {
        $this->options['taskSid'] = $taskSid;
        return $this;
    }

    /**
     * Filter events by those pertaining to a particular worker
     * 
     * @param string $workerSid Filter events by those pertaining to a particular
     *                          worker
     * @return $this Fluent Builder
     */
    public function setWorkerSid($workerSid) {
        $this->options['workerSid'] = $workerSid;
        return $this;
    }

    /**
     * The workflow_sid
     * 
     * @param string $workflowSid The workflow_sid
     * @return $this Fluent Builder
     */
    public function setWorkflowSid($workflowSid) {
        $this->options['workflowSid'] = $workflowSid;
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
        return '[Twilio.Taskrouter.V1.ReadEventOptions ' . implode(' ', $options) . ']';
    }

}
