<?php
  require_once('../../SqlServerConnection/connection_sql_server.php');
  require_once('measurement_unit.php');
  /**
   * Ingredient Class
   */
  class Ingredient
  {
    private $id, $description;

    function __construct()
    {
      if (func_num_args() == 0) {
        $this->id = 0;
        $this->description = "";
        $this->mu = new MeasurementUnit();
      }

      if (func_num_args() == 1) {
        $args = func_get_args();
        $connection = new SqlServerConnection();
        $sql = sprintf("SELECT ing_id, ing_description, mu from ingredients WHERE ing_id = %d", $args[0]);
        $query = $connection->execute_query($sql);
        while (odbc_fetch_array($query)) {
          $this->id = odbc_result($query, 'ing_id');
          $this->description = odbc_result($query, 'ing_description');
          $this->mu = odbc_result($query, 'mu');
        }
        $connection->close();
      }

      if (func_num_args() == 3) {
        $args = func_get_args();
        $this->id = $args[0];
        $this->description = $args[1];
        $this->mu = $args[2];
      }
    }

    public function add(){
        $connection = new SqlServerConnection();
        $sql = "INSERT INTO ingredients(ing_id, ing_description, mu) VALUES (?,?,?)";
        $connection->execute_non_query($sql, array($this->id, $this->description, $ths->mu));
        $connection->close();
    }

    public function get_id(){return $this->id;}
    public function set_id($value){$this->id = $value;}

    public function get_description(){return $this->description;}
    public function set_description($value){$this->description = $value; }

    public function get_mu(){return $this->mu;}
    public function set_mu($value){$this->mu = $value;}

    public function to_json(){
      return json_encode(array('id'=>$this->id, 'description'=>$this->description, 'mu'=>$this->mu));
    }

    public function __toString(){
      return self::get_description();
    }
  }
 ?>
