<?php
namespace Application;

use RuntimeException;

use Framework\APIController;
use Framework\Model;
use Framework\View;
use Framework\Navable;

require_once "Chart1.php";
require_once "Chart2.php";
require_once "Chart3.php";


/*
 *
 */
class Charts extends APIController implements Navable
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
    public function get(){
        //TODO fill this in
        return $this;
    }
}