<?php
namespace Application;

use Framework\APIController;
class DeviceTypes extends APIController
{
    private $model;

    public function __construct()
    {
        parent::__construct('DeviceTypes');

        $this->model = new DeviceTypeModel();
    }

    public function get()
    {
        return $this->model->getAll();
    }
}