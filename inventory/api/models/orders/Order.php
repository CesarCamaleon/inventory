<?php
require_once ('Dish.php');


class Order
{

	private $id;
	private $date;
	private $subtotal;
	private $dishes;

	function __construct()
	{
		switch(func_num_args())
		{
			case 0:
				$this->id=-1;
				$this->date=new DateTime("0000-00-00");
				$this->subtotal=0;
				$this->dishes = array();
				break;
			case 4:
				$args = func_get_args();
				$this->id=$args[0];
				$this->date=$args[1];
				$this->subtotal=$args[2];
				$this->dishes=$args[3];
				break;
		}
	}
	public function get_id(){return $this->id;}
	public function set_id($newVal){$this->id = $newVal;}
	public function get_date(){return $this->date;}
	public function set_date($newVal){$this->date = $newVal;}
	public function get_subtotal(){return $this->subtotal;}
	public function set_subtotal($newVal){$this->subtotal = $newVal;}
	public function get_tax_amount(){return $this->tax_amount;}
	public function set_tax_amount($newVal){$this->tax_amount = $newVal;}
	public function get_total(){return $this->total;}
	public function set_total($newVal){$this->total = $newVal;}
}
?>
