<?php
namespace TaxFormPlugin\App\ShortCodes;
use TaxFormPlugin\App\Enums\Scripts;
use TaxFormPlugin\App\UI\TaxesForm;
use TaxFormPlugin\Core\Interfaces\AbstractShortCode;
use TaxFormPlugin\Core\Utilities\WeakTemplateRender;

/**
 * File:   TaxCalculateForm.php
 * Date:   06.12.2020
 * Class: TaxCalculateForm
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package
 */
class TaxCalculateForm extends AbstractShortCode
{
    protected $id       = 'tax-form-exercise';
    protected $content  = null;
    protected $args     = [];
    protected $tag      = null;

    /**
     * @inheritDoc
     */
    public function execute()
    {
        wp_enqueue_script(Scripts::VUE_INSTANCE);

        return WeakTemplateRender::get()->render('main', ['content' => (new TaxesForm())->toHtml()]);
    }
}
