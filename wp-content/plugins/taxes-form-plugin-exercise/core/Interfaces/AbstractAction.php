<?php

namespace TaxFormPlugin\Core\Interfaces;

/**
 * File:   AbstractAction.php
 * Date:   06.12.2020
 * Class: AbstractAction
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Interfaces
 */
abstract class AbstractAction
{
    protected $hookId = false;

    /**
     * @return mixed
     */
    public function getHookId()
    {
        return $this->hookId;
    }

    /**
     * @param mixed $hookId
     */
    public function setHookId($hookId): void
    {
        $this->hookId = $hookId;
    }



    public abstract function fire();

}