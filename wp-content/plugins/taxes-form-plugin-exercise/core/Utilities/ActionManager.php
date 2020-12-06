<?php

namespace TaxFormPlugin\Core\Utilities;

use TaxFormPlugin\Core\Interfaces\AbstractShortCode;

/**
 * File:   ActionManager.php
 * Date:   06.12.2020
 * Class: ActionManager
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Utilities
 */
class ActionManager
{
    protected $locations = [];

    public function __construct()
    {
        //todo: load from some configuration place

        $this->locations[] = [
            'path' => PluginConstants::getPluginRootDir() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Actions',
            'namespace' => '\\TaxFormPlugin\\App\\Actions\\'
        ];

        $this->locations[] = [
            'path' => PluginConstants::getPluginRootDir() . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Actions',
            'namespace' => '\\TaxFormPlugin\\Core\\Actions\\'
        ];
    }

    /**
     *
     * load short codes per locations
     */
    public function load()
    {
        foreach ($this->locations as $location) {
            $this->loadFromLocation($location['path'], $location['namespace']);
        }

    }

    /**
     * load all files from location
     * @param string $location
     */
    protected function loadFromLocation(string $location, string $namespace)
    {
        $files = glob($location . '/*.php');
        foreach ($files as $file) {
            $className = $namespace . str_replace('.php', '', basename($file));

            /* @var $shortCode AbstractAction */
            $shortCode = new $className();

            add_action($shortCode->getHookId(), function () use ($shortCode) {
                return $shortCode->fire();
            });
        }
    }
}