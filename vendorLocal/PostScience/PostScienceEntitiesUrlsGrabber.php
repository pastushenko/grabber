<?php
namespace vendorLocal\PostScience;

use vendorLocal\UrlsToEntitiesGrabberInterface;

class PostScienceEntitiesUrlsGrabber extends PostScienceGrabberAbstract implements UrlsToEntitiesGrabberInterface
{
    /**
     * @return array
     */
    public function getUrlsToEntities()
    {
        $this->selectCurrentDocument();

        $urls = array();
        /** @var \DOMElement $a */
        foreach(pq('#project li .m-title a') as $a) {
            $urls[] = $a->getAttribute('href');
        }

        return $urls;
    }

} 