<?php
class Model_Utils
{
	/**
	 * my autoloader
	 * 
	 * @param string $class
	 */
	public static function autoloader($class)
	{
		try
		{
			// Transform the class name into a path
			$file = explode('_', $class);
			foreach($file as $k=>$v)
			{
				$file[$k] = lcfirst($v);
			}
			$file = implode('/', $file);

			if ($path = Kohana::find_file('classes', $file))
			{
				// Load the class file
				require $path;

				// Class has been found
				return TRUE;
			}

			// Class is not in the filesystem
			return FALSE;
		}
		catch (Exception $e)
		{
			Kohana_Exception::handler($e);
			die;
		}
	}
}