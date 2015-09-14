<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Catalogo extends ORM {

	protected $_table_name = 'catalogo';

	protected $_primary_key = 'cod_catalogo';

	
	
	protected $_belongs_to = array(
		'oSubCatalogo' => array(
			'model' => 'SubCatalogo',
			'foreign_key' => 'cod_subcatalogo',
		),
	);
	

	
}