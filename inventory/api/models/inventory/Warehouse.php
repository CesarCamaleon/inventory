<?php
require_once ('models/general/Information.php');
class Warehouse extends Information
{
	function __construct()
	{
	parent::__construct();
		switch(func_num_args()){
			case 2:
				$args = func_get_args();
				$this->set_id($args[0]);
				$this->set_description($args[1]);
				break;
		}
	}
}
?>
