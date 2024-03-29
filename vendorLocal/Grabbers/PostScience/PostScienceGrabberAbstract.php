<?php
namespace vendorLocal\Grabbers\PostScience;

use vendorLocal\Grabbers\GrabberAbstract as GeneralGrabberAbstract;

class PostScienceGrabberAbstract extends GeneralGrabberAbstract
{
    /**
     * @param $page
     * @return string
     */
    public function toUtf8($page)
    {
        return '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />' . $page;
    }
} 