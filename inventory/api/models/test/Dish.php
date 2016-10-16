<?php
require_once ('Ingredient.php');

namespace System;



use System;
/**
 * @author UserAnonymous
 * @version 1.0
 * @created 15-Oct-2016 11:55:19 PM
 */
class Dish
{

	private $id;
	private $name;
	private $description;
	private $price;
	private $ingredients;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function get_name()
	{
		return $this->name;
	}

	/**
	 *
	 * @param newVal
	 */
	public function set_name($newVal)
	{
		$this->name = $newVal;
	}

	public function get_description()
	{
		return $this->description;
	}

	/**
	 *
	 * @param newVal
	 */
	public function set_description($newVal)
	{
		$this->description = $newVal;
	}

	public function get_price()
	{
		return $this->price;
	}

	/**
	 *
	 * @param newVal
	 */
	public function set_price($newVal)
	{
		$this->price = $newVal;
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
