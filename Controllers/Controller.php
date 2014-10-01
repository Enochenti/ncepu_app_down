<?php
require_once 'Views/libs/Smarty.class.php';
class Controller {
	public $smarty;
	function __construct() {
		$this->smarty = new Smarty ();
		$this->smarty->setTemplateDir ( 'Views/templates/' );
		$this->smarty->setCompileDir ( 'Views/templates_c/' );
		$this->smarty->setConfigDir ( 'Views/config/' );
		$this->smarty->setCacheDir ( 'Views/cache/' );
	}
	static function create($name) {
		static $instance;
		if (! $instance) {
			$instance = new $name ();
		}
		return $instance;
	}
	function assign($key, $value) {
		$this->smarty->assign ( $key, $value );
	}
	function display($template) {
		$this->smarty->display ( $template );
	}
}
?>