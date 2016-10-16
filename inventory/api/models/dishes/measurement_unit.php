<?php
  require_once('../../SqlServerConnection/connection_sql_server.php');
  /**
   * MeasurementUnit class
   */
  class MeasurementUnit
  {
    private $id, $description;
    function __construct()
    {
      if (func_num_args() == 0) {
        $this->id = "";
        $this->description = "";
      }

      if (func_num_args() == 1) {
        $args = func_get_args();
        $connection = new SqlServerConnection();
        $sql = sprintf("SELECT meu_id, meu_description from measurementunits WHERE meu_id = %s", $args[0]);
        $query = $connection->execute_query();
        while (odbc_fetch_array($query)) {
          $this->id = odbc_result($query, 'meu_id');
          $this->description = odbc_result($query, 'meu_description');
        }
        $connection->close();
      }

      if (func_num_args() == 2) {
        $args = func_get_args();
        $this->id = $args[0];
        $this->description = $args[1];
      }
    }

    public function add(){
        $connection = new SqlServerConnection();
        $sql = "INSERT INTO measurementunits(meu_id, meu_description) VALUES (?,?)";
        $connection->execute_non_query($sql, array($this->id, $this->description));
        $connection->close();
    }

    public function get_id(){return $this->id;}
    public function set_id($value){$this->id = $value;}

    public function get_description(){return $this->description;}
    public function set_description($value){$this->description = $value; }

    public function to_json(){
      return json_encode(array('id'=>$this->id, 'description'=>$this->description));
    }

    public function __toString(){
      return self::get_description();
    }
  }
?>
