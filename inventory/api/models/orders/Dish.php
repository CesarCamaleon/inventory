<?php
require_once ('models/inventory/Ingredient.php');


class Dish
{
	private $id;
	private $name;
	private $description;
	private $price;
	private $ingredients;

	function __construct()
	{
		switch(func_num_args()){
			case 0:
				$this->id=-1;
				$this->name="";
				$this->description="";
				$this->price=0;
				$this->ingredients = array();
				break;
			case 5:
				$args = func_get_args();
				$this->id=$args[0];
				$this->name=$args[1];
				$this->description=$args[2];
				$this->price=$args[3];
				$this->ingredients=$args[4];
				break;
		}
	}
	public function get_id(){return $this->id;}
	public function set_id($newVal){$this->id = $newVal;}
	public function get_name(){return $this->name;}
	public function set_name($newVal){$this->name = $newVal;}
	public function get_description(){return $this->description;}
	public function set_description($newVal){$this->description = $newVal;}
	public function get_price(){return $this->price;}
	public function set_price($newVal){$this->price = $newVal;}
	public function get_insgredients(){return $this->ingredients;}
	public function set_ingredients($newValue){$this->ingredients = $newValue;}
	public function add_ingredient($ingredient){ if($ingredient instanceof Ingredient) array_push($this->ingredients, $ingredient); }
	public function remove_ingredient($ingredient){
		if($ingredient instanceof Ingredient){
			$removed = false;
			$count = -1;
			$toRemove = $count;
			foreach ($this->ingredients as $ing) {
				$count++;
				if(!$removed){
					if($ing->get_id() == $ingredient->get_id()){
						$toRemove = $count;
						$removed = true;
					}
				}
			}
			if($toRemove>-1)
				unset($this->ingredients[$toRemove]);
			return $removed;
		}
		else {
			return false;
		}
	}
}
?>
