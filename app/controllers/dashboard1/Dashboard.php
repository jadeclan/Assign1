<?php

namespace Application;

use Framework\View;
use Framework\Controller;
use Framework\Navable;

require_once "Card1.php";
require_once "Card2.php";
require_once "Card3.php";


/*
 * Dashboard controller pulls together the needed models and controllers
 * in order to create content to deliver to the dashboard view.
 */
class Dashboard extends Controller implements Navable
{
    public function __construct()
    {
        parent::__construct('Dashboard', [
            new Card1(),
            new Card2(),
            new Card3()
        ]);
    }
    /*
     * function to provide the navigation links for the dashboard page
     */
    public function getNavString()
    {
        return "Dashboard";
    }
    /*
     * function to return content rendered by the Dashboard template
     */
    public function Content()
    {
        return new View('Dashboard.tpl');
    }
}