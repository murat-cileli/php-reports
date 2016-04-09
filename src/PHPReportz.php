<?php

namespace PHPReportz;

/**
 * Class PHPReportz
 * @package PHPReportz
 */
class PHPReportz implements \JsonSerializable
{
    protected $api_key;
    protected $template_id;
    protected $parameters;

    /**
     * PHPReportz constructor.
     * @param $api_key
     */
    public function __construct($api_key)
    {
        if (is_null($api_key) || strlen($api_key) != 24) {
            throw new \Exception("Invalid API key");
        }

        $this->api_key = $api_key;
    }

    /**
     * @param mixed $template_id
     */
    public function setTemplateId($template_id)
    {
        if (is_null($template_id) || !is_int($template_id)) {
            throw new \Exception("Invalid Template ID");
        }

        $this->template_id = $template_id;
    }

    /**
     * @param mixed $parameters
     */
    public function setParameters($parameters)
    {
        if (is_null($parameters) || !is_array($parameters)) {
            throw new \Exception("Parameters must be an array");
        }

        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'api_key'     => $this->api_key,
            'template_id' => $this->template_id,
            'parameters'  => $this->parameters
        ];
    }
}