<?php
namespace vendorLocal\Interfaces;

use vendorLocal\Entity\Page;

interface UrlsToEntitiesGrabberInterface
{
    /**
     * @return Page[]
     */
    public function getUrlsToEntities();
} 