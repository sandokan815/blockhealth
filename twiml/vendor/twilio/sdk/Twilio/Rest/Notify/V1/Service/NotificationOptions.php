<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Notify\V1\Service;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class NotificationOptions {

    /**
     * @param string $identity Delivery will be attempted only to Bindings with an
     *                         Identity in this list.
     * @param string $tag Delivery will be attempted only to Bindings that have all
     *                    of the Tags in this list.
     * @param string $body Indicates the notification body text.
     * @param string $priority Two priorities defined: low and high.
     * @param integer $ttl This parameter specifies how long the notification is
     *                     valid.
     * @param string $title Indicates the notification title.
     * @param string $sound Indicates a sound to be played.
     * @param string $action Specifies the actions to be displayed for the
     *                       notification.
     * @param array $data This parameter specifies the custom key-value pairs of
     *                    the notification's payload.
     * @param array $apn APNS specific payload that overrides corresponding
     *                   attributes in a generic payload for Bindings with the apn
     *                   BindingType.
     * @param array $gcm GCM specific payload that overrides corresponding
     *                   attributes in generic payload for Bindings with gcm
     *                   BindingType.
     * @param array $sms SMS specific payload that overrides corresponding
     *                   attributes in generic payload for Bindings with sms
     *                   BindingType.
     * @param array $facebookMessenger Messenger specific payload that overrides
     *                                 corresponding attributes in generic payload
     *                                 for Bindings with facebook-messenger
     *                                 BindingType.
     * @param array $fcm FCM specific payload that overrides corresponding
     *                   attributes in generic payload for Bindings with fcm
     *                   BindingType.
     * @param string $segment The segment
     * @param array $alexa The alexa
     * @param string $toBinding The destination address in a JSON object.
     * @return CreateNotificationOptions Options builder
     */
    public static function create($identity = Values::NONE, $tag = Values::NONE, $body = Values::NONE, $priority = Values::NONE, $ttl = Values::NONE, $title = Values::NONE, $sound = Values::NONE, $action = Values::NONE, $data = Values::NONE, $apn = Values::NONE, $gcm = Values::NONE, $sms = Values::NONE, $facebookMessenger = Values::NONE, $fcm = Values::NONE, $segment = Values::NONE, $alexa = Values::NONE, $toBinding = Values::NONE) {
        return new CreateNotificationOptions($identity, $tag, $body, $priority, $ttl, $title, $sound, $action, $data, $apn, $gcm, $sms, $facebookMessenger, $fcm, $segment, $alexa, $toBinding);
    }

}

class CreateNotificationOptions extends Options {

    /**
     * @param string $identity Delivery will be attempted only to Bindings with an
     *                         Identity in this list.
     * @param string $tag Delivery will be attempted only to Bindings that have all
     *                    of the Tags in this list.
     * @param string $body Indicates the notification body text.
     * @param string $priority Two priorities defined: low and high.
     * @param integer $ttl This parameter specifies how long the notification is
     *                     valid.
     * @param string $title Indicates the notification title.
     * @param string $sound Indicates a sound to be played.
     * @param string $action Specifies the actions to be displayed for the
     *                       notification.
     * @param array $data This parameter specifies the custom key-value pairs of
     *                    the notification's payload.
     * @param array $apn APNS specific payload that overrides corresponding
     *                   attributes in a generic payload for Bindings with the apn
     *                   BindingType.
     * @param array $gcm GCM specific payload that overrides corresponding
     *                   attributes in generic payload for Bindings with gcm
     *                   BindingType.
     * @param array $sms SMS specific payload that overrides corresponding
     *                   attributes in generic payload for Bindings with sms
     *                   BindingType.
     * @param array $facebookMessenger Messenger specific payload that overrides
     *                                 corresponding attributes in generic payload
     *                                 for Bindings with facebook-messenger
     *                                 BindingType.
     * @param array $fcm FCM specific payload that overrides corresponding
     *                   attributes in generic payload for Bindings with fcm
     *                   BindingType.
     * @param string $segment The segment
     * @param array $alexa The alexa
     * @param string $toBinding The destination address in a JSON object.
     */
    public function __construct($identity = Values::NONE, $tag = Values::NONE, $body = Values::NONE, $priority = Values::NONE, $ttl = Values::NONE, $title = Values::NONE, $sound = Values::NONE, $action = Values::NONE, $data = Values::NONE, $apn = Values::NONE, $gcm = Values::NONE, $sms = Values::NONE, $facebookMessenger = Values::NONE, $fcm = Values::NONE, $segment = Values::NONE, $alexa = Values::NONE, $toBinding = Values::NONE) {
        $this->options['identity'] = $identity;
        $this->options['tag'] = $tag;
        $this->options['body'] = $body;
        $this->options['priority'] = $priority;
        $this->options['ttl'] = $ttl;
        $this->options['title'] = $title;
        $this->options['sound'] = $sound;
        $this->options['action'] = $action;
        $this->options['data'] = $data;
        $this->options['apn'] = $apn;
        $this->options['gcm'] = $gcm;
        $this->options['sms'] = $sms;
        $this->options['facebookMessenger'] = $facebookMessenger;
        $this->options['fcm'] = $fcm;
        $this->options['segment'] = $segment;
        $this->options['alexa'] = $alexa;
        $this->options['toBinding'] = $toBinding;
    }

