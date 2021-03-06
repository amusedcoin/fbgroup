<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MY_Loader extends CI_Loader
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function view($view, $vars = array(), $return = FALSE)
		{
			if(!is_array($vars))
				$vars = array($vars);

			return parent::view($view, get_instance()->common_data( $vars ), $return );
		}
	}
