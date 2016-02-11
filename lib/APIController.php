<?php

namespace Framework;

use Exception;
use RuntimeException;

abstract class APIController extends Controller
{
    public function Content()
    {
        header('Content-type: application/json');

        try {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    return json_encode($this->get());

                /*
                case 'PUT':
                    return json_encode($this->put());

                case 'POST':
                    return json_encode($this->post());

                case 'DELETE':
                    return json_encode($this->delete());
                */

                default:
                    throw new RuntimeException("Unexpected request method.");
            }
        } catch (Exception $e) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

            if (DEBUG)
                return json_encode($e);

            return json_encode([
                "error" => $e->getMessage(),
                "code" => $e->getCode()
            ]);
        }
    }

    public abstract function get();
    //public abstract function put();
    //public abstract function post();
    //public abstract function delete();
}