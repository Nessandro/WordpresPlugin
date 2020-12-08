<?php
namespace TaxFormPlugin\App\CustomTypes;
use TaxFormPlugin\Core\Interfaces\AbstractCustomType;

/**
 * File:   Product.php
 * Date:   08.12.2020
 * Class: Product
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package
 */
class Product extends AbstractCustomType
{
    /**
     * @var string
     */
    protected $name = 'products';

    /**
     * @param $productName
     * @param array $meta
     * @return mixed
     */
    public function add($productName, $meta = [])
    {
        $params = [
            'post_title'    => wp_strip_all_tags($productName),
            'meta_input'    => $meta,
            'post_type'     => $this->getName(),
            'post_status'   => 'publish',
        ];

        return wp_insert_post($params);
    }


    /**
     * @return array
     */
    public function getAttributes()
    {
        $labels = [
            'name'                  => 'Products',
            'singular_name'         => 'Products',
            'add_new'               => 'Add Products',
            'add_new_item'          => 'Enter Product Details',
            'all_items'             => 'All Products',
        ];

        return  [
            'public'            => true,
            'label'             => 'Products',
            'labels'            => $labels,
            'description'       => 'Product with prices and tax',
            'capability_type'   => 'page',
        ];
    }

}