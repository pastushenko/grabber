<?php

class PostScienceEntitiesUrlsGrabber extends GrabberAbstract implements UrlsToEntitiesGrabberInterface
{
    /**
     * @return array
     */
    public function getUrlsToEntities()
    {
        $this->selectCurrentDocument();

        $urls = array();
        /** @var DomElement $a */
        foreach(pq('#project li .m-title a') as $a) {
            $urls[] = $a->getAttribute('href');
        }

        return $urls;
    }

} 