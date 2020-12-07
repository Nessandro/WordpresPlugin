<?php

namespace TaxFormPlugin\Core\Interfaces;

/**
 * File:   AbstractUiComponent.php
 * Date:   07.12.2020
 * Class: AbstractUiComponent
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Interfaces
 */
class AbstractUiComponent
{

    protected $id = 'abstractUiComponent';

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * render html
     * @return string
     */
    public function toHtml()
    {
       return "<h3>Abstract UI Component</h3>";
    }

}