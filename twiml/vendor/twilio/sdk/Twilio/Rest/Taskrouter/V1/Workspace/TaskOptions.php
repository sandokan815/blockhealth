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

abstract class TaskOptions {

    /**
     * @param string $attributes The user-defined JSON data describing the custom
     *                           attributes of this task.
     * @param string $assignmentStatus A 'pending' or 'reserved' Task may be
     *                                 canceled by posting
     *                                 AssignmentStatus='canceled'.
     * @param string $reason This is only required if the Task is canceled or
     *                       completed.
     * @param integer $priority Override priority for the Task.
     * @param string $taskChannel The task_channel
     * @return UpdateTaskOptions Options builder
     */
    public static function update($attributes = Values::NONE, $assignmentStatus = Values::NONE, $reason = Values::NONE, $priority = Values::NONE, $taskChannel = Values::NONE) {
        return new UpdateTaskOptions($attributes, $assignmentStatus, $reason, $priority, $taskChannel);
    }

    /**
     * @param integer $priority Retrieve the list of all Tasks in the workspace
     *                          with the specified priority.
     * @param string $assignmentStatus Returns the list of all Tasks in the
     *                                 workspace with the specified
     *                                 AssignmentStatus.
     * @param string $workflowSid Returns the list of Tasks that are being
     *                            controlled by the Workflow with the specified Sid
     *                            value.
     * @param string $workflowName Returns the list of Tasks that are being
     *                             controlled by the Workflow with the specified
     *                             FriendlyName value.
     * @param string $taskQueueSid Returns the list of Tasks that are currently
     *                             waiting in the TaskQueue identified by the Sid
     *                             specified.
     * @param string $taskQueueName Returns the list of Tasks that are currently
     *                              waiting in the TaskQueue identified by the
     *                              FriendlyName specified.
     * @param string $evaluateTaskAttributes Provide a task attributes expression,
     *                                       and this will return tasks which match
     *                                       the attributes.
     * @param string $ordering Use this parameter to control the order of the Tasks
     *                         returned.
     * @param boolean $hasAddons The has_addons
     * @return ReadTaskOptions Options builder
     */
    public static function read($priority = Values::NONE, $assignmentStatus = Values::NONE, $workflowSid = Values::NONE, $workflowName = Values::NONE, $taskQueueSid = Values::NONE, $taskQueueName = Values::NONE, $evaluateTaskAttributes = Values::NONE, $ordering = Values::NONE, $hasAddons = Values::NONE) {
        return new ReadTaskOptions($priority, $assignmentStatus, $workflowSid, $workflowName, $taskQueueSid, $taskQueueName, $evaluateTaskAttributes, $ordering, $hasAddons);
    }

    /**
     * @param integer $timeout The amount of time in seconds the task is allowed to
     *                         live up to a maximum of 2 weeks.
     * @param integer $priority Override priority for the Task.
     * @param string $taskChannel When MultiTasking is enabled specify the type of
     *                            the task by passing either TaskChannel Unique
     *                            Name or Task Channel Sid.
     * @param string $workflowSid The WorkflowSid for the Workflow that you would
     *                            like to handle routing for this Task.
     * @param string $attributes Url-encoded JSON string describing the attributes
     *                           of this task.
     * @return CreateTaskOptions Options builder
     */
    public static function create($timeout = Values::NONE, $priority = Values::NONE, $taskChannel = Values::NONE, $workflowSid = Values::NONE, $attributes = Values::NONE) {
        return new CreateTaskOptions($timeout, $priority, $taskChannel, $workflowSid, $attributes);
    }

}

class UpdateTaskOptions extends Options {

    /**
     * @param string $attributes The user-defined JSON data describing the custom
     *                           attributes of this task.
     * @param string $assignmentStatus A 'pending' or 'reserved' Task may be
     *                                 canceled by posting
     *                                 AssignmentStatus='canceled'.
     * @param string $reason This is only required if the Task is canceled or
     *                       completed.
     * @param integer $priority Override priority for the Task.
     * @param string $taskChannel The task_channel
     */
    public function __construct($attributes = Values::NONE, $assignmentStatus = Values::NONE, $reason = Values::NONE, $priority = Values::NONE, $taskChannel = Values::NONE) {
        $this->options['attributes'] = $attributes;
        $this->options['assignmentStatus'] = $assignmentStatus;
        $this->options['reason'] = $reason;
        $this->options['priority'] = $priority;
        $this->options['taskChannel'] = $taskChannel;
    }

    /**
     * The user-defined JSON data describing the custom attributes of this task.
     * 
     * @param string $attributes The user-defined JSON data describing the custom
     *                           attributes of this task.
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * A 'pending' or 'reserved' Task may be canceled by posting AssignmentStatus='canceled'. Post AssignmentStatus='wrapping' to move Task to 'wrapup' state and AssignmentStatus='completed' to move a Task to 'completed' state.
     * 
     * @param string $assignmentStatus A 'pending' or 'reserved' Task may be
     *                                 canceled by posting
     *                                 AssignmentStatus='canceled'.
     * @return $this Fluent Builder
     */
    public function setAssignmentStatus($assignmentStatus) {
        $this->options['assignmentStatus'] = $assignmentStatus;
        return $this;
    }

