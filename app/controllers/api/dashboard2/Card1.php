<?php
namespace Application\API\Controller;

use Framework\APIController;
use Application\API\Model;
class Card1D2 extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Card1Dash2');

        $this->model = new Model\Card1Dash2Model();
    }

    public function get()
    {
        return $this->model->search();
    }
}