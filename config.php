<?php
ini_set('default_charset', 'utf-8');
define('BASEDIR', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

#FIXME REMOVE WHEN WILL USE NAMESPACES
include_once(BASEDIR.DS.'vendor-local'.DS.'UrlsToEntitiesGrabberInterface.php');
include_once(BASEDIR.DS.'vendor-local'.DS.'GrabberAbstract.php');
include_once(BASEDIR.DS.'vendor-local'.DS.'PostScienceEntitiesUrlsGrabber.php');
include_once(BASEDIR.DS.'vendor-local'.DS.'PostScienceEntitiesGrabber.php');


function autoloadFunction($classname) {
    if (file_exists(BASEDIR.DS.$classname.'.php')) {
        include_once(BASEDIR.DS.$classname.'.php');
    }
}

spl_autoload_register('autoloadFunction');