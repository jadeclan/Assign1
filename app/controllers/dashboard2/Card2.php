<?php

namespace Application\Dashboard2;

require_once "app/models/dashboard2/Card2.php";

use Framework\Controller;
use Framework\View;
use Application\API\Model;
/*
 * Card2 for dashboard2 class used to create the Card2Dash2 view using
 * data obtained from the Card2Dash2Model.
 */
class Card2 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card2');

        $this->model = new Model\Card2Dash2Model();

    }

    public function Content(){
        return new View('dashboard2/Card2.tpl');
    }
}