<?php

/**
 * Comp 4513 - Assignment #1 (part 0)
 *
 * Copyright (C) Mark O'Donnell
 *
 *
 *  NOTES:
 *   - Requires PHP 5 >= 5.3.0 (anonymous functions)
 */

// Enable debug mode
define('DEBUG', true);

// Disable SEO by default (requires mod_rewrite)
define('SEO', false);

// Set appropriate error reporting
if (DEBUG)
    error_reporting(E_ALL);
else
    error_reporting(0);

// Set some misc constants
define('ROOT', __DIR__);
define('DS', DIRECTORY_SEPARATOR);
define('RS', '/'); // route separator

// Set database constants here for easy access, these will
// probably get moved later on...
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'visits');
define('DB_USER', 'testuser');
define('DB_PASS', 'mypassword');

// Include framework files
require_once 'lib/Model.php';
require_once 'lib/View.php';
require_once 'lib/Controller.php';
require_once 'lib/Application.php';

// Application
require_once "app/Site.php";
use Application\Site;

// ...and away we go!
try {
    $site = new Site();

    echo $site->{"/"};

} catch (Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

    if (DEBUG) {
        echo "<pre>";
        echo "Unhandled exception: " . $e->getMessage() . " (" . $e->getCode() . ")<br/><br/>";
        echo "Stack trace:<br/>";
        echo $e->getTraceAsString();
        echo "</pre>";
    }
}
