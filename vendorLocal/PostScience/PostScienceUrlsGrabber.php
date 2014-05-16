<?php
namespace vendorLocal\PostScience;

use vendorLocal\UrlsToEntitiesGrabberInterface;

class PostScienceUrlsGrabber extends PostScienceGrabberAbstract implements UrlsToEntitiesGrabberInterface
{
    const ENTITY_SELECTOR_PATTERN = '#project li .m-title a';
    const PAGE_SELECTOR_PATTERN = '#project .wp-pagenavi a.page';

    /**
     * @return array
     */
    public function getUrlsToEntities()
    {
        return $this->getElementsAttributeBySelector(self::ENTITY_SELECTOR_PATTERN, 'href');
    }

    /**
     * @return array
     */
    public function getUrlsToPages()
    {
        return $this->getElementsAttributeBySelector(self::PAGE_SELECTOR_PATTERN, 'href');
    }

} 