<?php
class Model_Validator
{
	public static function registerForm($params)
	{
		$params = 	Validation::factory($params)
					
					->rule('login', 'not_empty')
					->rule('login', 'min_length', array(':value', 4))
            		->rule('login', 'regex', array(':value', '/^[a-z_.0-9]++$/iD'))
            		->rule('login', array(new Model_User(), 'isLoginUnique'))
 
            		->rule('password', 'not_empty')
            		
            		->rule('rePassword', 'not_empty')
            		->rule('rePassword',  'matches', array(':validation', ':field', 'password'))
            		
            		->rule('name', 'not_empty')
            		
            		->rule('email', 'not_empty')
            		->rule('email', 'email');
            		
		return $params->check() ? true : $params->errors('forms/register');
	}
	
	public static function formAddSpending($params)
	{
		$params = 	Validation::factory($params)
		
					->rule('spendingName', 'not_empty')
					
					->rule('spendingNameId', 'digit')
 
            		->rule('amount', 'not_empty')
            		->rule('amount', 'numeric')
            		
            		->rule('date', 'not_empty')
            		->rule('date', 'date')
            		
            		->rule('spendingId', 'digit');
            		
		return $params->check() ? true : $params->errors('forms/addSpending');
	}
	
	
	public static function formProfile($params)
	{
		$params = 	Validation::factory($params)
 
            		->rule('password', 'not_empty')
            		->rule('password', array(new Model_User(), 'isMatchedPasswordForLoggedUser'))
       
       				->rule('reNewPassword',  'matches', array(':validation', ':field', 'newPassword'))
       				     		            		
            		->rule('name', 'not_empty')
            		
            		->rule('email', 'not_empty')
            		->rule('email', 'email')
            		
            		->rule('lang', array(new I18n(), 'isAvailableLanguage'))
            		
            		->rule('currency', 'not_empty');
       
            		
		return $params->check() ? true : $params->errors('forms/profile');
	}
	
	public static function formForgotPassword($params)
	{
		$params = 	Validation::factory($params)
 
            		->rule('login', 'not_empty')
            		->rule('login', array(new Model_User(), 'isExistsUser'));
       
            		
		return $params->check() ? true : $params->errors('forms/forgotPassword');
	}
	
	public static function formFeedback($params)
	{
		$params = 	Validation::factory($params)
       				     		            		
            		->rule('name', 'not_empty')
            		
            		->rule('email', 'not_empty')
            		->rule('email', 'email')
            		
            		->rule('feedback', 'not_empty');
       
            		
		return $params->check() ? true : $params->errors('forms/feedback');
	}
}