<?php
Class Model_User extends Model_A1_User_ORM 
{
	protected $_table_name = 'users';
	
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
			/*
			'password' => array(
				array('md5'),
			),
			*/
		);
	}
	
	/**
	 * 
	 * Methos saves data
	 */
	/*
	public function save()
	{
		$this->password = md5($this->password);
		$this->login = strtolower($this->login);
		
		parent::save();
	}
	*/

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
}