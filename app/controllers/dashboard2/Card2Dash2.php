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

require_once "app/models/Card2Dash2Model.php";
/*
 * Card2 for dashboard2 class used to create the Card2Dash2 view using
 * data obtained from the Card2Dash2Model.
 */
class Card2Dash2 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card2Dash2');

        $this->model = new Card2Dash2Model();

    }

    public function Content(){
        return new View('Card2Dash2.tpl');
    }
}