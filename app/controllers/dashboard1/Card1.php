<?php
namespace Application;

use Framework\Model;
use Framework\Controller;
use Framework\View;

/*
 * Function card1.  creates the Card1 controller class,
 * instantiates it with the Card1Model and includes the
 * Card1 view.
 */
class Card1 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card1');

        $this->model = new Card1Model();
    }

    public function Content()
    {
        return new View('Card1.tpl', [
            'browsers' => $this->model->getBrowserVisits()
        ]);
    }
}