<?php

// DB Params
define("DB_HOST", 'localhost');
define("DB_USER", '_YOUR_USER');
define("DB_PASS", '_YOUR_PASS');
define("DB_NAME", '_YOUR_DB_NAME');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));

// URL Root
$url = (!empty($_SERVER['HTTPS'])) ? "https://" : "http://" . $_SERVER['HTTP_HOST'];
define('URLROOT', $url . "/Stock-Checker-Web");

// Site Name
define('SITENAME', '_YOUR_SITE_NAME');

