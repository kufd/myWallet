<?php defined('SYSPATH') or die('No direct script access.');

class Date extends Kohana_Date 
{
	/**
	 * Returns current date
	 * 
	 * @return string
	 */
	public static function get()
	{
		return date('Y-m-d H:i:s');
	}
}
