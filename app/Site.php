<?php
/*
 * Establishes the Site, header and footer classes
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
namespace Application;

use Framework\Application;

use Framework\View;
use Framework\Controller;

include "About.php";
include "Dashboard.php";
include "Documentation.php";
include "Header.php";
include "Footer.php";

/**
 * The Site class. This class will serve as the root of the controller hierarchy.
 */
class Site extends Application
{
    private $title = "POW-B Analytics";
    private $model;

    public function __construct()
    {
        /* Initialize Controllers to be used
         * A page (aka site) is constructed based on including
         * a appropriate parts of the desired page.
         */
        parent::__construct('Site', [
            new Header(),
            new Footer(),
            new Dashboard(),
            new Documentation(),
            new About()
        ]);
    }
    /*
     * function used by controller to include the view.
     *
     * themedir     directory to get the data for the view class
     * tite         provides created view with this sites title
     */
    public function Content()
    {
        return new View('Index.tpl', [
            'themedir' => View::getTemplatePath(),
            'title' => $this->title
        ]);
    }
}