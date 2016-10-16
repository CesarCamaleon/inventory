<?php
require_once ('models/general/Information.php');
require_once ('Measurement.php');


class Ingredient extends Information
{

	private $measurement;

	function __construct()
	{
		parent::__construct();
		if(func_num_args() == 0)
		{
			$this->measurement= new Measurement();
		}
      	if (func_num_args() == 3) {
        	$args = func_get_args();
        	$this->set_id($args[0]);
			$this->set_description($args[1]);
			$this->measurement= $args[2];
    	}
	}


}
?>
