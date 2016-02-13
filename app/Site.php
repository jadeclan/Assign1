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

include "controllers/About.php";
include "controllers/Visits.php";
include "controllers/dashboard1/Dashboard.php";
include "controllers/Documentation.php";
include "controllers/Header.php";
include "controllers/Footer.php";
include "controllers/api/api.php";
include "controllers/dashboard2/Charts.php";

/**
 * The Site class. This class will serve as the root of the controller hierarchy.
 */
class Site extends Application
{
    private $title = "POW-B Analytics";

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
            new VisitBrowser(),
            new Charts(),
            new Documentation(),
            new About(),
            new API()
        ]);

        $this->defaultController = $this->Route("/dashboard");
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
            'title' => $this->title
        ]);
    }
}