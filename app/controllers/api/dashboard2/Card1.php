<?php
namespace Application\API\Controller;

use Framework\APIController;
use Application\API\Model;
class Card1 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card1Dash2');

        $this->model = new Model\Card1();
    }

    public function get()
    {
        return $this->model->search();
    }
}