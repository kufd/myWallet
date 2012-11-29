<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Exception extends Kohana_Kohana_Exception 
{
	
	public static function handler(Exception $e) 
	{
        if (Kohana::$environment==Kohana::PRODUCTION)
        {
            try
            {
            	// send email if production
                $message = Kohana_Exception::text($e);
            	Notifier::sendError($message);
  
  				$url = 'error/500';
                if ($e instanceof HTTP_Exception)
                {
                    $url = 'error/'.$e->getCode();
                }
 
                // Error sub-request.
                echo Request::factory($url)
                ->execute()
                ->send_headers()
                ->body();
            }
            catch (Exception $e)
            {
                // Clean the output buffer if one exists
                ob_get_level() and ob_clean();
 
                // Display the exception text
                echo '<h1>Server internal error</h1>';
 
                // Exit with an error status
                exit(1);
            }
        }
        else
        {
        	parent::handler($e);
        }
	}
	
}
