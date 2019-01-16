<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V2;

use Twilio\Options;
use Twilio\Values;

abstract class CredentialOptions {

    /**
     * @param string $friendlyName Friendly name for stored credential
     * @param string $certificate [APN only] URL encoded representation of the
     *                            certificate, e.
     * @param string $privateKey [APN only] URL encoded representation of the
     *                           private key, e.
     * @param boolean $sandbox [APN only] use this credential for sending to
     *                         production or sandbox APNs
     * @param string $apiKey [GCM only] This is the "API key" for project from
     *                       Google Developer console for your GCM Service
     *                       application credential
     * @param string $secret [FCM only] This is the "Server key" of your project
     *                       from Firebase console under Settings / Cloud messaging.
     * @return CreateCredentialOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $certificate = Values::NONE, $privateKey = Values::NONE, $sandbox = Values::NONE, $apiKey = Values::NONE, $secret = Values::NONE) {
        return new CreateCredentialOptions($friendlyName, $certificate, $privateKey, $sandbox, $apiKey, $secret);
    }

    /**
     * @param string $friendlyName Friendly name for stored credential
     * @param string $certificate [APN only] URL encoded representation of the
     *                            certificate, e.
     * @param string $privateKey [APN only] URL encoded representation of the
     *                           private key, e.
     * @param boolean $sandbox [APN only] use this credential for sending to
     *                         production or sandbox APNs
     * @param string $apiKey [GCM only] This is the "API key" for project from
     *                       Google Developer console for your GCM Service
     *                       application credential
     * @param string $secret [FCM only] This is the "Server key" of your project
     *                       from Firebase console under Settings / Cloud messaging.
     * @return UpdateCredentialOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $certificate = Values::NONE, $privateKey = Values::NONE, $sandbox = Values::NONE, $apiKey = Values::NONE, $secret = Values::NONE) {
        return new UpdateCredentialOptions($friendlyName, $certificate, $privateKey, $sandbox, $apiKey, $secret);
    }

}

class CreateCredentialOptions extends Options {

    /**
     * @param string $friendlyName Friendly name for stored credential
     * @param string $certificate [APN only] URL encoded representation of the
     *                            certificate, e.
     * @param string $privateKey [APN only] URL encoded representation of the
     *                           private key, e.
     * @param boolean $sandbox [APN only] use this credential for sending to
     *                         production or sandbox APNs
     * @param string $apiKey [GCM only] This is the "API key" for project from
     *                       Google Developer console for your GCM Service
     *                       application credential
     * @param string $secret [FCM only] This is the "Server key" of your project
     *                       from Firebase console under Settings / Cloud messaging.
     */
    public function __construct($friendlyName = Values::NONE, $certificate = Values::NONE, $privateKey = Values::NONE, $sandbox = Values::NONE, $apiKey = Values::NONE, $secret = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['certificate'] = $certificate;
        $this->options['privateKey'] = $privateKey;
        $this->options['sandbox'] = $sandbox;
        $this->options['apiKey'] = $apiKey;
        $this->options['secret'] = $secret;
    }

    /**
     * Friendly name for stored credential
     * 
     * @param string $friendlyName Friendly name for stored credential
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * [APN only] URL encoded representation of the certificate, e.g.
      `-----BEGIN CERTIFICATE-----
      MIIFnTCCBIWgAwIBAgIIAjy9H849+E8wDQYJKoZIhvcNAQEFBQAwgZYxCzAJBgNV.....A==
      -----END CERTIFICATE-----`
     * 
     * @param string $certificate [APN only] URL encoded representation of the
     *                            certificate, e.
     * @return $this Fluent Builder
     */
    public function setCertificate($certificate) {
        $this->options['certificate'] = $certificate;
        return $this;
    }

    /**
     * [APN only] URL encoded representation of the private key, e.g.
      `-----BEGIN RSA PRIVATE KEY-----
      MIIEpQIBAAKCAQEAuyf/lNrH9ck8DmNyo3fGgvCI1l9s+cmBY3WIz+cUDqmxiieR.
      -----END RSA PRIVATE KEY-----`
     * 
     * @param string $privateKey [APN only] URL encoded representation of the
     *                           private key, e.
     * @return $this Fluent Builder
     */
    public function setPrivateKey($privateKey) {
        $this->options['privateKey'] = $privateKey;
        return $this;
    }

    /**
     * [APN only] use this credential for sending to production or sandbox APNs (string `true` or `false`)
     * 
     * @param boolean $sandbox [APN only] use this credential for sending to
     *                         production or sandbox APNs
     * @return $this Fluent Builder
     */
    public function setSandbox($sandbox) {
        $this->options['sandbox'] = $sandbox;
        return $this;
    }

