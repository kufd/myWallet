<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'spendingName'	=> array(
		'not_empty' 	=> 'Введіть назву витрати',
		'default'		=> 'Назва витрати введена неправильно',
	),
	'spendingNameId'	=> array(
		'default'		=> 'Назва витрати введена неправильно',
	),
	'amount'		=> array(
		'not_empty' 	=> 'Введіть суму',
		'decimal'		=> 'Неправильно введена сума',
		'default'		=> 'Неправильно введена сума',	
	),
	'date'			=> array(
		'not_empty' 	=> 'Введіть дату',
		'date'		 	=> 'Дата введена неправильно',
		'default'		=> 'Дата введена неправильно',	
	),
	'spendingId'	=> array(
		'digit' 		=> 'Передані неправильні дані',
		'default'		=> 'Передані неправильні дані',	
	),
);
