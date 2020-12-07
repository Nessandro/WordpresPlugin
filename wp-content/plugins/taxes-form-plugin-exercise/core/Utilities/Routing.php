<?php

namespace TaxFormPlugin\Core\Utilities;

/**
 * File:   Routing.php
 * Date:   07.12.2020
 * Class: Routing
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Utilities
 */
class Routing
{
    /**
     * @var bool
     */
    protected $loggedIn = false;

    /**
     * Routing constructor.
     * @param bool $loggedIn
     */
    public function __construct($loggedIn = false)
    {
        $this->setLoggedIn($loggedIn);
    }


    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->loggedIn;
    }

    /**
     * @param bool $loggedIn
     */
    public function setLoggedIn(bool $loggedIn): void
    {
        $this->loggedIn = $loggedIn;
    }

    /**
     *
     */
    public function resolve()
    {

        var_dump('Routing Controller');
        var_dump($this->loggedIn);
        die();

    }

}