    /**
     * This is only required if the Task is canceled or completed. This logs the reason the task was either canceled or completed and queues the task for deletion after 5 minutes.
     * 
     * @param string $reason This is only required if the Task is canceled or
     *                       completed.
     * @return $this Fluent Builder
     */
    public function setReason($reason) {
        $this->options['reason'] = $reason;
        return $this;
    }

    /**
     * Override priority for the Task. When supplied, the Task will take on the given priority unless it matches a Workflow Target with a Priority set.
     * 
     * @param integer $priority Override priority for the Task.
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * The task_channel
     * 
     * @param string $taskChannel The task_channel
     * @return $this Fluent Builder
     */
    public function setTaskChannel($taskChannel) {
        $this->options['taskChannel'] = $taskChannel;
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
        return '[Twilio.Taskrouter.V1.UpdateTaskOptions ' . implode(' ', $options) . ']';
    }

}

class ReadTaskOptions extends Options {

    /**
     * @param integer $priority Retrieve the list of all Tasks in the workspace
     *                          with the specified priority.
     * @param string $assignmentStatus Returns the list of all Tasks in the
     *                                 workspace with the specified
     *                                 AssignmentStatus.
     * @param string $workflowSid Returns the list of Tasks that are being
     *                            controlled by the Workflow with the specified Sid
     *                            value.
     * @param string $workflowName Returns the list of Tasks that are being
     *                             controlled by the Workflow with the specified
     *                             FriendlyName value.
     * @param string $taskQueueSid Returns the list of Tasks that are currently
     *                             waiting in the TaskQueue identified by the Sid
     *                             specified.
     * @param string $taskQueueName Returns the list of Tasks that are currently
     *                              waiting in the TaskQueue identified by the
     *                              FriendlyName specified.
     * @param string $evaluateTaskAttributes Provide a task attributes expression,
     *                                       and this will return tasks which match
     *                                       the attributes.
     * @param string $ordering Use this parameter to control the order of the Tasks
     *                         returned.
     * @param boolean $hasAddons The has_addons
     */
    public function __construct($priority = Values::NONE, $assignmentStatus = Values::NONE, $workflowSid = Values::NONE, $workflowName = Values::NONE, $taskQueueSid = Values::NONE, $taskQueueName = Values::NONE, $evaluateTaskAttributes = Values::NONE, $ordering = Values::NONE, $hasAddons = Values::NONE) {
        $this->options['priority'] = $priority;
        $this->options['assignmentStatus'] = $assignmentStatus;
        $this->options['workflowSid'] = $workflowSid;
        $this->options['workflowName'] = $workflowName;
        $this->options['taskQueueSid'] = $taskQueueSid;
        $this->options['taskQueueName'] = $taskQueueName;
        $this->options['evaluateTaskAttributes'] = $evaluateTaskAttributes;
        $this->options['ordering'] = $ordering;
        $this->options['hasAddons'] = $hasAddons;
    }

    /**
     * Retrieve the list of all Tasks in the workspace with the specified priority.
     * 
     * @param integer $priority Retrieve the list of all Tasks in the workspace
     *                          with the specified priority.
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * Returns the list of all Tasks in the workspace with the specified AssignmentStatus. Allowed AssignmentStatus values are pending, reserved, assigned, canceled, and completed.
     * 
     * @param string $assignmentStatus Returns the list of all Tasks in the
     *                                 workspace with the specified
     *                                 AssignmentStatus.
     * @return $this Fluent Builder
     */
    public function setAssignmentStatus($assignmentStatus) {
        $this->options['assignmentStatus'] = $assignmentStatus;
        return $this;
    }

    /**
     * Returns the list of Tasks that are being controlled by the Workflow with the specified Sid value.
     * 
     * @param string $workflowSid Returns the list of Tasks that are being
     *                            controlled by the Workflow with the specified Sid
     *                            value.
     * @return $this Fluent Builder
     */
    public function setWorkflowSid($workflowSid) {
        $this->options['workflowSid'] = $workflowSid;
        return $this;
    }

    /**
     * Returns the list of Tasks that are being controlled by the Workflow with the specified FriendlyName value.
     * 
     * @param string $workflowName Returns the list of Tasks that are being
     *                             controlled by the Workflow with the specified
     *                             FriendlyName value.
     * @return $this Fluent Builder
     */
    public function setWorkflowName($workflowName) {
        $this->options['workflowName'] = $workflowName;
        return $this;
    }

    /**
     * Returns the list of Tasks that are currently waiting in the TaskQueue identified by the Sid specified.
     * 
     * @param string $taskQueueSid Returns the list of Tasks that are currently
     *                             waiting in the TaskQueue identified by the Sid
     *                             specified.
     * @return $this Fluent Builder
     */
    public function setTaskQueueSid($taskQueueSid) {
        $this->options['taskQueueSid'] = $taskQueueSid;
        return $this;
    }

