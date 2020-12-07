<?php
namespace TaxFormPlugin\App\Actions;
use TaxFormPlugin\Core\Interfaces\AbstractAction;
use TaxFormPlugin\Core\Utilities\Locations;

/**
 * File:   RegisterVueAndFormScripts.php
 * Date:   07.12.2020
 * Class: RegisterVueAndFormScripts
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package
 */
class RegisterVueAndFormScripts extends AbstractAction
{
    /**
     * @var string
     */
    protected $hookId = 'wp_enqueue_scripts';

    /**
     *
     */
    public function fire()
    {
        /**
         * register vue JS code
         */
        wp_register_script( 'taxesFormVueInstance', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js');

        /**
         * register taxForm component script
         */
        wp_register_script('taxesFormComponent', plugin_dir_url(Locations::getScriptsPath().DIRECTORY_SEPARATOR.'taxesFormComponent.js').DIRECTORY_SEPARATOR.'taxesFormComponent.js');
    }
}