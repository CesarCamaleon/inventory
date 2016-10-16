<?php


class Information
{

	private $id;
	private $description;

	function __construct()
	{
		if(func_num_args() == 0)
		{
			$this->id= "";
			$this->description="";
		}
      	if (func_num_args() == 2) {
        	$args = func_get_args();
        	$this->id=$args[0];
			$this->description=$args[1];
    	}
	}




	public function get_id()
	{
		return $this->id;
	}

	
	public function set_id($newVal)
	{
		$this->id = $newVal;
	}

	public function get_description()
	{
		return $this->description;
	}

	
	public function set_description($newVal)
	{
		$this->description = $newVal;
	}

}
?>