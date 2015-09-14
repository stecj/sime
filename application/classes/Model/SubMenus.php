<?php defined('SYSPATH') OR die('No direct script access.');

class Model_SubMenus extends ORM {

	protected $_table_name = 'sub_menu';

	protected $_primary_key = 'id_submenu';

	
	
	protected $_belongs_to = array(
		'oPerfiles_Submenu' => array(
			'model' => 'PerfilesSubmenu',
			'foreign_key' => 'id_PerfilesMenu',
		),
		
	);
	
	protected $_has_many = array(
		'oMenu' => array(
			'model' => 'Menu',
			'foreign_key' => 'id_menu',
		),
	);
	
}