    /**
     * [GCM only] This is the "API key" for project from Google Developer console for your GCM Service application credential
     * 
     * @param string $apiKey [GCM only] This is the "API key" for project from
     *                       Google Developer console for your GCM Service
     *                       application credential
     * @return $this Fluent Builder
     */
    public function setApiKey($apiKey) {
        $this->options['apiKey'] = $apiKey;
        return $this;
    }

    /**
     * [FCM only] This is the "Server key" of your project from Firebase console under Settings / Cloud messaging.
     * 
     * @param string $secret [FCM only] This is the "Server key" of your project
     *                       from Firebase console under Settings / Cloud messaging.
     * @return $this Fluent Builder
     */
    public function setSecret($secret) {
        $this->options['secret'] = $secret;
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
        return '[Twilio.IpMessaging.V2.CreateCredentialOptions ' . implode(' ', $options) . ']';
    }

}

class UpdateCredentialOptions extends Options {

    /**
     * @param string $friendlyName Friendly name for stored credential
     * @param string $certificate [APN only] URL encoded representation of the
     *                            certificate, e.
     * @param string $privateKey [APN only] URL encoded representation of the
     *                           private key, e.
     * @param boolean $sandbox [APN only] use this credential for sending to
     *                         production or sandbox APNs
     * @param string $apiKey [GCM only] This is the "API key" for project from
     *                       Google Developer console for your GCM Service
     *                       application credential
     * @param string $secret [FCM only] This is the "Server key" of your project
     *                       from Firebase console under Settings / Cloud messaging.
     */
    public function __construct($friendlyName = Values::NONE, $certificate = Values::NONE, $privateKey = Values::NONE, $sandbox = Values::NONE, $apiKey = Values::NONE, $secret = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['certificate'] = $certificate;
        $this->options['privateKey'] = $privateKey;
        $this->options['sandbox'] = $sandbox;
        $this->options['apiKey'] = $apiKey;
        $this->options['secret'] = $secret;
    }

    /**
     * Friendly name for stored credential
     * 
     * @param string $friendlyName Friendly name for stored credential
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * [APN only] URL encoded representation of the certificate, e.g.
      `-----BEGIN CERTIFICATE-----
      MIIFnTCCBIWgAwIBAgIIAjy9H849+E8wDQYJKoZIhvcNAQEFBQAwgZYxCzAJBgNV.....A==
      -----END CERTIFICATE-----`
     * 
     * @param string $certificate [APN only] URL encoded representation of the
     *                            certificate, e.
     * @return $this Fluent Builder
     */
    public function setCertificate($certificate) {
        $this->options['certificate'] = $certificate;
        return $this;
    }

    /**
     * [APN only] URL encoded representation of the private key, e.g.
      `-----BEGIN RSA PRIVATE KEY-----
      MIIEpQIBAAKCAQEAuyf/lNrH9ck8DmNyo3fGgvCI1l9s+cmBY3WIz+cUDqmxiieR.
      -----END RSA PRIVATE KEY-----`
     * 
     * @param string $privateKey [APN only] URL encoded representation of the
     *                           private key, e.
     * @return $this Fluent Builder
     */
    public function setPrivateKey($privateKey) {
        $this->options['privateKey'] = $privateKey;
        return $this;
    }

    /**
     * [APN only] use this credential for sending to production or sandbox APNs (string `true` or `false`)
     * 
     * @param boolean $sandbox [APN only] use this credential for sending to
     *                         production or sandbox APNs
     * @return $this Fluent Builder
     */
    public function setSandbox($sandbox) {
        $this->options['sandbox'] = $sandbox;
        return $this;
    }

    /**
     * [GCM only] This is the "API key" for project from Google Developer console for your GCM Service application credential
     * 
     * @param string $apiKey [GCM only] This is the "API key" for project from
     *                       Google Developer console for your GCM Service
     *                       application credential
     * @return $this Fluent Builder
     */
    public function setApiKey($apiKey) {
        $this->options['apiKey'] = $apiKey;
        return $this;
    }

    /**
     * [FCM only] This is the "Server key" of your project from Firebase console under Settings / Cloud messaging.
     * 
     * @param string $secret [FCM only] This is the "Server key" of your project
     *                       from Firebase console under Settings / Cloud messaging.
     * @return $this Fluent Builder
     */
    public function setSecret($secret) {
        $this->options['secret'] = $secret;
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
        return '[Twilio.IpMessaging.V2.UpdateCredentialOptions ' . implode(' ', $options) . ']';
    }

}
