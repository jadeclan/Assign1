<?php

/**
 * Comp 4513 - Assignment #1
 * Submitted to Randy Connolly
 * As part of the requirements for MRU's Comp4513
 *
 * Group Members
 *  James Bergeron
 *  Mark O'Donnell
 *  Sonia Pitrolia
 *  Nolan Walker
 *
 * Date Written: January - February, 2016
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
    // Reports all php errors - see changelog
    error_reporting(E_ALL);
else
    // Turns error reporting off
    error_reporting(0);

// Set some misc constants
// Current Working Directory of this file
define('ROOT', __DIR__);
// Separator used to separate directories, / for linux, \ for windows
define('DS', DIRECTORY_SEPARATOR);
// Separator used to create path names
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
// Includes the Site page class
require_once "app/Site.php";
use Application\Site;

// ...and away we go!
try {
    // Instantiates a new site.
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
