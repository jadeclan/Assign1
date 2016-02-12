<?php

namespace Framework;

/**
 * The View class. Every controller is expected to return an object of this type.
 *
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 *
 */
class View
{
	/**
	 * Default directory for views (.tpl) files.
	 * @var string
	 */
	private static $templatePath = 'app/views';

	public static function setTemplatePath($path) {
		self::$templatePath = $path;
	}

	public static function getTemplatePath() {
		return self::$templatePath;
	}

	/**
	 * The template file to render.
	 * @var string
	 */
	private $template;

	/**
	 * A data array that will be extracted and 'injected' into the template.
	 * @var array
	 */
	private $data;


	/**
	 * View constructor.
	 * @param $template
	 * @param array $data
	 */
	public function __construct($template, array $data = [])
	{
		$this->template = self::$templatePath.DS.$template;
		$this->data = $data;
	}

	/**
	 * Renders a template file. The template file will be included within the scope
	 * of this function, meaning any variables declared or passed to this function
	 * will be available to the view. The included file is returned as a string.
	 *
	 * @param Controller $c
	 * @return string
	 */
	public function render(Controller $c)
	{
		// automatically inject $themedir into every template
		$themedir = self::getTemplatePath();

		// also inject our site url
		$siteurl = "http://" . $_SERVER['SERVER_NAME'];

		if ($_SERVER['SERVER_PORT'] !== 80)
			$siteurl .= ":" . $_SERVER['SERVER_PORT'];

		$siteurl .= explode('?', $_SERVER['REQUEST_URI'], 2)[0];

		extract($this->data);
		
		ob_start();
		
		include $this->template;
		
		return ob_get_clean();
	}
}