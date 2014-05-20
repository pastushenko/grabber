<?php
namespace vendorLocal\Interfaces;

use vendorLocal\Entity\Page;

interface PagesGrabberInterface {
    /**
     * @return Page[]
     */
    public function getAllPages();

    /**
     * @param Page[] $pages
     */
    public function savePages($pages);
} 