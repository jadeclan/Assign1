<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 12/02/16
 * Time: 4:36 PM
 */
namespace Application;

use RuntimeException;

use Framework\Controller;
use Framework\Model;
use Framework\View;

require_once "app/models/Card1Dash2Model.php";
/*
 * Card1 for dashboard2 class used to create the Card1Dash2 view using
 * data obtained from the Card1Dash2Model.
 */
class Card1Dash2 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card1Dash2');

        $this->model = new Card1Dash2Model();

    }

    public function Content(){
        return new View('Card1Dash2.tpl');
    }
}