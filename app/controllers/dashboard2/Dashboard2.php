<?php
namespace Application\Dashboard2;

require_once "Card1.php";
require_once "Card2.php";
require_once "Card3.php";

use Framework\Controller;
use Framework\View;
use Framework\Navable;
use Application\API\Model;
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
        ], "Async Dashboard");
    }

    /*
     * function to provide the navigation links for the dashboard2 page
     */
    public function getNavString()
    {
        return "Async Dashboard";
    }

    public function Content(){
        return new View('dashboard2/Dashboard2.tpl');
    }
}