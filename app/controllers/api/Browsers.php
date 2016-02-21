<?php
namespace Application;

use Framework\APIController;
class Browsers extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('Browsers');

        $this->model = new BrowserModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}