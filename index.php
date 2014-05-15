<?php
include('config.php');

use \vendorLocal\PostScience\PostScienceEntitiesUrlsGrabber;
use \vendorLocal\PostScience\PostScienceEntitiesGrabber;

$grabber = new PostScienceEntitiesUrlsGrabber('http://postnauka.ru/popular');
$urls = $grabber->getUrlsToEntities();

foreach ($urls as $url) {
    $entity = new PostScienceEntitiesGrabber($url);
    echo $entity->getTitle();
    die();
}
