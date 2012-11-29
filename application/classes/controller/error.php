<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Error extends Controller 
{
	public function before()
	{
		parent::before();
		
		$this->addCss('/storage/css/main.css');
		$this->addCss('/storage/css/error/error.css');
	}
	
	public function action_404()
	{
		$this->response->body(
			View::factory('index')
			->set('content',
				View::factory('error/error')
				->set('message', __('Сторінку не знайдено'))
			)
			->set('title', __('Мій гаманець - сторінку не знайдено'))
		);
		
		$this->response->status(404);
	}

	public function action_500()
	{
		$this->response->body(
			View::factory('index')
			->set('content',
				View::factory('error/error')
				->set('message', __('Внутрішня помилка'))
			)
			->set('title', __('Мій гаманець - внутрішня помилка'))
		);
		
		$this->response->status(500);
	}	
	
	public function action_503()
	{
		$this->response->body(
			View::factory('index')
			->set('content',
				View::factory('error/error')
				->set('message', __('Сервіс тимчасово недоступний'))
			)
			->set('title', __('Мій гаманець - сервіс тимчасово недоступний'))
		);
		
		$this->response->status(503);
	}	
}