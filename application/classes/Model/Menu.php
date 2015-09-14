<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Menu extends ORM {

	protected $_table_name = 'menu';

	protected $_primary_key = 'id_menu';

	
	
	protected $_belongs_to = array(
		'oPerfil_Submenu' => array(
			'model' => 'Perfil_Submenu',
			'foreign_key' => 'id_PerfilesMenu',
		),
		'oSub_Menus' => array(
			'model' => 'SubMenus',
			'foreign_key' => 'id_submenu',
		),
	);
	
	protected $_has_many = array(
		
	);
	
}