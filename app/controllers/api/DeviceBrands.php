<?php
namespace Application;

use Framework\APIController;
class DeviceBrands extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('DeviceBrands');

        $this->model = new DeviceBrandModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}