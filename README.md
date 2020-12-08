# Wordpress Plugin

The plugin provides the shortcode (`[tax-form-exercise]`) to add the new products, tax, currency and returns the brutto, netto and tax prices.

## Installation

Copy the `wp-content` folder into the wordpress main folder and install the plugin in the admin area.


## Description

The plugin register own functions into the wordpress by [Register Class](https://github.com/Nessandro/WordpresPlugin/blob/master/wp-content/plugins/taxes-form-plugin-exercise/core/Utilities/Register.php)

Plugin provides a simple architecture based on the MVC.

The actions, shortCodes and customTypes are dynamically loaded into the plugin from the [Actions](https://github.com/Nessandro/WordpresPlugin/tree/master/wp-content/plugins/taxes-form-plugin-exercise/app/Actions), [ShortCodes](https://github.com/Nessandro/WordpresPlugin/tree/master/wp-content/plugins/taxes-form-plugin-exercise/app/ShortCodes) and [Custom Types](https://github.com/Nessandro/WordpresPlugin/tree/master/wp-content/plugins/taxes-form-plugin-exercise/app/CustomTypes)

## Routing

The plugin provides a simple routing.

Add the `action` attribute to the request with the plugin name as a value (`taxes-form-plugin-exercise`) and `rp` attiribute as a route path value (e.g `/product/prices`).

The routes are defined in the [`route.php`](https://github.com/Nessandro/WordpresPlugin/blob/master/wp-content/plugins/taxes-form-plugin-exercise/app/Configuration/routes.php) file 



More helpful object can be found in the [Utilities](https://github.com/Nessandro/WordpresPlugin/tree/master/wp-content/plugins/taxes-form-plugin-exercise/core/Utilities) folder.

