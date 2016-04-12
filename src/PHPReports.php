<?php
/*
 * This file is part of the "PHP-Reports" package.
 * Author: Murat Çileli <murat.cileli@gmail.com>
 * Web: https://www.php-reports.com
 */

namespace PHPReports;

/**
 * Class PHPReports
 * @package PHPReports
 */
class PHPReports
{
    /**
     * Options to output file type selection
     */
    const OUTPUT_DOCX = 1;
    const OUTPUT_PDF = 2;

    /**
     * Options to get download URL as JSON or direct download generated report
     */
    const ACTION_GET_DOWNLOAD_URL = 1;
    const ACTION_FORCE_DOWNLOAD = 2;

    protected $api_key;
    protected $template_id;
    protected $template_variables;
    protected $output_file_name;
    protected $output_file_type;
    protected $output_action;

    /**
     * Get free API Key from https://www.php-reports.com
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
        if (empty($this->api_key)) {
            throw new \Exception("Invalid API key");
        }

        return $this->api_key;
    }

    /**
     * @param mixed $template_id
     */
    public function setTemplateId($template_id)
    {
        if (empty($template_id) || !is_numeric($template_id)) {
            throw new \Exception("Invalid Template ID");
        }

        $this->template_id = $template_id;
    }

    /**
     * @return mixed
     */
    private function getTemplateId()
    {
        if (empty($this->template_id)) {
            throw new \Exception("Invalid Template ID");
        }

        return $this->template_id;
    }

    /**
     * @param mixed $template_variables
     */
    public function setTemplateVariables($template_variables)
    {
        if (empty($template_variables) || !is_array($template_variables)) {
            throw new \Exception("Parameters must be an array");
        }

        $this->template_variables = $template_variables;
    }

    /**
     * @return mixed
     */
    private function getTemplateVariables()
    {
        if (empty($this->template_variables)) {
            throw new \Exception("Template variables must be an array");
        }

        return $this->template_variables;
    }

    /**
     * @return mixed
     */
    public function getOutputFileName()
    {
        return $this->output_file_name;
    }

    /**
     * @param mixed $output_file_name
     */
    public function setOutputFileName($output_file_name)
    {
        $this->output_file_name = $output_file_name;
    }

    /**
     * @param mixed $template_id
     */
    public function setOutputFileType($type = self::OUTPUT_PDF)
    {
        if ($type != self::OUTPUT_PDF && $type != self::OUTPUT_DOCX) {
            throw new \Exception("Invalid output file type specified");
        }

        $this->output_file_type = $type;
    }

    /**
     * @return mixed
     */
    private function getOutputFileType()
    {
        if ($this->output_file_type != self::OUTPUT_PDF && $this->output_file_type != self::OUTPUT_DOCX) {
            $this->output_file_type = self::OUTPUT_PDF;
        }

        return $this->output_file_type;
    }

    /**
     * @return mixed
     */
    public function getOutputAction()
    {
        if ($this->output_action != self::ACTION_FORCE_DOWNLOAD && $this->output_action != self::ACTION_GET_DOWNLOAD_URL) {
            $this->output_action = self::ACTION_FORCE_DOWNLOAD;
        }

        return $this->output_action;
    }

    /**
     * @param mixed $output_action
     */
    public function setOutputAction($output_action = self::ACTION_FORCE_DOWNLOAD)
    {
        if ($output_action != self::ACTION_FORCE_DOWNLOAD && $output_action != self::ACTION_GET_DOWNLOAD_URL) {
            $output_action = self::ACTION_FORCE_DOWNLOAD;
        }

        $this->output_action = $output_action;
    }

    /**
     * @param int $action
     * @throws \Exception
     */
    public function generateReport()
    {
        $post_fields = array(
            'api_key'            => $this->getApiKey(),
            'template_id'        => $this->getTemplateId(),
            'template_variables' => $this->getTemplateVariables(),
            'output_file_name'   => $this->getOutputFileName(),
            'output_file_type'   => $this->getOutputFileType(),
            'output_action'      => $this->getOutputAction()
        );

        $json = json_encode($post_fields);

        $ch = curl_init('https://www.php-reports.com/api/report/generate');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "json={$json}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code != 200 && $http_code != 302) {
            throw new \Exception("Can not make API request. HTTP status code: {$http_code}");
        } else {
            echo $response;
        }
    }
}