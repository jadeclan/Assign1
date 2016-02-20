<?php
namespace Application\Dashboard2;

require_once "app/models/Card1Dash2Model.php";

use Framework\Controller;
use Framework\View;
use Application;
/*
 * Card1 for dashboard2 class used to create the Card1Dash2 view using
 * data obtained from the Card1Dash2Model.
 */
class Card1 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card1');

        $this->model = new Application\Card1Dash2Model();

    }

    public function Content(){
        return new View('dashboard2/Card1.tpl');
    }
}