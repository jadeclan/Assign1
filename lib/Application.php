<?php

namespace Framework;

use Exception;

/**
 * The application class. The application layer is the top-level 
 * controller and the root of the controller hierarchy.
 * @author mark
 */
abstract class Application extends Controller
{
	private $url;
	
	public function __construct($id, array $controllers = [])
	{
		parent::__construct($id, $controllers);

        $this->url = RS;

		if (isset($_GET['url'])) {
			$this->url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
			unset($_GET['url']);
		}

	}

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
