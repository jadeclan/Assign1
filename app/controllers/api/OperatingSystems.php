<?php
namespace Application;

use Framework\APIController;
class OperatingSystems extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('os');

        $this->model = new OperatingSystemModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}