<?php
namespace Application;

use Framework\View;
use Framework\Controller;
use Framework\Navable;
use Framework\Model;

include "Chart1.php";
include "Chart2.php";
include "Chart3.php";


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
    /*
     * function to return content rendered by the Charts template
     */
    public function Content()
    {
        return new View('Charts.tpl');
    }
}