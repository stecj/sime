<?php defined('SYSPATH') OR die('No direct script access.');

class Model_UsuarioPerfil extends ORM {

	protected $_table_name = 'usuario_perfil';

	protected $_primary_key = 'id_usu_per';

	//protected $_oContacto;
	
	//protected $_type;
	
	protected $_belongs_to = array(
		'oUsuario' => array(
			'model' => 'Usuario',
			'foreign_key' => 'id_usuario',
		),
		'oPerfiles' => array(
			'model' => 'Perfil',
			'foreign_key' => 'id_perfil',
		),
	);

}