<?php
namespace Application;

require_once "app/models/charts/Chart1.php";

use Framework\Controller;
use Framework\View;
/*
 * Chart1 class used to create the Chart1 view using
 * data obtained from the Chart1Model.
 */
class Chart1 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Chart1');

    }

    public function Content(){
        return new View('charts/Chart1.tpl');
    }
}