<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Ajax extends Controller {

	//public function action_loadDepa()
	//{
		//$depa = ORM::factory('Departamento')		/*MODEL SEDE*/
//			->find_all();
//
//		foreach($depa as $depa)
//		{
//		echo "<option value=\"$depa->idDepa\">$depa->departamento</option>";
//		}
	//	echo "alalalalal";
	//}
	
	
	
	protected function _build($result, $default = NULL)
	{
		$html = $this->request->query('multiple') ? '' : HTML::default_option($default);
		
		foreach ($result as $key => $val)
		{
			$html .= HTML::tag('option', $val, array('value' => $key));
		}
		return $html;
	}
	
} // End Controller_Template
