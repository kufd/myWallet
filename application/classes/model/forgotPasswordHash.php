<?php
Class Model_ForgotPasswordHash extends ORM 
{
	protected $_primary_key = 'hash';
	
	const LIFE_TIME = 900; //15 min
	
	protected $_table_name = 'forgotPasswordHash';
	
	public static function addHash($login)
	{
		$user = Model_User::getByLogin($login);
		
		if(!$user instanceOf Model_User)
		{
			throw new Exception('User not forund');
		}
		
		$hashObj = new self();
		$hashObj->userId = $user->id;
		$hashObj->hash = md5($user->id .'-'. time() .'-'. uniqid());
		$hashObj->dateExpire = date('Y-m-d H:i:s', (time() + self::LIFE_TIME));
		$hashObj->save();
		
		//sending notify
		Model_Notifier::sendForgotPasswordInstruction(
			$user->email, 
			array('hashObj' => $hashObj)
		);
	}
	
	public static function getByHash($hash)
	{
		$hashObj = new self();
		$hashObj->where('hash', '=', $hash);
		$hashObj->where('dateExpire', '>', date('Y-m-d H:i:s'));
    	$hashObj->find();
    
    	return $hashObj->loaded() ? $hashObj : null;
	}
}