    /**
     * Delivery will be attempted only to Bindings with an Identity in this list. Maximum 20 items allowed in this list.
     * 
     * @param string $identity Delivery will be attempted only to Bindings with an
     *                         Identity in this list.
     * @return $this Fluent Builder
     */
    public function setIdentity($identity) {
        $this->options['identity'] = $identity;
        return $this;
    }

    /**
     * Delivery will be attempted only to Bindings that have all of the Tags in this list. Maximum 5 items allowed in this list. The implicit tag "all" is available to notify all Bindings in a Service instance. Similarly the implicit tags "apn", "fcm", "gcm", "sms" and "facebook-messenger" are available to notify all Bindings of the given type.
     * 
     * @param string $tag Delivery will be attempted only to Bindings that have all
     *                    of the Tags in this list.
     * @return $this Fluent Builder
     */
    public function setTag($tag) {
        $this->options['tag'] = $tag;
        return $this;
    }

    /**
     * (optional for all except Alexa) Indicates the notification body text. Translates to `data.twi_body` for FCM and GCM, `aps.alert.body` for APNS, `Body` for SMS and Facebook Messenger and `request.message.data` for Alexa.  For SMS either this, `body`, or the `media_url` attribute of the `Sms` parameter is required.  For Facebook Messenger either this parameter or the body attribute in the `FacebookMessenger` parameter is required.
     * 
     * @param string $body Indicates the notification body text.
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * Two priorities defined: `low` and `high` (default). `low` optimizes the client app's battery consumption, and notifications may be delivered with unspecified delay. This is the same as Normal priority for FCM and GCM or priority 5 for APNS. `high` sends the notification immediately, and can wake up a sleeping device. This is the same as High priority for FCM and GCM or priority 10 for APNS.  This feature is not supported by SMS and Facebook Messenger and will be ignored for deliveries via those channels.
     * 
     * @param string $priority Two priorities defined: low and high.
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * This parameter specifies how long (in seconds) the notification is valid. Delivery should be attempted if the device is offline. The maximum time to live supported is 4 weeks. The value zero means that the notification delivery is attempted immediately once but not stored for future delivery. The default value is 4 weeks.  This feature is not supported by SMS and Facebook Messenger and will be ignored for deliveries via those channels.
     * 
     * @param integer $ttl This parameter specifies how long the notification is
     *                     valid.
     * @return $this Fluent Builder
     */
    public function setTtl($ttl) {
        $this->options['ttl'] = $ttl;
        return $this;
    }

    /**
     * (optional for all except Alexa) Indicates the notification title. This field is not visible on iOS phones and tablets but it is on Apple Watch and Android devices. Translates to `data.twi_title` for FCM and GCM, `aps.alert.title` for APNS and `displayInfo.content[0].title`, `displayInfo.content[].toast.primaryText` of `request.message` for Alexa. It is not supported for SMS and Facebook Messenger and will be omitted from deliveries via those channels.
     * 
     * @param string $title Indicates the notification title.
     * @return $this Fluent Builder
     */
    public function setTitle($title) {
        $this->options['title'] = $title;
        return $this;
    }

    /**
     * Indicates a sound to be played. Translates to `data.twi_sound` for FCM and GCM and `aps.sound` for APNS.  This parameter is not supported by SMS and Facebook Messenger and is omitted from deliveries via those channels.
     * 
     * @param string $sound Indicates a sound to be played.
     * @return $this Fluent Builder
     */
    public function setSound($sound) {
        $this->options['sound'] = $sound;
        return $this;
    }

    /**
     * Specifies the actions to be displayed for the notification. Translates to `data.twi_action` for GCM and `aps.category` for APNS.  This parameter is not supported by SMS and Facebook Messenger and is omitted from deliveries via those channels.
     * 
     * @param string $action Specifies the actions to be displayed for the
     *                       notification.
     * @return $this Fluent Builder
     */
    public function setAction($action) {
        $this->options['action'] = $action;
        return $this;
    }

    /**
     * This parameter specifies the custom key-value pairs of the notification's payload. Translates to `data` dictionary in FCM and GCM payload. FCM and GCM [reserves certain keys](https://firebase.google.com/docs/cloud-messaging/http-server-ref) that cannot be used for those channels. For APNS, attributes of `Data` will be inserted into the APNS payload as custom properties outside of the `aps` dictionary. For Alexa they are added to `request.message.data`. For all channels, the `twi_` prefix is reserved for Twilio for future use. Requests including custom data with keys starting with `twi_` will be rejected as 400 Bad request and no delivery will be attempted.  This parameter is not supported by SMS and Facebook Messenger and is omitted from deliveries via those channels.
     * 
     * @param array $data This parameter specifies the custom key-value pairs of
     *                    the notification's payload.
     * @return $this Fluent Builder
     */
    public function setData($data) {
        $this->options['data'] = $data;
        return $this;
    }

