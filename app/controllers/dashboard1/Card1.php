<?php
namespace Application;

require_once "app/models/Card1.php";

use Framework\Controller;
use Framework\View;
/*
 * Card1 class used to create the Card1 view using
 * data obtained from the Card1Model.
 */
class Card1 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card1');

        $this->model = new Card1Model();
    }
    /*
     * Function to obtain view of Card1 from data obtained
     * from data obtained from the Card1Model.
     */
    public function Content()
    {
        return new View('dashboard1/Card1.tpl', [
            'browsers' => $this->model->getBrowserVisits()
        ]);
    }
}