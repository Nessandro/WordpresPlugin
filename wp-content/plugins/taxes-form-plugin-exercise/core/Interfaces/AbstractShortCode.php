<?php

namespace TaxFormPlugin\Core\Interfaces;

/**
 * File:   AbstractShortCode.php
 * Date:   06.12.2020
 * Class: AbstractShortCode
 * @author Tomasz Bielecki <tomasz.bi@modulesgarden.com>
 * @package  TaxFormPlugin\Core\Interfaces
 */
abstract class AbstractShortCode
{
    /**
     * @var null
     */
    protected $id       = null;
    /**
     * @var null
     */
    protected $content  = null;
    /**
     * @var array
     */
    protected $args     = [];
    /**
     * @var null
     */
    protected $tag      = null;

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param null $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * @param array $args
     */
    public function setArgs($args): void
    {
        $this->args = $args;
    }

    /**
     * @return null
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param null $tag
     */
    public function setTag($tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    abstract public function execute();

    /**
     * @param array $args
     * @param string $content
     * @param string $tag
     * @return mixed
     */
    public function fire($args = [], string $content, string $tag)
    {
        $this->setArgs($args);
        $this->setContent($content);
        $this->setTag($tag);

        //todo: add some validation function or something else...

        return $this->execute();

    }


}