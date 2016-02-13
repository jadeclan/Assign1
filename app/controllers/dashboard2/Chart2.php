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

require_once "app/models/Chart2Model.php";
/*
 * Chart2 class used to create the Chart view using
 * data obtained from the Chart2Model.
 */
class Chart2 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Chart2');

        $this->model = new Chart2Model();
    }
    public function get(){
        // TODO  need to implement this method
        return $this->model->getAll();
    }
}
