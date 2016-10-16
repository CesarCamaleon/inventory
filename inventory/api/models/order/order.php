<?php

require_once('sqlserverconnection/connection_sql_server.php');
require_once('models/dishes/dish.php');

class Order{
  private $id, $date, $subtotal, $dishes;

  public function get_id(){ return $this-id; }
  public function get_date(){ return $this->date; }
  public function set_date($value){ $this->date = new DateTime($value); }
  public function get_subtotal(){ return $this->subtotal; }
  public function set_subtotal($value){ $this->subtotal = $value;}
  public function get_tax_amount(){ return $this->subtotal*0.16; }
  public function get_total() { return $this->get_subtotal() + $this->get_tax_amount(); }
  public function add_dish($dish){ if($dish instanceof Dish) array_push($this->dishes, $dish); }

  public function __construct(){
    switch(func_num_args()){
      default:
        $this->id = -1;
        $this->set_date('0000-00-00');
        $this->subtotal = 0;
        $this->dishes = array();
        break;
      case 4:
        $args = func_get_args();
        break;
    }
  }

}

 ?>
