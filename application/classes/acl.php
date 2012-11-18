<?php
class Acl
{
	private $_roles = array(
		'user'=>'user', 
		'admin'=>'admin',
	);
	
	private $_actions = array(
		'all'=>'all', 
		'view'=>'view', 
		'edit'=>'edit',
	);
	
	private $_resources = array(
		'site'=>'site', 
		'control panel'=>'control panel',
	);
	
	private $_rules = array(
		'site' => array(
			'user' => array('all'),
			'admin' => array('all'),
		),
		'control panel' => array(
			'admin' => array('all'),
		),
	);
	
	private $_user = null;
	
	/**
	 * @param Model_User $user
	 */
	public function __construct(Model_User $user)
	{
		$this->_user = $user;
	}
	
	/**
	 * @return bool
	 */
	public function isRole($role)
	{
		return isset($this->_roles[$role]); 
	}
	
	/**
	 * @return bool
	 */
	public function isAction($action)
	{
		return isset($this->_actions[$action]);
	}
	
	/**
	 * @return bool
	 */
	public function isResource($resource)
	{
		return isset($this->_resources[$resource]);
	}
	
	
	/**
	 * @param string $resource
	 * @param string $action
	 * @return bool
	 */
	public function isAllowed($resource, $action = 'view')
	{
		if(!$this->isAction($action))
		{
			throw new Exception('Wrong parameter $action');
		}
		
		if(!$this->isResource($resource))
		{
			throw new Exception('Wrong parameter $resource');
		}
		
		if(!$this->isRole($this->_user->role))
		{
			throw new Exception('Wrong user\'s role');
		}
		
		return isset($this->_rules[$resource])
				&& isset($this->_rules[$resource][$this->_user->role])
				&& (in_array($action, $this->_rules[$resource][$this->_user->role])
					|| in_array('all', $this->_rules[$resource][$this->_user->role]));
	}
}