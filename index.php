<?php
include('config.php');

use \vendorLocal\PostScience\PostScienceUrlsGrabber;
use \vendorLocal\PostScience\PostScienceEntitiesGrabber;

//$grabber = new PostScienceUrlsGrabber('http://postnauka.ru/popular');
$grabber = new PostScienceUrlsGrabber('http://postnauka.ru/books');
$urls = $grabber->getUrlsToEntities();
var_dump($grabber->getUrlsToPages());
var_dump($grabber->getUrlsToEntities());

foreach ($urls as $url) {
    $entity = new PostScienceEntitiesGrabber($url);
    echo $entity->getTitle();
    die();
}
