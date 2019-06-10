<?php
// Load Config
require_once "config/config.php";

// Autoload core libraries
spl_autoload_register(function($className) {
    require_once 'libraries/' . $className . '.php';
});

// Load helper files
require_once "helpers/session_helper.php";

// Start a session
session_start();