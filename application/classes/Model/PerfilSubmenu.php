<?php defined('SYSPATH') OR die('No direct script access.');

class Model_PerfilSubmenu extends ORM {

	protected $_table_name = 'perfil_submenu';

	protected $_primary_key = 'id_PerfilMenu';

	//protected $_oContacto;
//	
//	protected $_type;
	
	protected $_belongs_to = array(
		'oMenu' => array(
			'model' => 'Menu',
			'foreign_key' => 'id_menu',
		),
		'oSubmenus' => array(
			'model' => 'SubMenus',
			'foreign_key' => 'id_submenu',
		),
		'oPerfiles' => array(
			'model' => 'Perfil',
			'foreign_key' => 'id_perfil',
		),
	);
	
}