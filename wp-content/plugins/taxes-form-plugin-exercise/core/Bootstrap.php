<?php

/**
 * initialize autoloader
 */
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

/**
 *
 * initialize module constants
 */
\TaxFormPlugin\Core\Utilities\PluginConstants::initialize();

/**
 *
 * register all plugin function in the wordpress.
 */
new \TaxFormPlugin\Core\Utilities\Register();