<?php
require_once ('Dish.php');


class Order
{

	private $id;
	private $date;
	private $subtotal;
	private $tax_amount;
	private $total;
	private $dish;

	function __construct()
	{
		if(func_num_args() == 0)
		{
			$this->id="";
			$this->date="";
			$this->subtotal="";
			$this->tax_amount= "";
			$this->total="";
			$this->dish = array();
		}
      	if (func_num_args() == 6) {
        	$args = func_get_args();
        	$this->id=$args[0];
			$this->date=$args[1];
			$this->subtotal=$args[2];
			$this->tax_amount= $args[3];
			$this->total=$args[4];
			$this->dish=$args[5];
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

	public function get_date()
	{
		return $this->date;
	}

	
	public function set_date($newVal)
	{
		$this->date = $newVal;
	}

	public function get_subtotal()
	{
		return $this->subtotal;
	}

	
	public function set_subtotal($newVal)
	{
		$this->subtotal = $newVal;
	}

	public function get_tax_amount()
	{
		return $this->tax_amount;
	}

	
	public function set_tax_amount($newVal)
	{
		$this->tax_amount = $newVal;
	}

	public function get_total()
	{
		return $this->total;
	}

	
	public function set_total($newVal)
	{
		$this->total = $newVal;
	}

}
?>