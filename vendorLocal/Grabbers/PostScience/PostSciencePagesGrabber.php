<?php
namespace vendorLocal\Grabbers\PostScience;

use vendorLocal\Entity\Page;
use vendorLocal\Interfaces\UrlsToEntitiesGrabberInterface;
use vendorLocal\Interfaces\UrlsToPagesGrabberInterface;

class PostSciencePagesGrabber extends PostScienceGrabberAbstract implements UrlsToEntitiesGrabberInterface, UrlsToPagesGrabberInterface
{
    const ENTITY_SELECTOR_PATTERN = '#project li .m-title a';
    const PAGE_SELECTOR_PATTERN = '#project .wp-pagenavi a.page';

    /**
     * @return Page[]
     */
    public function getUrlsToEntities()
    {
        $urls = $this->getElementsAttributeBySelector(self::ENTITY_SELECTOR_PATTERN, 'href');
        $urlsEntity = [];
        foreach($urls as $url) {
            $urlsEntity[] = new Page($url);
        }
        return $urlsEntity;
    }

    /**
     * @return Page[]
     */
    public function getUrlsToPages()
    {
        $urls = $this->getElementsAttributeBySelector(self::PAGE_SELECTOR_PATTERN, 'href');
        $urlsEntity = [];
        foreach($urls as $url) {
            $urlsEntity[] = new Page($url);
        }
        return $urlsEntity;
    }

    /**
     * @param Page $page
     * @return Page[]
     */
    public function getInternalPages(Page $page)
    {
        $internalPagesGrabber = new PostSciencePagesGrabber($page->getUrl());
        $internalPages = $internalPagesGrabber->getUrlsToPages();

        return $internalPages;
    }

} 