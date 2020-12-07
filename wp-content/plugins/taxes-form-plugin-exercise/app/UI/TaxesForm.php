<?php
namespace TaxFormPlugin\App\UI;
use TaxFormPlugin\App\Enums\Scripts;
use TaxFormPlugin\Core\Interfaces\AbstractUiComponent;
use TaxFormPlugin\Core\Utilities\WeakTemplateRender;

/**
 * File:   TaxesForm.php
 * Date:   07.12.2020
 * Class: TaxesForm
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package TaxFormPlugin\App\UI
 */
class TaxesForm extends AbstractUiComponent
{

    protected $id = 'taxForm';

    /**
     * @return string|string[]
     */
    public function toHtml()
    {
        /**
         * enque component script file
         */
        wp_enqueue_script(Scripts::FORM_COMPONENT);

        /**
         * return template
         */
        return WeakTemplateRender::get()->render('taxesForm', ['ajaxUrl' => admin_url('admin-ajax.php')]);
    }
}