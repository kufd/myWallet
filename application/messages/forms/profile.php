<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'password'		=> array(
		'not_empty' 	=> 'Введіть поточний пароль',
		'default'		=> 'Неправильно введений поточний пароль',	
	),
	'reNewPassword'		=> array(
		'matches'	 	=> 'Новий пароль і його повтор не співпадають',
		'default'		=> 'Неправильно введений повтор нового пароля',	
	),
	'name'			=> array(
		'not_empty' 	=> 'Введіть ім’я',
		'default'	 	=> 'Неправильно введене ім’я',
	),
	'email'			=> array(
		'not_empty' 	=> 'Введеть email',
		'email'	 		=> 'Неправильний email',
		'default' 		=> 'Неправильний email',
	),
	'lang'			=> array(
		'default' 		=> __('Не правильна мова'),
	),
	'currency'			=> array(
		'not_empty' 	=> 'Введіть валюту',
		'default' 		=> 'Неправильна валюта',
	)
);
