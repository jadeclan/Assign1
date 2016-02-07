<?php

namespace Framework;

/**
 * The application class. The application layer is the top-level 
 * controller and the root of the controller hierarchy.
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
abstract class Application extends Controller
{
    protected $defaultRoute = RS;

    public function Run()
    {
        $route = $this->defaultRoute;

        if (isset($_GET['url'])) {
            // Doing a basic query string tampering protection
            $route = filter_var($_GET['url'], FILTER_SANITIZE_URL);
            unset($_GET['url']);
        }

        $controller = $this->Route($route);

        if ($controller instanceof APIEndPoint) {
            header('Content-type: application/json');

            // TODO: placeholder...
            echo "{}";

        } else {
            // add the content dummy controller
            $this->controllers['content'] = $controller;

            // render application
            echo $this->Render("/");
        }
    }
}