    /**
     * Returns the list of Tasks that are currently waiting in the TaskQueue identified by the FriendlyName specified.
     * 
     * @param string $taskQueueName Returns the list of Tasks that are currently
     *                              waiting in the TaskQueue identified by the
     *                              FriendlyName specified.
     * @return $this Fluent Builder
     */
    public function setTaskQueueName($taskQueueName) {
        $this->options['taskQueueName'] = $taskQueueName;
        return $this;
    }

    /**
     * Provide a task attributes expression, and this will return tasks which match the attributes.
     * 
     * @param string $evaluateTaskAttributes Provide a task attributes expression,
     *                                       and this will return tasks which match
     *                                       the attributes.
     * @return $this Fluent Builder
     */
    public function setEvaluateTaskAttributes($evaluateTaskAttributes) {
        $this->options['evaluateTaskAttributes'] = $evaluateTaskAttributes;
        return $this;
    }

    /**
     * Use this parameter to control the order of the Tasks returned. The value should be passed in `Attribute:Order` format, where Attribute can be either `Priority` or `DateCreated` and Order can be either `asc` or `desc`. For example, `Priority:desc` returns Tasks ordered by Priority in descending order. To sort the Tasks by Priority and DateCreated pass `Priority:desc,DateCreated:asc`. By Default Tasks are returned sorted by DateCreated in ascending order.
     * 
     * @param string $ordering Use this parameter to control the order of the Tasks
     *                         returned.
     * @return $this Fluent Builder
     */
    public function setOrdering($ordering) {
        $this->options['ordering'] = $ordering;
        return $this;
    }

    /**
     * The has_addons
     * 
     * @param boolean $hasAddons The has_addons
     * @return $this Fluent Builder
     */
    public function setHasAddons($hasAddons) {
        $this->options['hasAddons'] = $hasAddons;
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
        return '[Twilio.Taskrouter.V1.ReadTaskOptions ' . implode(' ', $options) . ']';
    }

}

class CreateTaskOptions extends Options {

    /**
     * @param integer $timeout The amount of time in seconds the task is allowed to
     *                         live up to a maximum of 2 weeks.
     * @param integer $priority Override priority for the Task.
     * @param string $taskChannel When MultiTasking is enabled specify the type of
     *                            the task by passing either TaskChannel Unique
     *                            Name or Task Channel Sid.
     * @param string $workflowSid The WorkflowSid for the Workflow that you would
     *                            like to handle routing for this Task.
     * @param string $attributes Url-encoded JSON string describing the attributes
     *                           of this task.
     */
    public function __construct($timeout = Values::NONE, $priority = Values::NONE, $taskChannel = Values::NONE, $workflowSid = Values::NONE, $attributes = Values::NONE) {
        $this->options['timeout'] = $timeout;
        $this->options['priority'] = $priority;
        $this->options['taskChannel'] = $taskChannel;
        $this->options['workflowSid'] = $workflowSid;
        $this->options['attributes'] = $attributes;
    }

    /**
     * The amount of time in seconds the task is allowed to live up to a maximum of 2 weeks. Defaults to 24 hours. On timeout, `task.canceled` event will fire with description "Task TTL Exceeded".
     * 
     * @param integer $timeout The amount of time in seconds the task is allowed to
     *                         live up to a maximum of 2 weeks.
     * @return $this Fluent Builder
     */
    public function setTimeout($timeout) {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * Override priority for the Task. When supplied, the Task will take on the given priority unless it matches a Workflow Target with a Priority set. When not supplied, the Task will take on the priority of the matching Workflow Target.
     * 
     * @param integer $priority Override priority for the Task.
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * When MultiTasking is enabled specify the type of the task by passing either TaskChannel Unique Name or Task Channel Sid. Default value is "default"
     * 
     * @param string $taskChannel When MultiTasking is enabled specify the type of
     *                            the task by passing either TaskChannel Unique
     *                            Name or Task Channel Sid.
     * @return $this Fluent Builder
     */
    public function setTaskChannel($taskChannel) {
        $this->options['taskChannel'] = $taskChannel;
        return $this;
    }

    /**
     * The WorkflowSid for the Workflow that you would like to handle routing for this Task. If there is only one Workflow defined for the Workspace that you are posting a task to, then this is an optional parameter, and that single workflow will be used.
     * 
     * @param string $workflowSid The WorkflowSid for the Workflow that you would
     *                            like to handle routing for this Task.
     * @return $this Fluent Builder
     */
    public function setWorkflowSid($workflowSid) {
        $this->options['workflowSid'] = $workflowSid;
        return $this;
    }

    /**
     * Url-encoded JSON string describing the attributes of this task. This data will be passed back to the Workflow's AssignmentCallbackURL when the Task is assigned to a Worker. An example task: `{ "task_type": "call", "twilio_call_sid": "CAxxx", "customer_ticket_number": "12345" }`
     * 
     * @param string $attributes Url-encoded JSON string describing the attributes
     *                           of this task.
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
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
        return '[Twilio.Taskrouter.V1.CreateTaskOptions ' . implode(' ', $options) . ']';
    }

}
