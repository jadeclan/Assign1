<?php
namespace Application;

require_once "app/models/charts/Chart2.php";

use Framework\Controller;
use Framework\View;
use Application\API\Model;
/*
 * Chart2 class used to create the Chart view using
 * data obtained from the Chart2Model.
 */
class Chart2 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Chart2');

        $this->model = new Model\Chart2Model();
    }

    public function Content()
    {
        return new View('charts/Chart2.tpl');
    }
}
