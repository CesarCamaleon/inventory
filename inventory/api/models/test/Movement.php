<?php
require_once ('MovementConcept.php');
require_once ('Warehouse.php');
require_once ('Stock.php');

namespace System;



use System;
use System;
use System;
/**
 * @author UserAnonymous
 * @version 1.0
 * @created 15-Oct-2016 11:55:20 PM
 */
class Movement
{

	private $id;
	private $date;
	private $quantity;
	public $m_MovementConcept;
	public $m_Warehouse;
	public $m_Stock;

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

}
?>