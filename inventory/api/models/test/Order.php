<?php
require_once ('Dish.php');

namespace System;



use System;
/**
 * @author UserAnonymous
 * @version 1.0
 * @created 15-Oct-2016 11:55:20 PM
 */
class Order
{

	private $id;
	private $date;
	private $subtotal;
	private $tax_amount;
	private $total;
	public $m_Dish;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function get_id()
	{
		return $this->id;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function set_id($newVal)
	{
		$this->id = $newVal;
	}

	public function get_date()
	{
		return $this->date;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function set_date($newVal)
	{
		$this->date = $newVal;
	}

	public function get_subtotal()
	{
		return $this->subtotal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function set_subtotal($newVal)
	{
		$this->subtotal = $newVal;
	}

	public function get_tax_amount()
	{
		return $this->tax_amount;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function set_tax_amount($newVal)
	{
		$this->tax_amount = $newVal;
	}

	public function get_total()
	{
		return $this->total;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function set_total($newVal)
	{
		$this->total = $newVal;
	}

}
?>