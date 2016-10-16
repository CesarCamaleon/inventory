<?php


namespace System;


/**
 * @author UserAnonymous
 * @version 1.0
 * @created 15-Oct-2016 11:54:40 PM
 */
class Information
{

	private $id;
	private $description;

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

}
?>