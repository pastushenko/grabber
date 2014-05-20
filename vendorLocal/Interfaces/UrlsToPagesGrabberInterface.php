<?php
namespace vendorLocal\Interfaces;

use vendorLocal\Entity\Page;

interface UrlsToPagesGrabberInterface
{
    /**
     * @return Page[]
     */
    public function getUrlsToPages();
} 