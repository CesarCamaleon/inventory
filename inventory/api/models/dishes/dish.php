<?php
  require_once('../../SqlServerConnection/connection_sql_server.php');
  /**
   * Dish class
   */
  class Dish
  {
    private $id, $name, $description, $price;

    function __construct()
    {
      if (func_num_args() == 0) {
        $this->id = "";
        $this->name = "";
        $this->description = "";
        $this->price = 0;
      }

      if (func_num_args() == 1) {
        $args = func_get_args();
        $connection = new SqlServerConnection();
        $sql = sprintf("SELECT dis_id, dis_name, dis_description, dis_price from dishes WHERE dis_id = $d", $args[0]);
        $query = $connection->execute_query();
        while (odbc_fetch_array()) {
          $this->id = odbc_result($query, 'dis_id');
          $this->description = odbc_result($query, 'dis_description');
          $this->name = odbc_result($query, 'dis_name');
          $this->price = odbc_result($query, 'dis_price');
        }
        $connection->close();
      }

      if (func_num_args() == 4) {
        $args = func_get_args();
        $this->id = $args[0];
        $this->name = $args[1];
        $this->description = $args[2];
        $this->price = $args[3];
      }
    }

    public function add(){
        $connection = new SqlServerConnection();
        $sql = "INSERT INTO dishes(dis_id, dis_name, dis_description, dis_price) VALUES (?,?,?,?)";
        $connection->execute_non_query($sql, array($this->id, $this->name, $this->description, $ths->price));
        $connection->close();
    }

    public function get_id(){return $this->id;}
    public function set_id($value){$this->id = $value;}

    public function get_name(){return $this->name;}
    public function set_name($value){$this->name = $value; }

    public function get_description(){return $this->description;}
    public function set_description($value){$this->description = $value; }

    public function get_price(){return $this->price;}
    public function set_price($value){$this->price = $value; }

    public function to_json(){
      return json_encode(array('id'=>$this->id, 'description'=>$this->description, 'price'=>$this->price));
    }

    public function __toString(){
      return self::get_name();
    }
  }
?>
