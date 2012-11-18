<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ControlPanel extends Controller 
{
	public function before()
	{
		parent::before();
		
		if(!A1::instance()->get_user() instanceof Model_User 
			|| !A1::instance()->get_user()->isAllowed('control panel'))
		{
			throw new Exception_AccesDenied();
		}
	}
	
	public function action_getPhrases()
	{
		$result = array();
		
		$params = $this->request->post('params');

		$result['phrases'] = $params['showOnlyNotTranslated'] == 'true' ? I18n::loadNotTranslated($params['lang']) : I18n::load($params['lang']);
		
		$result['total'] = count($result['phrases']);
		
		$result['phrases'] = $this->_splitArrayByPages($result['phrases'], $params['page'], $params['onPage']);
		
		$this->response->body(json_encode($result));
	}
	
	public function action_savePhrase()
	{
		$result = array();
		
		$params = $this->request->post('params');
		
		I18n::savePhrase($params['phrase'], $params['lang'], $params['translation']);
		
		$this->response->body(json_encode($result));
	}
	
	public function action_removePhrase()
	{
		$result = array();
		
		$params = $this->request->post('params');
		
		I18n::removePhrase($params['phrase'], $params['lang']);
		
		$this->response->body(json_encode($result));
	}
	
	/**
	 * @param array $arr
	 * @param int $page
	 * @param int $onPage
	 * 
	 * @return array
	 */
	private function _splitArrayByPages($arr, $page, $onPage) 
	{
		if(!is_null($page) && !is_null($onPage))
		{
			$pages = array_chunk($arr, $onPage, true);
			return isset($pages[$page-1]) ? $pages[$page-1] : array();
		}
		
		return $arr;
	}
}