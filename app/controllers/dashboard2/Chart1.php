<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 12/02/16
 * Time: 4:36 PM
 */
namespace Application;

use RuntimeException;

use Framework\APIController;
use Framework\Model;
use Framework\View;

require_once "app/models/Chart1Model.php";
/*
 * Chart1 class used to create the Chart1 view using
 * data obtained from the Chart1Model.
 */
class Chart1 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Chart1');

        $this->model = new Chart1Model();
    }

    public function get()
    {
        $year = 2016;
        if (isset($_GET['year']))
            $year = $_GET['year'];

        $month = 1;
        if (isset($_GET['month']))
            $month = $_GET['month'];

        return $this->model->search($year, $month);
    }
}