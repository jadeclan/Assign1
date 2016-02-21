<?php
namespace Application;

use Framework\APIController;
class Card1D2 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card1Dash2');

        $this->model = new Card1Dash2Model();
    }

    public function get()
    {
        return $this->model->search();
    }
}