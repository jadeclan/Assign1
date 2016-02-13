<?php
namespace Application;

use RuntimeException;

use Framework\APIController;
use Framework\Model;
use Framework\View;

require_once "app/models/Chart3Model.php";
/*
 * Chart3 class used to create the Chart3 view using
 * data obtained from the Chart3Model.
 */
class Chart3 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Chart3');

        $this->model = new Chart3Model();
    }
    function get(){
        // TODO Need to implement this method
        return $this->model->getAll();
    }
}