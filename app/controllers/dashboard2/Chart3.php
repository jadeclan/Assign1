<?php
namespace Application;

use Framework\Model;
use Framework\Controller;
use Framework\View;

include "app/models/Chart3Model.php";
/*
 * Chart3 class used to create the Chart3 view using
 * data obtained from the Chart3Model.
 */
class Chart3 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Chart3');

        $this->model = new Chart3Model();
    }

    /*
     * Function to obtain view of Chart3 from data obtained
     * from data obtained from the Chart3Model.
     */
    public function Content()
    {
        return new View('Chart3.tpl', [
            'dailyVisits' => $this->model->getMonthVisitsCountry()
        ]);
    }
}