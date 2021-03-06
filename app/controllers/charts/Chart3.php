<?php
namespace Application;

require_once "app/models/charts/Chart3.php";

use Framework\Controller;
use Framework\View;
use Application\API\Model;
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

        $this->model = new Model\Chart3Model();
    }

    public function Content()
    {
        return new View('charts/Chart3.tpl');
    }
}