    /**
     * APNS specific payload that overrides corresponding attributes in a generic payload for Bindings with the apn BindingType. This value is mapped to the Payload item, therefore the `aps` key has to be used to change standard attributes. Adds custom key-value pairs to the root of the dictionary. Refer to [APNS documentation](https://developer.apple.com/library/content/documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/CommunicatingwithAPNs.html) for more details. The `twi_` key prefix for custom key-value pairs is reserved for Twilio for future use. Custom data with keys starting with `twi_` is not allowed.
     * 
     * @param array $apn APNS specific payload that overrides corresponding
     *                   attributes in a generic payload for Bindings with the apn
     *                   BindingType.
     * @return $this Fluent Builder
     */
    public function setApn($apn) {
        $this->options['apn'] = $apn;
        return $this;
    }

    /**
     * GCM specific payload that overrides corresponding attributes in generic payload for Bindings with gcm BindingType.  This value is mapped to the root json dictionary. Refer to [GCM documentation](https://developers.google.com/cloud-messaging/http-server-ref) for more details.  Target parameters `to`, `registration_ids`, and `notification_key` are not allowed. The `twi_` key prefix for custom key-value pairs is reserved for Twilio for future use. Custom data with keys starting with `twi_` is not allowed. FCM and GCM [reserves certain keys](https://firebase.google.com/docs/cloud-messaging/http-server-ref) that cannot be used for those channels.
     * 
     * @param array $gcm GCM specific payload that overrides corresponding
     *                   attributes in generic payload for Bindings with gcm
     *                   BindingType.
     * @return $this Fluent Builder
     */
    public function setGcm($gcm) {
        $this->options['gcm'] = $gcm;
        return $this;
    }

    /**
     * SMS specific payload that overrides corresponding attributes in generic payload for Bindings with sms BindingType.  Each attribute in this JSON object is mapped to the corresponding form parameter of the Twilio [Message](https://www.twilio.com/docs/api/rest/sending-messages) resource.  The following parameters of the Message resource are supported in snake case format: `body`, `media_urls`, `status_callback`, and `max_price`.  The `status_callback` parameter overrides the corresponding parameter in the messaging service if configured. The `media_urls` expects a JSON array.
     * 
     * @param array $sms SMS specific payload that overrides corresponding
     *                   attributes in generic payload for Bindings with sms
     *                   BindingType.
     * @return $this Fluent Builder
     */
    public function setSms($sms) {
        $this->options['sms'] = $sms;
        return $this;
    }

    /**
     * Messenger specific payload that overrides corresponding attributes in generic payload for Bindings with facebook-messenger BindingType.  This value is mapped to the root json dictionary of Facebook's [Send API request](https://developers.facebook.com/docs/messenger-platform/send-api-reference).  Overriding the `recipient` parameter is not allowed.
     * 
     * @param array $facebookMessenger Messenger specific payload that overrides
     *                                 corresponding attributes in generic payload
     *                                 for Bindings with facebook-messenger
     *                                 BindingType.
     * @return $this Fluent Builder
     */
    public function setFacebookMessenger($facebookMessenger) {
        $this->options['facebookMessenger'] = $facebookMessenger;
        return $this;
    }

    /**
     * FCM specific payload that overrides corresponding attributes in generic payload for Bindings with fcm BindingType.  This value is mapped to the root json dictionary. Refer to [FCM documentation](https://firebase.google.com/docs/cloud-messaging/http-server-ref#downstream) for more details.  Target parameters `to`, `registration_ids`, `condition`, and `notification_key` are not allowed. The `twi_` key prefix for custom key-value pairs is reserved for Twilio for future use. Custom data with keys starting with `twi_` is not allowed. Custom data with keys starting with `twi_` is not allowed. FCM and GCM [reserves certain keys](https://firebase.google.com/docs/cloud-messaging/http-server-ref) that cannot be used for those channels.
     * 
     * @param array $fcm FCM specific payload that overrides corresponding
     *                   attributes in generic payload for Bindings with fcm
     *                   BindingType.
     * @return $this Fluent Builder
     */
    public function setFcm($fcm) {
        $this->options['fcm'] = $fcm;
        return $this;
    }

    /**
     * The segment
     * 
     * @param string $segment The segment
     * @return $this Fluent Builder
     */
    public function setSegment($segment) {
        $this->options['segment'] = $segment;
        return $this;
    }

    /**
     * The alexa
     * 
     * @param array $alexa The alexa
     * @return $this Fluent Builder
     */
    public function setAlexa($alexa) {
        $this->options['alexa'] = $alexa;
        return $this;
    }

    /**
     * The destination address in a JSON object (see attributes below).  Multiple ToBinding parameters can be included but the total size of the request entity should not exceed 1MB. This is typically sufficient for 10,000 phone numbers. 
     * 
     * @param string $toBinding The destination address in a JSON object.
     * @return $this Fluent Builder
     */
    public function setToBinding($toBinding) {
        $this->options['toBinding'] = $toBinding;
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
        return '[Twilio.Notify.V1.CreateNotificationOptions ' . implode(' ', $options) . ']';
    }

}
