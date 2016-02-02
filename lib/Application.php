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
	private $url;

    /*
     * Constructor used to create the application class
     * Used only my the Site class
     *
     * $id is the name of the class that has a controller
     * $controller array is all the controllers used in this project
     */
	public function __construct($id, array $controllers = [])
	{
		parent::__construct($id, $controllers);

        $this->url = RS;

		if (isset($_GET['url'])) {
			$this->url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
			unset($_GET['url']);
		}

	}
    /*
     * Function to
     */
    public function __get($route)
    {

        if (is_array($route))
            return parent::__get($route);

        $controller = parent::__get($route);

        try {
            $view = $controller->Content(null);
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
