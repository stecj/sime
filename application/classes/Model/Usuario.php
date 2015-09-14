<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Usuario extends ORM {

	protected $_table_name = 'usuario';

	protected $_primary_key = 'id_usuario';

	protected $_oContacto;
	
	protected $_type;
	
	protected $_belongs_to = array(
		'oUsuario_Perfil' => array(
			'model' => 'UsuarioPerfil',
			'foreign_key' => 'id_usu_per',
		),
		'oPerfiles' => array(
			'model' => 'Perfil',
			'foreign_key' => 'id_perfil',
		),
	);
	
	public function oUsuPer()
	{
		return $this->oUsuario_Perfil
			->where('estado_usu_per', '=', 1)
			->find();
	}
	
}