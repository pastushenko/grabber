<?php

class PostScienceEntitiesGrabber extends GrabberAbstract
{
    /** @var string|null */
    private $title = null;

    /**
     * @return string|null
     */
    public function getTitle()
    {
        if (is_null($this->title)) {
            $this->title = $this->getFirstNode('#b h1.p-title')->nodeValue;
        }

        return $this->title;
    }

} 