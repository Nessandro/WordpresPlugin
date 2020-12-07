<?php

namespace TaxFormPlugin\Core\Utilities;

use TaxFormPlugin\Core\Configuration\Activate;
use TaxFormPlugin\Core\Configuration\Deactivate;
use TaxFormPlugin\Core\Configuration\Uninstall;

/**
 * File:   Register.php
 * Date:   06.12.2020
 * Class: Register
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Utilities
 */
class Register
{

    /**
     * register all functions on create
     * Register constructor.
     */
    public function __construct()
    {
        $this->initialize();
    }


    /**
     *
     */
    public function initialize()
    {
        $this->registerActivationFunction();
        $this->registerDeactivationFunction();
        $this->registerUninstallFunction();
        $this->registerFilters();
        $this->registerActions();
        $this->registerShortCodes();
        $this->registerControllerRouting();
    }

    /**
     * register activate function
     */
    public function registerActivationFunction()
    {
        register_activation_hook(PluginConstants::getPluginMainFilePath(), function(){
            $activate = new Activate();
            return $activate->execute();
        });
    }

    /**
     * register deactivate function
     */
    public function registerDeactivationFunction()
    {
        register_deactivation_hook(PluginConstants::getPluginMainFilePath(), function(){
            $deactivate = new Deactivate();
            return $deactivate->execute();
        });
    }

    /**
     * registration of the uninstall hook function if the uninstall file does not exists
     */
    public function registerUninstallFunction()
    {
        if(file_exists(PluginConstants::getPluginRootDir().DIRECTORY_SEPARATOR.'uninstall.php')) {
            return;
        }
//        register_uninstall_hook(PluginConstants::getPluginMainFilePath(), function(){
//            $uninstall = new Uninstall();
//            return $uninstall->execute();
//        });

    }

    /**
     * register hook filters
     */
    public function registerFilters()
    {
        //todo register filters
    }

    /**
     * register actions
     */
    public function registerActions()
    {
        $manager = new ActionManager();
        $manager->load();
    }

    /**
     *
     * register short codes
     */
    public function registerShortCodes()
    {
        $manager = new ShortCodeManager();
        $manager->load();
    }

    /**
     *
     */
    public function registerControllerRouting()
    {

        add_action('wp_ajax_'.PluginConstants::getPluginMainFileName(), function(){
            $routing = new Routing(true);
            return $routing->resolve();
        });


        add_action('wp_ajax_nopriv_'.PluginConstants::getPluginMainFileName(), function(){
            $routing = new Routing(false);
            return $routing->resolve();
        });
    }

}