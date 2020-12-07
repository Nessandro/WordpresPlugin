<?php

namespace TaxFormPlugin\Core\Utilities;

/**
 * File:   Locations.php
 * Date:   07.12.2020
 * Class: Locations
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Utilities
 */
class Locations
{

    /**
     * @return string
     */
    public static function getTemplatePath()
    {
        return PluginConstants::getPluginRootDir().DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'templates';
    }

    /**
     * @return string
     */
    public static function getScriptsPath()
    {
        return PluginConstants::getPluginRootDir().DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR;
    }

}