<?php

namespace TaxFormPlugin\Core\Utilities;

use TaxFormPlugin\Core\Interfaces\AbstractAction;
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

        //app actions
        $this->locations[] = [
            'path'      => PluginConstants::getPluginRootDir() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Actions',
            'namespace' => PluginConstants::getPluginRootNamespace().'App\\Actions\\'
        ];

        //core actions
        $this->locations[] = [
            'path'      => PluginConstants::getPluginRootDir() . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Actions',
            'namespace' => PluginConstants::getPluginRootNamespace().'Core\\Actions\\'
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
            if(!($shortCode instanceof AbstractAction) || !$shortCode->getHookId() ) {
                continue;
            }


            add_action($shortCode->getHookId(), function () use ($shortCode) {
                return $shortCode->fire();
            });
        }
    }
}