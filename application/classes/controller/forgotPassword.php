<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ForgotPassword extends Controller 
{
	
	public function action_generate()
	{
		$isPasswordSent = false;

		$hash = Model_ForgotPasswordHash::getByHash($this->request->param('hash'));
		
		if($hash instanceOf Model_ForgotPasswordHash)
		{
			try
			{
				$user = new Model_User($hash->userId);
				$password = $user->setGeneratedPassword();
				
				//sending notify
				Notifier::sendForgotPasswordNewPassword(
					$user->email, 
					array('password' => $password)
				);
				
				$isPasswordSent = true;
			}
			catch(Exception $e)
			{
				
			}
		}
		
		$this->response->body(View::factory('forgotPassword/generate')->bind('isPasswordSent', $isPasswordSent));
	}
	
	public function action_sendMessage()
	{
		$result = array();
		
		$errors = Model_Validator::formForgotPassword($this->request->post('params'));
		
		if($errors === true)
		{
			$params = $this->request->post('params');
			Model_ForgotPasswordHash::addHash($params['login']);
		}
				
		if(is_array($errors) && !empty($errors))
		{
			$result['errors'] = $errors;
		}

		$this->response->body(json_encode($result));
	}

}