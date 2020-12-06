<?php

namespace TaxFormPlugin\Core\Utilities;
/**
 * File:   PluginConstants.php
 * Date:   06.12.2020
 * Class: PluginConstants
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package TaxFormPlugin\Core\Utilities
 */
class PluginConstants
{

    /**
     * @description plugin root dir
     * @var string
     */
    protected static $pluginRootDir         = null;

    /**
     * @description plugin main file path
     * @var string
     */
    protected static $pluginMainFilePath    = null;

    /**
     * @description plugin main file name
     * @var string
     */
    protected static $pluginMainFileName    = null;


    /**
     *
     * create instance of this file is disabled
     * PluginConstants constructor.
     */
    private function __construct(){}

    /**
     * clone instance of this file is disabled
     */
    private function __clone(){}

    /**
     *
     */
    public static function initialize()
    {
        static::$pluginRootDir      = dirname(dirname(__DIR__));
        static::$pluginMainFileName = basename(static::$pluginRootDir);
        static::$pluginMainFilePath = static::$pluginRootDir.DIRECTORY_SEPARATOR.static::$pluginMainFileName .'.php';
    }

    /**
     * return root plugin dir path
     * @return string
     */
    public static function getPluginRootDir(): string
    {
        return static::$pluginRootDir;
    }

    /**
     * @return string
     */
    public static function getPluginMainFileName()
    {
        return static::$pluginMainFileName;
    }

    /**
     * @return string
     */
    public static function getPluginMainFilePath()
    {
        return static::$pluginMainFilePath;
    }
}