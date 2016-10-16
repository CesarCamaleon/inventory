<?php
require_once ('Ingredient.php');


class Dish
{

	private $id;
	private $name;
	private $description;
	private $price;
	private $ingredients;

	function __construct()
	{
		if(func_num_args() == 0)
		{
			$this->id="";
			$this->name="";
			$this->description="";
			$this->price="";
			$this->ingredients = array();
		}
      	if (func_num_args() == 5) {
        	$args = func_get_args();
        	$this->id=$args[0];
			$this->name=$args[1];
			$this->description=$args[2];
			$this->price=$args[3];
			$this->ingredients=$args[4];
    	}
	}

	public function get_name()
	{
		return $this->name;
	}

	
	public function set_name($newVal)
	{
		$this->name = $newVal;
	}

	public function get_description()
	{
		return $this->description;
	}

	
	public function set_description($newVal)
	{
		$this->description = $newVal;
	}

	public function get_price()
	{
		return $this->price;
	}

	
	public function set_price($newVal)
	{
		$this->price = $newVal;
	}

	public function get_id()
	{
		return $this->id;
	}

	
	public function set_id($newVal)
	{
		$this->id = $newVal;
	}

}
?>
