<?php

namespace TaxFormPlugin\Core\Utilities;

use TaxFormPlugin\Core\Interfaces\AbstractAction;
use TaxFormPlugin\Core\Interfaces\AbstractCustomType;

/**
 * File:   CustomTypesManager.php
 * Date:   08.12.2020
 * Class: CustomTypesManager
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Utilities
 */
class CustomTypesManager
{

    /**
     * @var array
     */
    protected $locations = [];

    /**
     * ActionManager constructor.
     */
    public function __construct()
    {
        //app actions
        $this->locations[] = [
            'path'      => PluginConstants::getPluginRootDir() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'CustomTypes',
            'namespace' => PluginConstants::getPluginRootNamespace().'App\\CustomTypes\\'
        ];

        //core actions
        $this->locations[] = [
            'path'      => PluginConstants::getPluginRootDir() . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'CustomTypes',
            'namespace' => PluginConstants::getPluginRootNamespace().'Core\\CustomTypes\\'
        ];
    }

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

            /* @var $shortCode AbstractCustomType */
            $customType = new $className();
            if(!$customType instanceof AbstractCustomType ) {
                continue;
            }

            register_post_type($customType->getName(), $customType->getAttributes());
        }
    }

}