<?php

namespace Application;

require_once "app/models/Card3.php";

use Framework\View;
use Framework\Controller;
/*
 * Class that controls the creation of Card3 view
 * with data obtained from the Card3Model.
 */
class Card3 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card3');

        $this->model = new Card3Model();
    }
    /*
     * Function get view of card3 created using data
     * obtained from the Card3Model.
     */
    public function Content()
    {
        return new View('dashboard1/Card3.tpl', [
            'continents' => $this->model->getContinents(),
            'continentData' => $this->model->getContinentList()
        ]);
    }
}