<?php
class Notifier
{
	private static $_instance = null;
	private static $_mailer = null;
	
	/**
	 * @return self
	 */
	public static function getInstance()
	{
		if(is_null(self::$_instance))
		{
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
	
	/**
	 * @param string $subject
	 * @param string $message
	 * @param string $to
	 * @param string $from
	 */
	private function _send($subject, $message, $to, $from = 'support@my-wallet.com.ua')
	{
		$message = Swift_Message::newInstance()
    		->setSubject($subject)
    		->setFrom($from)
    		->setTo(array($to))
    		->setBody($message);
 
		$this->_getMailer()->send($message);
	}
	
	/**
	 * @return Swift_Mailer
	 */
	private function _getMailer()
	{
		if(is_null(self::$_mailer))
		{
			/*
			$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  				->setUsername('myroslav.kosinski@gmail.com')
  				->setPassword('paralelepiped');
  				*/
  			$transport = Swift_SmtpTransport::newInstance();
			self::$_mailer = Swift_Mailer::newInstance($transport);
		}
		
		return self::$_mailer;
	}
	
	/**
	 * @param string $to
	 * @param array $params
	 */
	public static function sendForgotPasswordInstruction($to, $params = array())
	{
$message = __(
"Якщо ви отримали це повідомлення, але не користувались процедурою відновлення поролю то проігноруйте його.
 
Для того щоб отримати пароль перейдіть за вказаною адресою:
:url

Служба підтримки my-wallet.com.ua", 
	array(
		':url' => URL::site("/forgotPassword/generate/{$params['hashObj']->hash}/")
	)
);
		
		self::getInstance()->_send(__('Нагадування паролю. Інструкція.'), $message, $to);
	}
	
	/**
	 * @param string $to
	 * @param array $params
	 */
	public static function sendForgotPasswordNewPassword($to, $params = array())
	{
		$message = __(
"Ваш новий пароль для доступу до my-wallet: :password
Служба підтримки my-wallet.com.ua",
	array(
		':password' => $params['password']
	)
);
		
		self::getInstance()->_send(__('Нагадування паролю. Новий пароль.'), $message, $to);
	}
}