<?php

abstract class A1_Driver_ORM extends A1 {

	/**
	 * Loads the user object from database using username
	 *
	 * @param   string   username
	 * @return  object   User Object
	 */
	protected function _load_user($username)
	{
		return ORM::factory($this->_config['user_model'], array( $this->_config['columns']['username'] => $username));
	}
}