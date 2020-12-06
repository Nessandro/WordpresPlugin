<?php
namespace TaxFormPlugin\App\ShortCodes;
use TaxFormPlugin\Core\Interfaces\AbstractShortCode;

/**
 * File:   TaxCalculateForm.php
 * Date:   06.12.2020
 * Class: TaxCalculateForm
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package
 */
class TaxCalculateForm extends AbstractShortCode
{
    protected $id = 'tax-form-exercise';
    protected $content = null;
    protected $args     = [];
    protected $tag = null;

    /**
     * @inheritDoc
     */
    public function execute()
    {
        return "<div>Test SHORT CODE!!!<div>";
    }
}
