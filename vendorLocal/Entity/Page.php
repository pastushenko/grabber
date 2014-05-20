<?php
namespace vendorLocal\Entity;

class Page
{
    /** @var string */
    public $url;
    /** @var string */
    public $category;
    /** @var bool */
    public $isGrabbed = false;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
} 