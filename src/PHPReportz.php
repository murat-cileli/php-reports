<?php

namespace PHPReportz;

/**
 * Class PHPReportz
 * @package PHPReportz
 */
class PHPReportz implements \JsonSerializable
{

    /**
     * Output file type selection
     */
    const OUTPUT_DOCX = 1;
    const OUTPUT_PDF = 2;

    /**
     * Get download URL as JSON or direct download report
     */
    const ACTION_GET_DOWNLOAD_URL = 3;
    const ACTION_FORCE_DOWNLOAD = 4;

    protected $api_key;
    protected $template_id;
    protected $parameters;
    private $json;

    /**
     * PHPReportz constructor.
     * @param $api_key
     */
    public function __construct($api_key)
    {
        if (empty($api_key) || strlen($api_key) != 24) {
            throw new \Exception("Invalid API key");
        }

        $this->api_key = $api_key;
    }

    /**
     * @return mixed
     */
    private function getApiKey()
    {
        if (empty($api_key)) {
            throw new \Exception("Invalid API key");
        }

        return $this->api_key;
    }

    /**
     * @param mixed $template_id
     */
    public function setTemplateId($template_id)
    {
        if (empty($template_id) || !is_int($template_id)) {
            throw new \Exception("Invalid Template ID");
        }

        $this->template_id = $template_id;
    }

    /**
     * @return mixed
     */
    private function getTemplateİd()
    {
        if (empty($template_id)) {
            throw new \Exception("Invalid Template ID");
        }

        return $this->template_id;
    }

    /**
     * @param mixed $parameters
     */
    public function setParameters($parameters)
    {
        if (empty($parameters) || !is_array($parameters)) {
            throw new \Exception("Parameters must be an array");
        }

        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    private function getParameters()
    {
        if (empty($parameters)) {
            throw new \Exception("Parameters must be an array");
        }

        return $this->parameters;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $this->json = [
            'api_key'     => $this->getApiKey(),
            'template_id' => $this->getTemplateİd(),
            'parameters'  => $this->getParameters()
        ];
    }
}