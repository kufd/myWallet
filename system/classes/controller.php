<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller extends Kohana_Controller 
{
	private $_styles = array();
	private $_scripts = array();
	
	public function before()
	{
		$this->_setLanguage();
	}
	
	public function after()
	{
		$stylesAndScripts = "\n\n" . $this->_getStyles() . "\n\n" .$this->_getScripts() . "\n";
		
		$body = (string)$this->response->body();
		
		$body = str_replace('</head>', $stylesAndScripts.'</head>', $body);
		
		$this->response->body($body);
	}
	
	/**
	 * set users language
	 */
	private function _setLanguage()
	{
		$lang = Cookie::get('lang');
		
		if(A1::instance()->logged_in())
		{
			$lang = A1::instance()->get_user()->lang;
		}
		
		Cookie::$expiration = Date::YEAR;
		Cookie::set('lang', $lang);
		
		I18n::lang($lang);
	}
	
	/**
	 * @param string $src
	 */
	public function addCss($src)
	{
		$this->_styles[$src] = $src;
	}
	
	/**
	 * @return string 
	 */
	private function _getStyles()
	{
		$styles = '';
		
		foreach($this->_styles as $src)
		{
			$styles .= HTML::style($src)."\n";
		}
		
		return $styles;
	}
	
	/**
	 * @param string $src
	 */
	public function addJs($src)
	{
		$this->_scripts[$src] = $src;
	}
	
	/**
	 * @return string 
	 */
	private function _getScripts()
	{
		$scripts = '';
		
		foreach($this->_scripts as $src)
		{
			$scripts .= HTML::script($src)."\n";
		}
		
		return $scripts;
	}
}
