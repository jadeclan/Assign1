<?php
namespace Application;

use Framework\APIController;
class Chart1B extends APIController
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
        if (isset($_GET['year']) && is_numeric($_GET['year']))
            $year = $_GET['year'];

        $month = 1;
        if (isset($_GET['month']) && is_numeric($_GET['month']) && $_GET['month'] > 0 && $_GET['month'] < 13)
            $month = $_GET['month'];

        return $this->model->search($year, $month);
    }
}