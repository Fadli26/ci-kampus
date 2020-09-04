<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('auto_check_input'))
{
	function auto_check_input($value, $data_from_db)
	{
		return $value == $data_from_db ? 'checked' : NULL;
	}
}
