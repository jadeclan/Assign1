<?php
namespace Application\API\Controller;

use Framework\APIController;
use Application\API\Model;
class Card2D2 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card2Dash2');

        $this->model = new Model\Card2Dash2Model();
    }

    public function get()
    {
        $brand='';
        if (isset($_GET['brand']))
            $brand = $_GET['brand'];

        return $this->model->search($brand);
    }
}