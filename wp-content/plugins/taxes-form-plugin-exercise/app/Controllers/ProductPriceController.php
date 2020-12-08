<?php
namespace TaxFormPlugin\App\Controllers;
use TaxFormPlugin\Core\Interfaces\AbstractRouteController;

/**
 * File:   ProductPriceController.php
 * Date:   08.12.2020
 * Class: ProductPriceController
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package TaxFormPlugin\App\Controllers
 */
class ProductPriceController extends AbstractRouteController
{

    public function index()
    {

        $tax            = $_REQUEST['tax'];
        $nettoPrice     = $_REQUEST['nettoPrice'];
        $productName    = $_REQUEST['productName'];
        $currency       = $_REQUEST['currency'];

        var_dump($tax);
        var_dump($nettoPrice);
        var_dump($productName);
        var_dump($currency);
        var_dump('Welcome');
        die();


    }

}