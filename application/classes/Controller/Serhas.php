<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Controller_Serhas extends Controller_Template {

	public $template = 'template';

	/**
	 *
	 * @var Model_USUARIO
	 */
	protected $_oUser;
	
	protected $_config;
	
	protected $_header_title;
	
	public function before()
	{
		$this->_check_ajax();
		
		parent::before();

		$this->_check_login();
		$this->_check_authentication();
		
		$this->_set_controller_globals();
		$this->_set_view_globals();
		$this->_set_template_blocks();
	}

	protected function _check_ajax()
	{
		if ($this->request->is_ajax())
			$this->auto_render = FALSE;
	}
	
	protected function _check_login()
	{
		$this->_oUser = $oUser = Session::instance()->get('oUser');
		
		if ( ! $oUser)
		{
			$this->redirect('/?r='.$this->request->uri());
		}
	}
	
	protected function _check_authentication()
	{
		// Nothing
	}

	protected function _set_controller_globals()
	{
		$this->_config = Kohana::$config->load('general');
	}
	
	protected function _set_view_globals()
	{
		View::bind_global('site_title', $this->_config->site_title);
		View::bind_global('oUser', $this->_oUser);
		View::set_global('action', $this->request->action());
		View::set_global('welcome', Session::instance()->get('title'));
	}

	protected function _set_template_blocks()
	{
		

		if ($this->auto_render)
		{
			$this->template->bodyClass = NULL;
			
			$this->template->header = View::factory('template/header')
				->bind('header_title', $this->_header_title)
				->set('buttonClass', NULL);
				
			$this->template->navbar = NULL;
			
			$this->template->footer = NULL;
			
			$this->template->styles = View::factory('template/styles')
				->set('styles', array(
					'/media/sbadmin/css/sb-admin.css',
					'/media/serhas/css/serhas.css',
					'/media/tabla_pag/jTPS.css',
					'/media/menu_nexus/css/component.css',
				
					'/media/menu_nexus/css/normalize.css',
					
				));
			
			$this->template->scripts = View::factory('template/scripts')
				->set('scripts', array(
					'media/sbadmin/js/sb-admin.js',
					'media/serhas/js/serhas.js',
					'media/serhas/js/usuper.js',
					'media/serhas/js/jqueryui.js',
					'media/tabla_pag/jTPS.js',
					'media/serhas/js/tabla.js',
					'media/menu_nexus/js/classie.js', 
					'media/menu_nexus/js/gnmenu.js',
					'media/menu_nexus/js/modernizr.custom.js',
				
				));
		}
	}
} // End Controller_Template