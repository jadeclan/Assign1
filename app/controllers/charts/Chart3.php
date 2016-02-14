<?php
namespace Application;

use RuntimeException;

use Framework\Controller;
use Framework\Model;
use Framework\View;

require_once "app/models/Chart3Model.php";
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

    public function Content()
    {
        return new View('Chart3.tpl');
    }
}