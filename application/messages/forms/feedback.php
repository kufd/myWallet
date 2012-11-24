<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'name'			=> array(
		'not_empty' 	=> 'Введіть ім’я',
		'default'	 	=> 'Не правильно введене ім’я',
	),
	'email'			=> array(
		'not_empty' 	=> 'Введеть email',
		'email'	 		=> 'Не правильний email',
		'default' 		=> 'Не правильний email',
	),
	'feedback'			=> array(
		'not_empty' 	=> 'Введіть відгук',
		'default'	 	=> 'Неправильно введений відгук',
	),
);
