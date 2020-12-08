<?php

namespace TaxFormPlugin\Core\Utilities;

use TaxFormPlugin\Core\Interfaces\AbstractRouteController;

/**
 * File:   Routing.php
 * Date:   07.12.2020
 * Class: Routing
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Utilities
 */
class Routing
{
    /**
     * @var bool
     */
    protected $loggedIn = false;

    /**
     * @var array
     */
    protected $routes = [];
    /**
     * Routing constructor.
     * @param bool $loggedIn
     */
    public function __construct($loggedIn = false)
    {
        $this->setLoggedIn($loggedIn);
        $this->load();
    }

    /**
     *
     */
    protected function load()
    {
        $path = PluginConstants::getPluginRootDir().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Configuration'.DIRECTORY_SEPARATOR.'routes.php';
        if(file_exists($path)) {
            $routes = require_once $path;

            $this->routes = is_array($routes) ? $routes : [];
        }
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->loggedIn;
    }

    /**
     * @param bool $loggedIn
     */
    public function setLoggedIn(bool $loggedIn): void
    {
        $this->loggedIn = $loggedIn;
    }

    /**
     *
     */
    protected function runController()
    {
        $requestPath = $_REQUEST['rp'];
        if($class = $this->routes[$requestPath])
        {
            return $this->controller($class);

        }else{
            Response::json(['message' => 'Not found.'], 404);
        }
    }

    /**
     * @param $class
     * @return mixed
     * @throws \Exception
     */
    protected function controller($class)
    {
        $controller = new $class();

        if(!$controller instanceof AbstractRouteController) {
            throw new \Exception('Path controller is not compatible.');
        }

        if(!$this->isLoggedIn() && $controller->isOnlyLoggedIn()){
            Response::json(['message' => 'Forbidden'], 403);
        }

        $method = $controller->getDefaultMethod();
        return $controller->$method();
    }
    /**
     *
     */
    public function resolve()
    {
        try{
            $this->runController();
        }catch (\Exception $exception)
        {
            Response::json(['message' => $exception->getMessage()], 500);
        }
    }

}