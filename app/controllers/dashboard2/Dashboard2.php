<?php
namespace Application;

use RuntimeException;

use Framework\Controller;
use Framework\Model;
use Framework\View;
use Framework\Navable;

require_once "Card1Dash2.php";
require_once "Card2Dash2.php";
require_once "Card3Dash2.php";

/*
 *
 */
class Dashboard2 extends Controller implements Navable
{
    public function __construct()
    {
        parent::__construct('Dashboard2', [
            new Card1Dash2(),
            new Card2Dash2(),
            new Card3Dash2()
        ]);
    }

    /*
     * function to provide the navigation links for the dashboard2 page
     */
    public function getNavString()
    {
        return "Dashboard-2";
    }

    public function Content(){
        return new View('Dashboard2.tpl');
    }
}