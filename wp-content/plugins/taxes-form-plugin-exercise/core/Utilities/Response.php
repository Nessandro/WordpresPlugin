<?php

namespace TaxFormPlugin\Core\Utilities;

use TaxFormPlugin\Core\Traits\OutputBuffer;

/**
 * File:   Response.php
 * Date:   08.12.2020
 * Class: Response
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Interfaces
 */
class Response
{

    use OutputBuffer;

    /**
     * @var null
     */
    protected $data = null;

    /**
     * @var int
     */
    protected $status   = 200;
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * Response constructor.
     * @param $data
     * @param $status
     */
    public function __construct($data, $status)
    {
        $this->setData($data);
        $this->setStatus($status);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function addHeader(string $key, string $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     *
     */
    protected function outputHeaders()
    {
        foreach ($this->getHeaders() as $name => $value)
        {
            header("{$name}: {$value}");
        }
    }

    /**
     *
     */
    protected function outputStatus()
    {
        http_response_code($this->getStatus());
    }

    /**
     *
     */
    protected function outputContent()
    {
        echo $this->data;
        exit;
    }

    /**
     *
     */
    public function send()
    {
        $this->cleanOutputBuffer();
        $this->outputHeaders();
        $this->outputStatus();
        $this->outputContent();

    }

    /**
     * @param array $data
     * @param int $status
     */
    public static function json(array $data = [], $status = 200)
    {
        $response = new static(json_encode($data), $status);
        $response->addHeader('Content-Type', 'application/json');
        $response->send();
    }



}