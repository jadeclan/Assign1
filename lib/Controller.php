<?php

namespace Framework;

use Exception;
use RuntimeException;


/**
 * Interface Navable. Controllers implementing this
 * interface will be called while gathering nav links.
 * @author mark
 *
 */
interface Navable
{
    public function getNavString();
}

/**
 * The controller class. All controllers are expected to derive from this class.
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 *
 */
abstract class Controller
{
	/**
	 * Parent of this instance of the controller
	 * @var Controller 
	 */
	protected $parent = null;
	
	/**
	 * An array of controllers which are under this controller
	 * (parent, grand parent, great grand parent ........)
	 * @var array
	 */
	protected $controllers = [];
	
	/**
	 * This controllers id, used for routing.
	 * Note all routing id's are in lower case only.
	 * Class id's are uppercase first letter followed by lower case following
	 * Each instance of a controller has a unique $id
	 * @var string
	 */
	protected $id;
	
	/**
	 * Each controllers name, useful for titles/breadcrumbs
	 * Each instance of a controller has a name
	 * @var string
	 */
	protected $name;
	
	/**
	 * The arguments passed to this controller during routing.
	 * Each instance of a controller may have arguments passed to it
	 * @var array
	 */
	protected $arguments;
	
	
	/**
	 * Constructor.
	 * @param string $id Used as both the name (unmodified) and route (lowercase) for this controller.
	 * @param array $children An array of controllers below this controller.
	 */
	public function __construct($id, array $children = [])
	{
		// Sanity check
		assert(!empty($id) && is_string($id) && strtolower($id) !== "content", "Invalid controller id: $id");

		// Name
		$this->name = $id;
		
		// The ID will determine routing, so force lower case
		$this->id = strtolower($id);


		// Set parent (build controller hierarchy)
		if (!empty($children)) {
			foreach ($children as $child) {
				if (!isset($this->controllers[$child->id])) {
					$child->parent = $this;
					$this->controllers[$child->id] = $child;
				} else {
					throw new RuntimeException("Duplicate controller id detected: $this ($child->id)");
				}
			}
		}
	}
	
	/**
	 * This function will be called by each class that extends
	 * the controller class when this instance
	 * of the controller is routed.
	 * It is expected to return a valid View object or null.
	 */
	protected abstract function Content();

	/**
	 * Returns the route of this controller.
	 * @return string
	 */
	public function __toString()
	{
		return implode(RS, $this->getId());
	}
	
	/**
	 * Returns the route of this controller with respect to SEO. If SEO is disabled,
	 * we will prepend ?url= to create a query string. Otherwise, mod_rewrite is
	 * required to create the query string.
	 * @param boolean $trailing If true, will append a trailing route separator (useful for building links)
	 * @return string The route of this controller with respect to SEO.
	 */
	public function getRoute($trailing = false)
	{
		return (SEO ? $this : "?url=$this").($trailing ? RS : '');
	}
	
	/**
	 * Determines the route of this controller.
	 * @return array Each element represents a controller in the route hierarchy.
	 */
	public function getId()
	{
		// Don't include the top level
		if (is_null($this->parent))
			return [];
		
		$id = $this->parent->getId();
		array_push($id, $this->id);
		
		return $id;
	}
	
	/**
	 * Returns this controllers name.
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * Returns the root controller in the hierarchy.
	 * @return Controller The root controller.
	 */
	public function getRoot()
	{
		$c = $this;
		while (!empty($c->parent))
			$c = $c->parent;
	
		return $c;
	}
	
	/**
	 * Parses a route and returns the specified controller. This function
	 * will stop when a portion of the route is invalid, the rest of the
	 * route will be used as the controllers arguments. Includes standard
	 * path support, (root, current and previous paths).
	 * @param mixed $args The route of the controller we are looking for.
	 * @return Controller The controller specified.
	 */
	public function Route($args)
	{
		// Explode
		if (!is_array($args)) {
			$args = explode(RS, strtolower(rtrim($args, RS)));
			
			// Path is an absolute path...
			if (count($args) > 0 && empty($args[0])) {
				array_shift($args);
				return $this->getRoot()->Route($args);
			}
		}
		
		// Parse arguments
		if (count($args) > 0) {
			$first = array_shift($args);
			
			// Current
			if (empty($first) || $first === '.')
				return $this->Route($args);
			
			// Previous
			if ($first === '..') {
				if (isset($this->parent))
					return $this->parent->Route($args);
				
				// Ignore if we have no parent
				return $this->Route($args);
			}
			
			// Controller
			if (isset($this->controllers[$first]))
				return $this->controllers[$first]->Route($args);
			
			// Not found, assume remainder of route are arguments to controller
			array_unshift($args, $first);
		}
		
		$this->arguments = $args;
		
		return $this;
	}

	/**
	 * Renders the controller specified in $route. If no route is specified,
	 * render this controller.
	 *
	 * The controller is rendered by calling its Content function, which is
	 * expected to return a View object. If the controller throws an exception,
	 * we will render the Exception or Message template depending if the DEBUG
	 * flag is set. This prevents leaking stack traces in production.
	 *
	 * @param string $route
	 * @return string
	 */
	public function Render($route = null)
    {
       	if (empty($route))
            $controller = $this;
        else
            $controller = $this->Route($route);

        try {
            $view = $controller->Content();
        } catch (Exception $e) {
            if (DEBUG) {
                $view = new View('Exception.tpl', ['e' => $e]);
            } else {
                $view = new View('Message.tpl', ['msg' => 'There was an error accessing this module.']);
            }
        }
		return empty($view) ? '' : $view->render($controller);
	}
		
	/**
	 * Returns an array containing all controllers in the hierarchy
	 * that implement Navable, begining with the current controller.
	 * The array is indexed by the controller's getNavString() function.
	 * @param array $navables
	 * @return array
	 */
	public function getNavables(array &$navables = [])
	{
		if ($this instanceof Navable)
			$navables[$this->getNavString()] = $this;
		
		foreach ($this->controllers as $c)
			$c->getNavables($navables);
		
		return $navables;
	}
	
	/**
	 * Transforms the array returned from getNavables() into a 
	 * nested array based on the navables getNavString method.
	 * @return array
	 */
	public function getNavLinks()
	{		
		$callback = function($k, $v, &$nav) {
			$path = explode('\\', $k);
			while ($key = array_shift($path)) {
				if (count($path) > 0)
					$nav = &$nav[$key];
				else
					$nav[$key] = $v->getRoute();
			}
		};
		
		$nav = [];
		foreach ($this->getNavables() as $k => $v)
			$callback($k, $v, $nav);
		
		return $nav;
	}
}