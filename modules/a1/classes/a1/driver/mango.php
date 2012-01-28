<?php

abstract class A1_Driver_Mango extends A1 {

	/**
	 * Loads the user object from database using username
	 *
	 * @param   string   username
	 * @return  object   User Object
	 */
	protected function _load_user($username)
	{
		return Mango::factory($this->_config['user_model'],array(
			$this->_config['columns']['username'] => $username
		))->load();
	}

	/**
	 * Saves the user object
	 *
	 * @param   object   User object
	 * @return  void
	 */
	protected function _save_user($user)
	{
		$user->update();
	}
}