<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller extends Kohana_Controller 
{
	public function before()
	{
		$this->_setLanguage();
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
}
