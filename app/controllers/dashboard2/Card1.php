<?php
namespace Application\Dashboard2;

require_once "app/models/dashboard2/Card1.php";

use Framework\Controller;
use Framework\View;
use Application\API\Model;
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

        $this->model = new Model\Card1();

    }

    public function Content(){
        return new View('dashboard2/Card1.tpl');
    }
}