<?php

namespace TaxFormPlugin\Core\Interfaces;

use TaxFormPlugin\Core\Utilities\Response;

/**
 * File:   AbstractRouteController.php
 * Date:   08.12.2020
 * Class: AbstractRouteController
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Interfaces
 */
abstract class AbstractRouteController
{

    /**
     * @var string
     */
    protected $defaultMethod = 'index';

    /**
     * @var bool
     */
    protected $onlyLoggedIn = false;

    /**
     * @return string
     */
    public function getDefaultMethod()
    {
        return $this->defaultMethod;
    }

    /**
     * @return bool
     */
    public function isOnlyLoggedIn(): bool
    {
        return $this->onlyLoggedIn;
    }

    /**
     * return hello world message
     */
    public function index()
    {
        return Response::json(['message' => 'Hello world!', 'controller' => __CLASS__], 200);
    }

}