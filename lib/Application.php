<?php

namespace Framework;

use RuntimeException;

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

    /*
     * Constructor used to create the application class
     * Used only by the Site class
     *
     * $id is the name of the class that has a controller
     * $controller array is all the controllers used in this project
     */
	public function __construct($id, array $controllers = [])
	{
        parent::__construct($id, $controllers);
    }

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