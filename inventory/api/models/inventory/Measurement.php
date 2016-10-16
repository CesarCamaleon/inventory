<?php
require_once ('models/general/Information.php');

class Measurement extends Information
{

	function __construct()
	{
		parent::__construct();
		if(func_num_args() == 0)
		{

		}
      	if (func_num_args() == 2) {
        	$args = func_get_args();
        	$this->set_id($args[0]);
			$this->set_description($args[1]);
    	}
	}



}
?>
