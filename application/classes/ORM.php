<?php defined('SYSPATH') OR die('No direct script access.');

class ORM extends Kohana_ORM {
	
	//public $estado = array(
//		'activo' => 'Activo',
//		'eliminado' => 'Eliminado',
//	);
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
	
}
