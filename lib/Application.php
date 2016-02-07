<?php

namespace Framework;

use RuntimeException;

require_once "APIController.php";

/**
 * The application class. The application layer is the top-level 
 * controller and the root of the controller hierarchy.
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
abstract class Application extends Controller
{
    protected $defaultController = null;

    public function Run()
    {
        $route = RS;

        if (isset($_GET['url'])) {
            // Doing a basic query string tampering protection
            $route = filter_var($_GET['url'], FILTER_SANITIZE_URL);
            unset($_GET['url']);
        }

        $controller = $this->Route($route);

        if ($controller === $this)
            $controller = $this->defaultController;

        if ($controller instanceof APIController) {

            echo $controller->Content();

        } else {
            // add the content dummy controller
            $this->controllers['content'] = $controller;

            // render application
            echo $this->Render();
        }
    }
}