<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template{
	
	public $template = 'welcome/template';

	protected $_oUser;
	protected $_config;
	protected $_error;
	
	public function before()
	{
		$this->_check_ajax();
		
		parent::before();
		
		$this->_set_controller_globals();
		$this->_set_view_globals();
		$this->_set_template_blocks();
	}
	
	public function action_index()
	{
		$this->_check_login();
		
		$sede = ORM::factory('Sede')
			->where('est_sede', '=', 1)
			->find_all()
			->as_array('id_sede', 'ubi_sede');
			
			
		if ($this->request->method() == 'POST')
		{
			$this->_authenticate();
			
			if ($this->_oUser)
			{
				Session::instance()->set('oUser', $this->_oUser);
				
				
				$this->redirect('/dashboard');
			}
		}
		
		$view = View::factory('welcome/login')
		->set(compact('sede'));

		$view->error = $this->_error;

		$this->template->content = $view;

	}
	
	public function action_forgot()
	{
		$this->_check_login();
		
		$message = 'Se le enviará un correo con instrucciones para reestablecer su contraseña';
		
		if ($this->request->method() == 'POST')
		{
			$mail = $this->request->post('email');
			
			$oContacto = ORM::factory('Persona', array(
				'pers_correo' => $mail,
				'pers_tipo' => 'contacto',
			));
			
			if ($oContacto->loaded())
			{
				
				$message = 'Su contraseña fue enviada a su correo';
			}
			else
			{
				$this->_error = 'Correo de contacto no registrado';
			}
		}
		
		$view = View::factory('welcome/forgot')
			->set(compact('message'))
			->set('error', $this->_error);

		$this->template->content = $view;
	}
	
	
	
	/*
	public function action_uniqueUser()
	{
		$val = $this->request->param('id');
		
		$valid = ORM::factory('Acreditado')->unique('acre_usuario', $val);
		
		$response = array(
			'status' => $valid ? 'ok' : 'error',
			'msg' => 'Ese usuario ya existe',
		);
		
		$this->response->body(json_encode($response));
	}
*/	
	public function action_salir()
	{
		Session::instance()->delete('oUser');
		$this->redirect('/');
	}
	
	protected function _check_ajax()
	{
		if ($this->request->is_ajax())
			$this->auto_render = FALSE;
	}
	
	protected function _set_controller_globals()
	{
		$this->_oUser = Session::instance()->get('oUser');
		$this->_config = Kohana::$config->load('general');
	}
	
	protected function _set_view_globals()
	{
		View::bind_global('site_title', $this->_config->site_title);
	}

	protected function _set_template_blocks()
	{
		if ($this->auto_render)
		{
			$this->template->styles = View::factory('welcome/styles');
			$this->template->scripts = View::factory('welcome/scripts');
		}
	}

	protected function _check_login()
	{
		if ($this->_oUser)
		{
			$this->redirect('/dashboard');
		}
	
	}
	
	protected function _authenticate()
	{
		$oUser = ORM::factory('Usuario', array(
			'nick_usuario' => $this->request->post('username'),
			'pass_usuario' => $this->request->post('password'),
			'id_sede_PK' => $this->request->post('sede_local'),
		));

		
		if ($oUser->loaded())
		{
			if ($oUser->estado_usuario== 'activo')
			{
				$this->_oUser = $oUser;
				return;
			}
			
			$this->_error = 'Usuario inactivo';
			return;
		}
		
		$this->_error = 'Usuario o contraseña o localidad incorrectos';
	}
	
	public static function redirect($uri = '', $code = 302)
	{
		if ($redirect = Request::$current->query('r'))
			$uri = $redirect;
		
		parent::redirect($uri, $code);
	}
	
} // End Welcome
