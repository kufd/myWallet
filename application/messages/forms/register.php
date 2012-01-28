<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'login'			=> array(
		'not_empty' 	=> 'Введіть логін',
		'min_length' 	=> 'Довжина логіну має бути більшою 4-х символів',
		'isLoginUnique'	=> 'Введений логін зайнятий',
		'regex'			=> 'Логін введений не правильно',
		'default'		=> 'Логін введений не правильно',
	),
	'password'		=> array(
		'not_empty' 	=> 'Введіть пароль',
		'default'		=> 'Не правильно введений пароль',	
	),
	'rePassword'		=> array(
		'not_empty' 	=> 'Введіть повтор пароля',
		'matches'	 	=> 'Пароль і повтор пароля не співпадають',
		'default'		=> 'Не правильно введений повтор пароля',	
	),
	'name'			=> array(
		'not_empty' 	=> 'Введіть ім’я',
		'default'	 	=> 'Не правильно введене ім’я',
	),
	'email'			=> array(
		'not_empty' 	=> 'Введеть email',
		'email'	 		=> 'Не правильний email',
		'default' 		=> 'Не правильний email',
	),
);
