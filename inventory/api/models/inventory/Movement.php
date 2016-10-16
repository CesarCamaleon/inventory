<?php
require_once ('MovementConcept.php');
require_once ('Warehouse.php');
require_once ('Stock.php');


class Movement
{

	private $id;
	private $date;
	private $quantity;
	private $movement_concept;
	private $warehouse;
	private $stock;

	function __construct()
	{
		if(func_num_args() == 0)
		{
			$this->id="";
			$this->date="";
			$this->quantity="";
			$this->movement_concept= new MovementConcept();
			$this->warehouse=new Warehouse();
			$this->stock=new Stock();
		}
      	if (func_num_args() == 6) {
        	$args = func_get_args();
        	$this->id=$args[0];
			$this->date=$args[1];
			$this->quantity=$args[2];
			$this->movement_concept = $args[3];
			$this->warehouse=$args[4];
			$this->stock=$args[5];
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

	public function get_date()
	{
		return $this->date;
	}

	public function set_date($newVal)
	{
		$this->date = $newVal;
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