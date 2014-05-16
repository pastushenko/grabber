<?php
namespace vendorLocal\PostScience;

class PostScienceEntitiesGrabber extends PostScienceGrabberAbstract
{
    const TITLE_SELECTOR_PATTERN = '#b h1.p-title';

    /** @var string|null */
    private $title = null;

    /**
     * @return string|null
     */
    public function getTitle()
    {
        if (is_null($this->title)) {
            $this->title = $this->getFirstNode(self::TITLE_SELECTOR_PATTERN)->nodeValue;
        }

        return $this->title;
    }

} 