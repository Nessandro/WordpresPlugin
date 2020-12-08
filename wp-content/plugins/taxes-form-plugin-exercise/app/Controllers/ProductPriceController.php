<?php
namespace TaxFormPlugin\App\Controllers;
use TaxFormPlugin\App\CustomTypes\Product;
use TaxFormPlugin\Core\Interfaces\AbstractRouteController;
use TaxFormPlugin\Core\Utilities\Response;

/**
 * File:   ProductPriceController.php
 * Date:   08.12.2020
 * Class: ProductPriceController
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package TaxFormPlugin\App\Controllers
 */
class ProductPriceController extends AbstractRouteController
{

    /**
     * @var array
     */
    protected $errors = [];

    /**
     *
     */
    public function index()
    {

        try{
            if($this->isValidationErrors())
            {
                return Response::json(['errors' => $this->errors], 400);
            }

            return $this->execute();
        }catch (\Throwable $exception)
        {
            var_dump($exception->getMessage());
        }
        die();
    }

    /**
     * @return bool
     */
    protected function isValidationErrors()
    {
        $this->errors = [];
        if(!is_numeric($_REQUEST['tax'])){
            $this->errors[] = 'Tax format incorrect';
        }

        if(!is_numeric($_REQUEST['nettoPrice'])){
            $this->errors[] = 'Netto Price format incorrect';
        }

        if(!$_REQUEST['productName']){
            $this->errors[] = 'Product Name cannot be empty';
        }

        if(!$_REQUEST['currency']){
            $this->errors[] = 'Currency cannot be empty';
        }

        return count($this->errors) > 0;
    }

    /**
     *
     */
    public function execute()
    {
        $tax            = $_REQUEST['tax'];
        $nettoPrice     = $_REQUEST['nettoPrice'];
        $productName    = $_REQUEST['productName'];
        $currency       = $_REQUEST['currency'];

        $result = $this->addCustopmType($productName, ['productName' => $productName, 'nettoPrice' => $nettoPrice,  'tax'=> $tax, 'currency' => $currency ]);

        $taxValue = ($nettoPrice * $tax)/ 100;
        $brutto = $nettoPrice + $taxValue;

        return Response::json([
            'netto'     => round($nettoPrice, 2),
            'brutto'    => round($brutto,2),
            'taxPrice'  => round($taxValue,2),
            'currency'  => $currency,
            'post_id'   => $result
        ], 200);

    }

    protected function addCustopmType(string $name, array $meta = [])
    {
        $customType = new Product();
        return $customType->add($name, $meta);
    }

}