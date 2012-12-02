<?php
Class Model_User extends Model_A1_User_ORM 
{
	protected $_table_name = 'users';
	
	private $_acl = null;
	
	/**
	 * method creates new user
	 * 
	 * @param array $params
	 */
	public static function register($params)
	{
		$user = new self();
		isset($params['login']) && $user->login = $params['login'];
		isset($params['password']) && $user->password = $params['password'];
		isset($params['name']) && $user->name = $params['name'];
		isset($params['email']) && $user->email = $params['email'];
		$user->dateRegistration = Date::get();
		$user->save();
	}
	
	/**
	 * 
	 * filters for fields
	 * @return array
	 */
	public function filters() 
	{
		return array(
			true => array(
				array('trim'),
			),
			'login' => array(
         		array('strtolower'),
			),
		);
	}
	

	/**
	 * 
	 * Check if the username already exists in the database
	 * @param string $login
	 * @return bool
	 */
	public static function isLoginUnique($login)
	{
     	return ! DB::select(array(DB::expr('COUNT(login)'), 'total'))
        	->from('users')
        	->where('login', '=', $login)
        	->execute()
        	->get('total');
	}
	
	/**
	 * Method cheks login and password
	 * 
	 * @param string $password
	 * 
	 * @return bool
	 */
	public static function isMatchedPasswordForLoggedUser($password)
	{
     	return (A1::instance()->logged_in()) ? A1::instance()->check_password(A1::instance()->get_user(), $password) : false;
	}
	
	/**
	 * method saves user's profile
	 * 
	 * @param array $params
	 */
	public function saveProfile($params)
	{
		$this->_db->begin();
		
		try 
		{
			//update encryption
			if(!empty($params['newPassword']) && !empty($params['password']))
			{
				Model_Spending::updateEncriptionKey($this->id, $params['password'], $params['newPassword']);
			}
			
			//encrypt or decrypt spendings
			if(isset($params['useEncryption']) 
				&& $params['useEncryption'] != $this->useEncryption
				&& !empty($params['password']))
			{
				$password = !empty($params['newPassword']) ? $params['newPassword'] : $params['password'];
				
				if($params['useEncryption'])
				{
					Model_Spending::encryptSpendings($this->id, $password);
				}
				else
				{
					Model_Spending::decryptSpendings($this->id, $password);
				}
			}
		
			isset($params['newPassword']) && $params['newPassword'] && $this->password = $params['newPassword'];
			isset($params['name']) && $this->name = $params['name'];
			isset($params['email']) && $this->email = $params['email'];
			isset($params['lang']) && $this->lang = $params['lang'];
			isset($params['currency']) && $this->currency = $params['currency'];
			isset($params['useEncryption']) && $this->useEncryption = $params['useEncryption'];
			$this->save();
		
			$this->_db->commit();
		}
		catch (Exception $e)
		{
     		$this->_db->rollback();
     		
     		throw new Exception($e->getMessage());
 		}
	}
	
	/**
	 * Methot generates password
	 * @param int $length
	 * @return string
	 */
	public static function generatePassword($length = 8) 
	{
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';
    	return substr(str_shuffle($chars), 0, $length);
	}
	
	/**
	 * Method generate and set password for user
	 * 
	 * @param int $userId
	 * @return string
	 */
	public function setGeneratedPassword()
	{
		$password = self::generatePassword();
		
		$this->saveProfile(array('newPassword' => $password));
		
		return $password;
	}
	
	/**
	 * @param string $login
	 * @return Model_User
	 */
	public static function getByLogin($login)
	{
		$user = new self();
		$user->where('login', '=', $login);
    	$user->find();
    
    	return $user->loaded() ? $user : null;
	}
	
	/**
	 * 
	 * Check if user already exists in the database
	 * @param string $login
	 * @return bool
	 */
	public static function isExistsUser($login)
	{
     	return !self::isLoginUnique($login);
	}
	
	/**
	 * @param string $resource
	 * @param string $action
	 * @return bool
	 */
	public function isAllowed($resource, $action = 'view')
	{
		if(!$this->_acl)
		{
			$this->_acl = new Acl($this);
		}
		
		return $this->_acl->isAllowed($resource, $action);
	}
}