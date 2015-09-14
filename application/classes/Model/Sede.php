<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Sede extends ORM {

	protected $_table_name = 'sede';

	protected $_primary_key = 'id_sede';

	protected $_oContacto;
	
	protected $_type;
	
	protected $_belongs_to = array(
		'oUsuario' => array(
			'model' => 'Usuario',
			'foreign_key' => 'id_usuario',
		),
		
	);
	
}