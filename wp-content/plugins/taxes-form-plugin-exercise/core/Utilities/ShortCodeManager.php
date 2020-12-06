<?php

namespace TaxFormPlugin\Core\Utilities;

use ModulesGarden\OnePageOrder\Core\ModuleConstants;
use TaxFormPlugin\Core\Interfaces\AbstractShortCode;

/**
 * File:   ShortCodeManager.php
 * Date:   06.12.2020
 * Class: ShortCodeManager
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Utilities
 */
class ShortCodeManager
{

    protected $locations = [];

    public function __construct()
    {
        //todo: load from some configuration place

        $this->locations[] = [
            'path'      => PluginConstants::getPluginRootDir().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'ShortCodes',
            'namespace' => '\\TaxFormPlugin\\App\\ShortCodes\\'
        ];

        $this->locations[] = [
            'path'      => PluginConstants::getPluginRootDir().DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'ShortCodes',
            'namespace' =>'\\TaxFormPlugin\\Core\\ShortCodes\\'
        ];
    }

    /**
     *
     * load short codes per locations
     */
    public function load()
    {
        foreach($this->locations as $location)
        {
            $this->loadFromLocation($location['path'], $location['namespace']);
        }

    }

    /**
     * load all files from location
     * @param string $location
     */
    protected function loadFromLocation(string $location, string $namespace)
    {
        $files      = glob($location.'/*.php');
        foreach($files as $file)
        {
            $className = $namespace.str_replace('.php','', basename($file));

            /* @var $shortCode AbstractShortCode */
            $shortCode = new $className();

            add_shortcode($shortCode->getId(), function($args = [], string $content, string $tag) use($shortCode){
                return $shortCode->fire($args, $content, $tag);
            });
        }

    }
}