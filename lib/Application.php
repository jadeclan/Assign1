<?php

namespace Framework;

use Exception;

/**
 * The application class. The application layer is the top-level 
 * controller and the root of the controller hierarchy.
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 */
abstract class Application extends Controller
{
    //
	protected $url;

    /*
     * Constructor used to create the application class
     * Used only my the Site class
     *
     * $id is the name of the class that has a controller
     * $controller array is all the controllers used in this project
     */
	public function __construct($id, array $controllers = [])
	{
        $this->url = RS;

		if (isset($_GET['url'])) {
			$this->url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
			unset($_GET['url']);
		}

        // add the content dummy controller
        array_push($controllers, new Content($this->url));

        parent::__construct($id, $controllers);
	}

    public function Render($route) {

        $controller = parent::__get($route);

        try {
            $view = $controller->Content();
        } catch (Exception $e) {
            if (DEBUG) {
                $view = new View('Exception.tpl', ['e' => $e]);
            } else {
                $view = new View('Message.tpl', ['msg' => 'There was an error accessing this module.']);
            }
        }

        return empty($view) ? '' : $view->render($this);
    }
}

/**
 * Content controller.
 * @package Framework
 */
class Content extends Controller
{
    private $route;

    public function __construct($route)
    {
        parent::__construct('Content');

        $this->route = $route;
    }

    public function Content()
    {
        return $this->getRoot()->__get($this->route)->Content();
    }
}
