<?php defined('SYSPATH') OR die('No direct script access.');

define('BR', PHP_EOL);
define('TT', "\t");

class Controller_Scaffold extends Controller {

	protected $_info;
	
	protected $_table;
	
	protected $_primary;
	
	protected $_foreigns = array();
	
	public function action_orm()
	{
		if ( ! $table = $this->request->param('id'))
			die('You must specify a table');
		
		$this->_get_info($table);
		$this->_set_properties();
		$html = $this->_create();
		
		$this->response->headers('Content-Type', 'text/plain');
		$this->response->body($html);
	}

	public function action_create()
	{
		$tables = Database::instance()->list_tables();
		//debug($tables);
		
		$full_html = '';
		foreach ($tables as $table)
		{
			$this->_get_info($table);
			$this->_set_properties();
			$html = $this->_create();
			$full_html .= $html;
			
			$filename = APPPATH.'classes/Model/'.$this->_camelize($table).EXT;
			//debug($filename);
			
			if (file_exists($filename))
			{
				rename($filename, $filename.'.bak');
			}
			
			file_put_contents($filename, $html);
		}
		
		$this->response->headers('Content-Type', 'text/plain');
		$this->response->body($full_html);
	}
	
	protected function _create()
	{
		$alias = ucfirst(Inflector::camelize($this->_table));
		
		$belongs = $this->_build_belongs(1);
		
		$html = '<?php defined(\'SYSPATH\') OR die(\'No direct script access.\');'.BR.BR;
		$html .= "class Model_$alias extends ORM {".BR.BR;
		$html .= TT . "protected \$_table_name = '$this->_table';".BR.BR;
		$html .= TT . "protected \$_primary_key = '$this->_primary';".BR.BR;
		$html .= $belongs.BR;
		$html .= '}'.BR;
		
		return $html;
	}

	protected function _build_belongs($number = 0)
	{
		// Initial tabs
		$tabs = str_repeat(TT, $number);
		$prefix = 'o';
		
		// Export array
		$belongs = array();
		foreach ($this->_foreigns as $db_column => $foreign)
		{
			$alias = $this->_camelize($foreign['table']);
			$belongs[$prefix.$alias] = array(
				'model' => $alias,
				'foreign_key' => $db_column,
			);
		}
		
		ob_start();
		var_export($belongs);
		$html = ob_get_clean();
		
		// Add return
		$html = 'protected $_belongs_to = '.$html;
		// 'array (' to 'array('
		$html = preg_replace('/array \(/', 'array(', $html);
		
		// Remove EOL from subarray start
		$html = preg_replace('/=> \n  /', '=> ', $html);
		
		// Replace ' ' with \t
		$html = preg_replace('/  /', TT, $html);
		
		// Add initial tabs
		$html = preg_replace('/^(.*)$/m', $tabs.'$1', $html);
		
		return $html . ';';
		//echo '<pre>'.$html;
		//die();
	}

	protected function _get_info($table)
	{
		$this->_info = DB::query(Database::SELECT, 'SHOW CREATE TABLE ' . $table)->execute()->current();
		//debug($this->_info);
	}
	
	protected function _set_properties()
	{
		$result = $this->_info;
		
		$this->_table = $result['Table'];
		
		$lines = explode("\n", $result['Create Table']);
		
		$this->_set_primary($lines);
		
		$this->_set_foreigns($lines);
	}
	
	protected function _set_primary($lines)
	{
		//debug($lines);
		$primary = FALSE;
		foreach ($lines as $line)
		{
			$line = trim($line);
			
			preg_match('/PRIMARY KEY \(`(\w*)`\)/', $line, $matches);
			if ($matches)
			{
				$primary = $matches[1];
			}
		}
		
		if ( ! $primary)
			throw new Kohana_Exception('Primary Key not found or Composite Key not supported');
		
		$this->_primary = $primary;
	}
	
	protected function _set_foreigns($lines)
	{
		$foreign_keys = array();
		foreach ($lines as $line)
		{
			$line = trim($line);
			
			preg_match('/FOREIGN KEY \(`(\w*)`\) REFERENCES `(\w*)` \(`(\w*)`\)/', $line, $matches);
			if ($matches)
			{
				$foreign_keys[$matches[1]] = array('table' => $matches[2], 'pk' => $matches[3],);
			}
		}
		//debug($foreign_keys);
		
		$this->_foreigns = $foreign_keys;
	}

	protected function _camelize($str)
	{
		return ucfirst(Inflector::camelize($str));
	}
	
}
