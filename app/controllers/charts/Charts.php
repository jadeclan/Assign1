<?php
namespace Application;

require_once "Chart1.php";
require_once "Chart2.php";
require_once "Chart3.php";

use Framework\Controller;
use Framework\View;
use Framework\Navable;
/*
 *
 */
class Charts extends Controller implements Navable
{
    public function __construct()
    {
        parent::__construct('Charts', [
            new Chart1(),
            new Chart2(),
            new Chart3()
        ]);
    }

    /*
     * function to provide the navigation links for the charts page
     */
    public function getNavString()
    {
        return "Charts";
    }

    public function Content(){
        return new View('charts/Charts.tpl');
    }
}