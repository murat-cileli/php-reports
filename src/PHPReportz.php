<?php

namespace PHPReportz;

class PHPReportz
{
    protected $api_key;
    protected $template_id;
    protected $parameters;

    public function __construct($api_key)
    {
        if (is_null($api_key) || strlen($api_key) != 20) {
            throw new \Exception("Invalid API key");
        }
    }
}