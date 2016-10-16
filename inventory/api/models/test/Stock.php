<?php
require_once ('Warehouse.php');
require_once ('Ingredient.php');

namespace System;



use System;
use System;
/**
 * @author UserAnonymous
 * @version 1.0
 * @created 15-Oct-2016 11:55:20 PM
 */
class Stock
{

	private $quantity;
	public $m_Warehouse;
	public $m_Ingredient;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function get_quantity()
	{
		return $this->quantity;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function set_quantity($newVal)
	{
		$this->quantity = $newVal;
	}

}
?>