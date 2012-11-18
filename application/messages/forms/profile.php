<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'password'		=> array(
		'not_empty' 	=> 'Введіть поточний пароль',
		'default'		=> 'Не правильно введений поточний пароль',	
	),
	'reNewPassword'		=> array(
		'matches'	 	=> 'Новий пароль і його повтор не співпадають',
		'default'		=> 'Не правильно введений повтор нового пароля',	
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
	'lang'			=> array(
		'default' 		=> __('Не правильна мова'),
	)
);
