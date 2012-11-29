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
			
			$result['profile']['id'] 			= A1::instance()->get_user()->id;
			$result['profile']['login'] 		= A1::instance()->get_user()->login;
			$result['profile']['name'] 			= A1::instance()->get_user()->name;
			$result['profile']['email']	 		= A1::instance()->get_user()->email;
			$result['profile']['lang'] 			= A1::instance()->get_user()->lang;
			$result['profile']['currency'] 		= A1::instance()->get_user()->currency;
			
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
			'Надіслати' => __('Надіслати'),
			'Профіль збережено.' => __('Профіль збережено.'),
			'Відгук надіслано.' => __('Відгук надіслано.'),
		);
	}
	
	public function action_index()
	{
		$this->addCss('/storage/css/main.css');
		$this->addCss('/storage/css/jquery.ajaxLoader.css');
		$this->addCss('/storage/css/jquery.jboxmessage.css');
		$this->addCss('/storage/css/register.css');
		$this->addCss('/storage/css/forgotPassword.css');
		$this->addCss('/storage/css/login.css');
		$this->addCss('/storage/css/profile.css');
		$this->addCss('/storage/css/wallet.css');
		$this->addCss('/storage/css/feedback.css');
		$this->addCss('/storage/css/about.css');
		$this->addCss('/storage/css/formAddSpending.css');
		$this->addCss('/storage/css/controlPanel/translate.css');
		$this->addCss('/storage/css/jquery.ui/custom-theme/jquery-ui-1.9.1.custom.min.css');
		$this->addCss('/storage/css/jquery.simplePagination.css');
		
		$this->addJs('/storage/js/jquery-1.8.2.min.js');
		$this->addJs('/storage/js/jquery.ui/jquery-ui-1.9.1.custom.min.js');
		$this->addJs('/storage/js/jquery.ui/jquery.ui.datepicker-ru.js');
		$this->addJs('/storage/js/jquery.ui/jquery.ui.datepicker-ua.js');
		$this->addJs('/storage/js/jquery.ui/jquery.ui.datepicker-en-us.js');
		$this->addJs('/storage/js/jquery.ajaxLoader.js');
		$this->addJs('/storage/js/jquery.jboxmessage.js');
		$this->addJs('/storage/js/jquery.shadow.js');
		$this->addJs('/storage/js/jquery.simplePagination.js');
		$this->addJs('/storage/js/template/template.js');
		$this->addJs('/storage/js/core.js');
		$this->addJs('/storage/js/db.js');
		$this->addJs('/storage/js/user.js');
		
		$this->addJs('/storage/js/templates/controlPanel.js');
		$this->addJs('/storage/js/templates/controlPanel/translate.js');
		$this->addJs('/storage/js/templates/register.js');
		$this->addJs('/storage/js/templates/forgotPassword.js');
		$this->addJs('/storage/js/templates/about.js');
		$this->addJs('/storage/js/templates/login.js');
		$this->addJs('/storage/js/templates/formAddSpending.js');
		$this->addJs('/storage/js/templates/profile.js');
		$this->addJs('/storage/js/templates/spendings.js');
		$this->addJs('/storage/js/templates/wallet.js');
		$this->addJs('/storage/js/templates/feedback.js');
		$this->addJs('/storage/js/templates/main.js');
		
		$this->addJs('/storage/js/main.js');
		
		$this->response->body(
			View::factory('index')
			->set('content', '')
			->set('title', __('Мій гаманець'))
		);
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
		$result['templates']['feedback'] = View::factory('feedback')->__toString();
		$result['templates']['about'] = View::factory('about')->__toString();
		
		$result['templates']['controlPanel/translate'] = View::factory('controlPanel/translate')->__toString();
		
		$result['logged'] = A1::instance()->logged_in();
		
		$result['groupBySpendings'] = new stdClass();
		
		$result['sorting']['field'] = 'date';
		$result['sorting']['direction'] = 'desc';
		
		$result['availableLanguages'] = I18n::getAvailableLanguages();
		$result['lang'] = I18n::lang();
		
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
		else
		{
			A1::instance()->session()->set('password', $this->request->post('password'));
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
			$params['password'] = A1::instance()->session()->get('password');
			
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
		$params['password'] = A1::instance()->session()->get('password');
		
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
			
			if(!empty($params['newPassword']))
			{
				A1::instance()->session()->set('password', $params['newPassword']);
			}
		}
		else 
		{
			$result['errors'] = $errors;
		}

		$this->response->body(json_encode($result));
	}
	
	public function action_sendFeedback()
	{
		$result = array();
		
		$params = $this->request->post('params');
		
		$errors = Model_Validator::formFeedback($params);
		
		if($errors === true)
		{
			Notifier::sendFeedback(Notifier::EMAIL_SUPPORT, $params);
		}
		else 
		{
			$result['errors'] = $errors;
		}

		$this->response->body(json_encode($result));
	}
}