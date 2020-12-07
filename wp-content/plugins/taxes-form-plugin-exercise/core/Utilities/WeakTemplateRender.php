<?php
namespace TaxFormPlugin\Core\Utilities;
/**
 * File:   WeakTemplateRender.php
 * Date:   07.12.2020
 * Class: WeakTemplateRender
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package
 */
class WeakTemplateRender
{
    /**
     * @var
     */
    protected static $instance;

    /**
     * @var string
     */
    protected $extension = 'html';

    /**
     * @return static
     */
    public static function get()
    {
        if(!static::$instance)
        {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     */
    public function setExtension(string $extension): void
    {
        $this->extension = $extension;
    }

    /**
     * @param $template
     * @param array $vars
     * @return string|string[]
     */
    public function render($template, $vars = [])
    {
        $content = $this->getContent($template);
        return $this->updateVars($content, $vars);
    }

    /**
     * @param $template
     * @return false|string
     */
    public function getContent($template)
    {
        $templatePath = Locations::getTemplatePath().DIRECTORY_SEPARATOR.str_replace('.',DIRECTORY_SEPARATOR, $template).'.'.$this->extension;

        if(!file_exists($templatePath)) {
            return "";
        }

        return !!($content = file_get_contents($templatePath)) ? $content : "";
    }

    /**
     * @param string $content
     * @param array $vars
     * @return string|string[]
     */
    protected function updateVars(string $content, $vars = [])
    {
        foreach ($vars as $name => $value) {
            $content = str_replace('{{'.$name.'}}', $value, $content);
        }

        return $content;
    }

}