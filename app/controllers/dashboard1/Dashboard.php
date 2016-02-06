<?php

namespace Application;

use Framework\View;
use Framework\Controller;
use Framework\Navable;

include "Card1.php";
include "Card2.php";
include "Card3.php";
/*
include "../../models/Card1.php";
include "../../models/Card2.php";
include "../../models/Card3.php";
*/
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