<?php
require_once ('Information.php');


class Warehouse extends Information
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