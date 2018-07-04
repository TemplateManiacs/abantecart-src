<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand;

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
 * @property string friendlyName
 * @property string latestModelBuildSid
 * @property array links
 * @property boolean logQueries
 * @property string sid
 * @property integer ttl
 * @property string uniqueName
 * @property string url
 */
class ServiceInstance extends InstanceResource {
    protected $_fieldTypes = null;
    protected $_intents = null;
    protected $_modelBuilds = null;
    protected $_queries = null;

    /**
     * Initialize the ServiceInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Understand\ServiceInstance 
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'latestModelBuildSid' => Values::array_get($payload, 'latest_model_build_sid'),
            'links' => Values::array_get($payload, 'links'),
            'logQueries' => Values::array_get($payload, 'log_queries'),
            'sid' => Values::array_get($payload, 'sid'),
            'ttl' => Values::array_get($payload, 'ttl'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Preview\Understand\ServiceContext Context for this
     *                                                        ServiceInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ServiceContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a ServiceInstance
     * 
     * @return ServiceInstance Fetched ServiceInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the ServiceInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the ServiceInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Access the fieldTypes
     * 
     * @return \Twilio\Rest\Preview\Understand\Service\FieldTypeList 
     */
    protected function getFieldTypes() {
        return $this->proxy()->fieldTypes;
    }

    /**
     * Access the intents
     * 
     * @return \Twilio\Rest\Preview\Understand\Service\IntentList 
     */
    protected function getIntents() {
        return $this->proxy()->intents;
    }

    /**
     * Access the modelBuilds
     * 
     * @return \Twilio\Rest\Preview\Understand\Service\ModelBuildList 
     */
    protected function getModelBuilds() {
        return $this->proxy()->modelBuilds;
    }

    /**
     * Access the queries
     * 
     * @return \Twilio\Rest\Preview\Understand\Service\QueryList 
     */
    protected function getQueries() {
        return $this->proxy()->queries;
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
        return '[Twilio.Preview.Understand.ServiceInstance ' . implode(' ', $context) . ']';
    }
}