<?php
require_once ('Warehouse.php');
require_once ('Ingredient.php');


class Stock
{

	private $quantity;
	private $warehouse;
	private $ingredient;

	function __construct()
	{
		if(func_num_args() == 0)
		{
			$this->quantity="";
			$this->warehouse=new Warehouse();
			$this->ingredient=new Ingredient();
		}
      	if (func_num_args() == 3) {
        	$args = func_get_args();
        	$this->quantity=$args[0];
			$this->warehouse=$args[1];
			$this->ingredient=$args[2];
    	}
	}


	public function get_quantity()
	{
		return $this->quantity;
	}

	
	public function set_quantity($newVal)
	{
		$this->quantity = $newVal;
	}

}
?>