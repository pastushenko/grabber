<?php
include('config.php');

$grabber = new PostScienceEntitiesUrlsGrabber('http://postnauka.ru/popular');
$urls = $grabber->getUrlsToEntities();

foreach ($urls as $url) {

    $entity = new PostScienceEntitiesGrabber($url);
    echo $entity->getTitle();
    die();
}
?>