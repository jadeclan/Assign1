<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/6/16
 * Time: 5:01 PM
 */

namespace Application;

use RuntimeException;

use Framework\Controller;
use Framework\APIController;

class API extends Controller
{
    public function __construct()
    {
        parent::__construct('API', [
            new Browsers()
        ]);
    }

    public function Content()
    {
        throw new RuntimeException("attempted to route api stub");
    }
}

class Browsers extends APIController
{
    public function __construct()
    {
        parent::__construct('Browsers');
    }

    public function get()
    {
        return json_encode([
            "message" => "call me at /api/browsers"
        ]);
    }

    public function put()
    {
        throw new RuntimeException("not implemented");
    }

    public function post()
    {
        throw new RuntimeException("not implemented");
    }

    public function delete()
    {
        throw new RuntimeException("not implemented");
    }
}