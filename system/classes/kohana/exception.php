<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Exception extends Kohana_Kohana_Exception 
{
	public static function handler(Exception $e) 
	{
        // send email if production
        if (Kohana::$environment==Kohana::PRODUCTION)
        {
            $message = Kohana_Exception::text($e);
            
            Notifier::sendError($message);

            self::$error_view = 'errors/500';
            if ($e instanceof HTTP_Exception_404)
            {
            	self::$error_view = 'errors/404';
            }
        }
        
        parent::handler($e);
        
	}
}
