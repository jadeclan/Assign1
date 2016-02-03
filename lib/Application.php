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
    // Used to pass route as well as query string items to calling class.
	protected $url;

    /*
     * Constructor used to create the application class
     * Used only by the Site class
     *
     * $id is the name of the class that has a controller
     * $controller array is all the controllers used in this project
     */
	public function __construct($id, array $controllers = [])
	{
        $this->url = RS;

		if (isset($_GET['url'])) {
            // Doing a basic query string tampering protection
			$this->url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
			unset($_GET['url']);
		}

        // add the content dummy controller
        array_push($controllers, new Content($this->url));

        parent::__construct($id, $controllers);
	}
    /*
     * Function to render content on a page (view).
     * On fail, throws an exception message.
     */
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
 * Content controller used to get the content that will be rendered on a particular page.
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
