<?php
require_once('/../../sqlserverconnection/connection_sql_server.php');
require_once ('/../general/Information.php');
require_once ('Measurement.php');

class Ingredient extends Information
{
	private $measurement;
	function __construct()
	{
		parent::__construct();
		if (func_num_args() == 0) {
			$this->measurement= new Measurement();
		}
		else{
			$args = func_get_args();
			if (func_num_args() == 1) {
				$connection = new SqlServerConnection();
				$sql = sprintf("SELECT ing_id, ing_description, mu from ingredients WHERE ing_id = %d", $args[0]);
				$query = $connection->execute_query($sql);
				while (odbc_fetch_array($query)) {
					$this->set_id(odbc_result($query, 'ing_id'));
					$this->set_description(odbc_result($query, 'ing_description'));
					$this->measurement = odbc_result($query, 'mu');
				}
				$connection->close();
			}
			elseif (func_num_args() == 3) {
				$this->set_id($args[0]);
				$this->set_description($args[1]);
				$this->measurement= $args[2];
			}
		}
	}
	public function get_measurement(){return $this->measurement;}
	public function set_measurement($newValue){$this->measurement = $newValue;}

	public function to_json(){
		return json_encode(array('id'=>$this->id, 'description'=>$this->description));
	}

	public function __toString(){
		return self::get_description();
	}
}
?>
