<?php
/*
 * Establishes the Site, header and footer classes
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
namespace Application;

use Framework\Application;

use Framework\Model;
use Framework\View;
use Framework\Controller;

include "Card1.php";
include "Card2.php";
include "Card3.php";
include "About.php";


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
/*
 * Constructs the Header function from the header.tpl file
 * tpl file must be in the theme/default/assets directory
 */
class Header extends Controller
{
    public function __construct()
    {
        parent::__construct('Header');
    }

    // function used by controller to include the view
    public function Content()
    {
        return new View('Header.tpl');
    }
}
/*
 * Constructs the Footer function from the footer.tpl file
 * tpl file must be in the theme/default/assets directory
 */
class Footer extends Controller
{
    public function __construct()
    {
        parent::__construct('Footer');
    }
    // function used by controller to include the view
    public function Content()
    {
        return new View('Footer.tpl');
    }
}

class Dashboard extends Controller
{
    public function __construct()
    {
        parent::__construct('Dashboard', [
            new Card1(),
            new Card2(),
            new Card3()
        ]);
    }

    public function Content()
    {
        return new View('Dashboard.tpl');
    }
}