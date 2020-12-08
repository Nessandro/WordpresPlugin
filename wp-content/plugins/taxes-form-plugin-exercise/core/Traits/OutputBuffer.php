<?php
namespace TaxFormPlugin\Core\Traits;
/**
 * File:   OutputBuffer.php
 * Date:   08.12.2020
 * Trait:  OutputBuffer
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package
 */
trait OutputBuffer
{
    protected function cleanOutputBuffer()
    {
        $outputBuffering = \ob_get_contents();
        if($outputBuffering !== FALSE)
        {
            if(!empty($outputBuffering))
            {
                \ob_clean();
            }
            else
            {
                \ob_start();
            }
        }

        return $this;
    }
}