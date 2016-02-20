<?php

namespace Application\Dashboard2;

require_once "app/models/Card3Dash2Model.php";

use Framework\Controller;
use Framework\View;
use Application;
/*
 * Card3 for dashboard2 class used to create the Card3Dash2 view using
 * data obtained from the Card3Dash2Model.
 */
class Card3 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card3');

        $this->model = new Application\Card3Dash2Model();

    }

    public function Content(){
        return new View('dashboard2/Card3.tpl');
    }
}