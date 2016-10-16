<?php
require_once ('models/general/Information.php');
require_once ('Measurement.php');

class Ingredient extends Information
{
	private $measurement;
	function __construct()
	{
		parent::__construct();
		switch(func_num_args()){
			case 0:
				$this->measurement= new Measurement();
				break;
			case 3:
      	$args = func_get_args();
      	$this->set_id($args[0]);
				$this->set_description($args[1]);
				$this->measurement= $args[2];
				break;
		}
	}
	public function get_measurement(){return $this->measurement;}
	public function set_measurement($newValue){$this->measurement = $newValue;}
}
?>
