<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller extends Kohana_Controller 
{
	private $_jsCssCompressor = null;
	
	public function before()
	{
		$this->_setLanguage();
	}
	
	public function after()
	{
		//insert styles and scripts
		$styles = $this->_getStyles();
		$scripts = $this->_getScripts();
		
		if($styles || $scripts)
		{
			$stylesAndScripts = "\n\n" . $styles . "\n\n" . $scripts . "\n";
		
			$body = (string)$this->response->body();
		
			$body = str_replace('</head>', $stylesAndScripts.'</head>', $body);
		
			$this->response->body($body);
		}
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
		$this->_getJsCssCompressor()->addCss($src);
	}
	
	/**
	 * @return string 
	 */
	private function _getStyles()
	{
		$path = $this->_getJsCssCompressor()->getCss();
		$styles = $path ? '<link type="text/css" href="'.$path.'" rel="stylesheet" />' : '';
		
		return $styles;
	}
	
	/**
	 * @param string $src
	 */
	public function addJs($src)
	{
		$this->_getJsCssCompressor()->addJs($src);
	}
	
	/**
	 * @return string 
	 */
	private function _getScripts()
	{
		$path = $this->_getJsCssCompressor()->getJs();
		$scripts = $path ? '<script type="text/javascript" src="'.$path.'"></script>' : '';
		
		return $scripts;
	}
	
	/**
	 * @return JsCssCompressor
	 */
	private function _getJsCssCompressor()
	{
		if(is_null($this->_jsCssCompressor))
		{
			$this->_jsCssCompressor = new JsCssCompressor(DOCROOT, "storage/tmp/");
		}
		
		return $this->_jsCssCompressor;
	}
}
