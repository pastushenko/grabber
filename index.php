<?php
include('config.php');

use \vendorLocal\Grabbers\PostScience\PostScienceGrabber;

$grabber = new PostScienceGrabber();
$pages = $grabber->getAllPages();
$grabber->savePages($pages);