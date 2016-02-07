<?php

namespace Framework;

use RuntimeException;

abstract class APIController extends Controller
{
    public function Content()
    {
        header('Content-type: application/json');

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                return $this->get();
            case 'PUT':
                return $this->put();
            CASE 'POST':
                return $this->post();
            case 'DELETE':
                return $this->post();
            default:
                throw new RuntimeException("Unexpected request method.");
        }
    }

    public abstract function get();
    public abstract function put();
    public abstract function post();
    public abstract function delete();
}