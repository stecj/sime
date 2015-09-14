<?php defined('SYSPATH') or die('No direct script access.');

class HTML extends Kohana_HTML {
	
	public static $strict = FALSE;
	
	public static function tag($type, $title, array $attributes = NULL)
	{
		//if ( ! empty($attributes)) $attributes = array_filter($attributes);
		
		return '<'.$type.HTML::attributes($attributes).'>'.$title.'</'.$type.'>';
	}
	
	/*public static function option($title, $value)
	{
		return HTML::tag('option', $title, array('value' => $value));
	}*/
	
	public static function default_option($title = NULL)
	{
		if ($title === NULL)
		{
			$title = 'Seleccione';
		}
		
		return HTML::tag('option', __($title), array(
			'value' => '',
			//'selected',
			//'disabled',
		));
	}
}
