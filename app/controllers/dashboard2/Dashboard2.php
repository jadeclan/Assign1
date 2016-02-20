<?php
namespace Application\Dashboard2;

require_once "Card1.php";
require_once "Card2.php";
require_once "Card3.php";

use Framework\Controller;
use Framework\View;
use Framework\Navable;
/*
 *
 */
class Dashboard2 extends Controller implements Navable
{
    public function __construct()
    {
        parent::__construct('Dashboard2', [
            new Card1(),
            new Card2(),
            new Card3()
        ]);
    }

    /*
     * function to provide the navigation links for the dashboard2 page
     */
    public function getNavString()
    {
        return "Dashboard #2";
    }

    public function Content(){
        return new View('dashboard2/Dashboard2.tpl');
    }
}