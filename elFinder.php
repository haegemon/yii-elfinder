<?php

/**
 * Автор: Beaten_Sect0r
 * http://fault.ws
 */

class elFinder extends CWidget
{
	public $url;
	public $lang;
	public $assets;

	private $_path;

	/**
	 * Init widget.
	 */
	public function init()
	{
		$this->lang = Yii::app()->language;

		$this->assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');
		$this->registerClientScript();

		$this->_path = Yii::getPathOfAlias('webroot.uploads');
	}

	/**
	 * Run widget.
	 */
	public function run()
	{
		// folder create
		if(!is_dir($this->_path))
		{
			@mkdir($this->_path, 0777, true);
				if(!file_exists($this->_path));
		}

		// .htaccess create
		if(!file_exists($this->_path . DIRECTORY_SEPARATOR . '.htaccess'))
		{
			$fopen = fopen($this->_path . DIRECTORY_SEPARATOR . '.htaccess', 'wb');
			fwrite($fopen, 'php_flag engine off');
			fclose($fopen);
		}

		echo '<div id="elfinder"></div>';
	}

	/**
	 * Register CSS and Scripts.
	 */
	protected function registerClientScript()
	{
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		$cs->registerCssFile($this->assets . '/css/elfinder.min.css');
		$cs->registerCssFile($this->assets . '/css/theme.css');
		$cs->registerScriptFile($this->assets . '/js/elfinder.min.js');
		$cs->registerScriptFile($this->assets . '/js/i18n/elfinder.ru.js');
		$cs->registerScript('', "$('#elfinder').elfinder({url:'$this->url',lang:'$this->lang'});");
	}
}