<?php
ini_set('default_charset', 'utf-8');
define('BASEDIR', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('DB_NAME', 'grabber');

include_once(BASEDIR.DS.'vendor'.DS.'phpQuery'.DS.'phpQuery-onefile.php');

spl_autoload_register(
    function ($classname) {
        $path = str_replace('\\', DS,  $classname);
        if (file_exists(BASEDIR.DS.$path.'.php')) {
            include_once(BASEDIR.DS.$path.'.php');
        }
    }
);