<?php

namespace TaxFormPlugin\Core\Interfaces;

/**
 * File:   AbstractCustomType.php
 * Date:   08.12.2020
 * Class: AbstractCustomType
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Interfaces
 */
abstract class AbstractCustomType
{

    /**
     * @var
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return [];
    }

}