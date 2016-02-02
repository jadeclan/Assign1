<?php

namespace Framework;

/**
 * The View class. Every controller is expected to return an object of this type.
 * Developed by: Bergeron, O'Donnell, Pitrolia, Walker
 * January - February, 2016
 *
 */
class View
{
	// default directory for all views (.tpl files)
	private static $templatePath = 'themes/default';
	/*
	 * Need to include description of these
	 */
	private $template;
	private $data;


	// Basic setter
	public static function setTemplatePath($path) {
		self::$templatePath = $path;
	}
	// Basic getter
	public static function getTemplatePath() {
		return self::$templatePath;
	}
	/*
	 * Function __construct
	 * Need description
	 */
	public function __construct($template, array $data = [])
	{
		$this->template = self::$templatePath.DS.$template;
		$this->data = $data;
	}
	/*
	 * function render
	 * Need description
	 */
	public function render(Application $app)
	{
		extract($this->data);
		
		ob_start();
		
		include $this->template;
		
		return ob_get_clean();
	}
}