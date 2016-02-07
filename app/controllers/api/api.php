<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/6/16
 * Time: 5:01 PM
 */

namespace Application;

use RuntimeException;

use Framework\APIEndPoint;
use Framework\Controller;

class API extends Controller
{
    public function __construct()
    {
        parent::__construct('API');
    }

    public function Content()
    {
        throw new RuntimeException("don't call me!");
    }
}

class Browsers extends Controller implements APIEndPoint
{
    public function __construct()
    {
        parent::__construct('Browsers');
    }

    public function Content()
    {

    }

    private function get()
    {

    }

    private function put()
    {

    }

    private function post()
    {

    }

    private function delete()
    {

    }
}