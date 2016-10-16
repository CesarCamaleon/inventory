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
		switch(func_num_args()){
			case 0:
				$this->quantity=0;
				$this->warehouse=new Warehouse();
				$this->ingredient=new Ingredient();
				break;
			case 3:
				$args = func_get_args();
				$this->quantity=$args[0];
				$this->warehouse=$args[1];
				$this->ingredient=$args[2];
				break;
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
