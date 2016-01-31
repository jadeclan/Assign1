<?php

namespace Framework;

/**
 * The View class. Every controller is expected to return an object of this type.
 * @author mark
 *
 */
class View
{
	private static $templatePath = 'themes/default';
	
	public static function setTemplatePath($path) {
		self::$templatePath = $path;
	}
	
	public static function getTemplatePath() {
		return self::$templatePath;
	}
	
	private $template;
	private $data;
	
	public function __construct($template, array $data = [])
	{
		$this->template = self::$templatePath.DS.$template;
		$this->data = $data;
	}
	
	public function render(Application $app)
	{
		extract($this->data);
		
		ob_start();
		
		include $this->template;
		
		return ob_get_clean();
	}
}