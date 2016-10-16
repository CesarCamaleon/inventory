<?php
  require_once('../../SqlServerConnection/connection_sql_server.php');
  require_once('ingredient.php');
  require_once('dish.php');
  /**
   * DishIngredient class
   */
  class DishIngredient
  {
    private $ingredient, $dish, $quantity;

    function __construct()
    {
      if (func_num_args() == 0) {
        $this->ingredient = new Ingredient();
        $this->dish = new Dish();
        $this->quantity = 0;
      }

      if (func_num_args() == 3) {
        $args = func_get_args();
        $this->ingredient = $args[0];
        $this->dish = $args[1];
        $this->quantity = $args[2];
      }
    }

    public function get_ingredient(){return $this->ingredient;}
    public function set_ingredient($value){$this->ingredient = $value;}

    public function get_dish(){return $this->dish;}
    public function set_dish($value){$this->dish = $value;}

    public function get_quantity(){return $this->quantity;}
    public function set_quantity($value){$this->quantity = $value;}

    public function get_all_dish_ingredients(){
      $list = array();
      $connection = new SqlServerConnection();
      $sql = "SELECT ing_id, dis_id, dis_ing_quantity from dish_ingredients";
      $query = $connection->execute_query();
      while (odbc_fetch_array($query)) {
        $ingredient = odbc_result($query, 'ing_id');
        $dish = odbc_result($query, 'dis_id');
        $quantity = odbc_result($query, 'dis_ing_quantity');
        array_push($list, new DishIngredient(new Ingredient($ingredient), new Dish($dish), $quantity));
      }
      $connection->close();
    }

    public function add(){
        $connection = new SqlServerConnection();
        $sql = "INSERT INTO dish_ingredients(ing_id, dis_id, dis_ing_quantity) VALUES (?,?,?)";
        $connection->execute_non_query($sql, array($this->ingredient, $this->dish, $this->quantity));
        $connection->close();
    }

    public function to_json(){
      return json_encode(array('ingredient'=>$this->ingredient, 'dish'=>$this->dish, 'quantity'=>$this->quantity));
    }

    public function __toString(){
      return __CLASS__;
    }
  }
 ?>
