<?php

namespace Application;

use Framework\Model;
use Framework\View;
use Framework\Controller;

class Card3 extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card3');

        $this->model = new Card3Model();
    }

    public function Content()
    {
        return new View('Card3.tpl', [
            'continents' => $this->model->getContinents(),
            'continentData' => $this->model->getContinentList()
        ]);
    }
}