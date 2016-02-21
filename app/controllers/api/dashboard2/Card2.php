<?php
namespace Application;

use Framework\APIController;
class Card2D2 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card2Dash2');

        $this->model = new Card2Dash2Model();
    }

    public function get()
    {
        $brand='';
        if (isset($_GET['brand']))
            $brand = $_GET['brand'];

        return $this->model->search($brand);
    }
}