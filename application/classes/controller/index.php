<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller 
{
	/**
	 * Method returns export data for authentificated user 
	 */
	protected function _authExportData()
	{ 
		$result = array();
		
		if(A1::instance()->logged_in())
		{
			$result['topSpendingNames'] = Model_SpendingName::topNames(array('userId'=>A1::instance()->get_user()->id, 'limit'=>15));
			
			$result['profile']['id'] 		= A1::instance()->get_user()->id;
			$result['profile']['login'] 	= A1::instance()->get_user()->login;
			$result['profile']['name'] 		= A1::instance()->get_user()->name;
			$result['profile']['email'] 	= A1::instance()->get_user()->email;
			$result['profile']['lang'] 		= A1::instance()->get_user()->lang;
			
			$result['acl']['control panel']	= A1::instance()->get_user()->isAllowed('control panel');
		}
		
		return $result;
	}
	
	/**
	 * @return array
	 */
	private function _getTranslations()
	{
		return array(
			'Відмінити' => __('Відмінити'),
			'Видалити' => __('Видалити'),
			'інша витрата' => __('інша витрата'),
			'Загальна сума' => __('Загальна сума'),
			'Зберегти' => __('Зберегти'),
		);
	}
	
	public function action_index()
	{
		$this->response->body(View::factory('index'));
	}
	
	public function action_export()
	{
		$result=array();
		$result['templates'] = array();
		$result['templates']['register'] = View::factory('register')->__toString();
		$result['templates']['login'] = View::factory('login')->__toString();
		$result['templates']['wallet'] = View::factory('wallet')->__toString();
		$result['templates']['main'] = View::factory('main')->__toString();
		$result['templates']['formAddSpending'] = View::factory('formAddSpending')->__toString();
		$result['templates']['spendings'] = View::factory('spendings')->__toString();
		$result['templates']['profile'] = View::factory('profile')->__toString();
		$result['templates']['forgotPassword'] = View::factory('forgotPassword')->__toString();
		
		$result['templates']['controlPanel/translate'] = View::factory('controlPanel/translate')->__toString();
		
		$result['logged'] = A1::instance()->logged_in();
		
		$result['groupBySpendings'] = new stdClass();
		
		$result['sorting']['field'] = 'date';
		$result['sorting']['direction'] = 'desc';
		
		$result['availableLanguages'] = I18n::getAvailableLanguages();
		
		$result = array_merge($result, $this->_authExportData());
		
		$result['translations'] = $this->_getTranslations();
		
		$this->response->body(json_encode($result));
	}

	public function action_register()
	{
		$result = array();
		
		$errors = Model_Validator::registerForm($this->request->post('params'));
		if($errors === true)
		{
			Model_User::register($this->request->post('params'));
		}
		else 
		{
			$result['errors'] = $errors;
		}

		$this->response->body(json_encode($result));
	}
	
	public function action_login()
	{
		$result = array();
		A1::instance()->logout();
		A1::instance()->login($this->request->post('login'), $this->request->post('password'), (bool)$this->request->post('remember'));
		
		if(!A1::instance()->logged_in())
		{
			$result['errors'][] = 'Не правильний логін або пароль';
		}
		
		$result = array_merge($result, $this->_authExportData());
		
		$this->response->body(json_encode($result));
	}
	
	public function action_logout()
	{
		A1::instance()->logout();
	}
	
	public function action_addSpending()
	{
		$result = array();
		
		$errors = Model_Validator::formAddSpending($this->request->post('params'));
		
		if($errors === true)
		{
			$params = $this->request->post('params');
			$params['userId'] = A1::instance()->get_user()->id;
			Model_Spending::addSpending($params);
		}
		else 
		{
			$result['errors'] = $errors;
		}

		$this->response->body(json_encode($result));
	}
	
	public function action_spendingNamesAutocomplete()
	{
		$this->response->body(json_encode(Model_SpendingName::autocomplete(array('query'=>$this->request->query('term'), 'limit'=>10))));
	}
	
	public function action_spendingList()
	{
		$params = $this->request->post('params');
		$params['userId'] = A1::instance()->get_user()->id;
		$this->response->body(json_encode(Model_Spending::getList($params)));
	}
	
	public function action_deleteSpending()
	{
		Model_Spending::deleteSpending($this->request->post('id'));
	}
	
	public function action_saveProfile()
	{
		$result = array();
		
		$errors = Model_Validator::formProfile($this->request->post('params'));
		
		if($errors === true)
		{
			$params = $this->request->post('params');
			A1::instance()->get_user()->saveProfile($params);
		}
		else 
		{
			$result['errors'] = $errors;
		}

		$this->response->body(json_encode($result));
	}
}