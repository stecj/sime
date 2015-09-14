<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Perfil extends ORM {

	protected $_table_name = 'perfil';

	protected $_primary_key = 'id_perfil';

	//protected $_oContacto;
//	
//	protected $_type;
	
	protected $_belongs_to = array(
		'oUsuario_Perfil' => array(
			'model' => 'UsuarioPerfil',
			'foreign_key' => 'id_usu_per',
		),
	);
	
	protected $_has_many = array(
		'aUsuario' => array(
			'model' => 'Usuario',
			'foreign_key' => 'id_usuario',
		),
	);

}