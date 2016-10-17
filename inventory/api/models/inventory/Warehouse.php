<?php
	require_once('/../../sqlserverconnection/connection_sql_server.php');
	require_once('/../general/Information.php');

	class Warehouse extends Information
	{
		function __construct()
		{
			parent::__construct();
			if(func_num_args() == 0) { }
			else{
				$args = func_get_args();
				if (func_num_args() == 1) {
					$connection = new SqlServerConnection();
					try{
						$args = func_get_args();
						$sql = sprintf("SELECT war_id, war_name FROM warehouses WHERE war_id = '%s'", strval($args[0]));
						$query = $connection->execute_query($sql);
						while(odbc_fetch_array($query)){
							$this->set_id(odbc_result($query, 'war_id'));
							$this->set_description(odbc_result($query, 'war_name'));
						}
					}
					finally{
						$connection->close();
					}
				}
				elseif (func_num_args() == 2) {
					$this->set_id($args[0]);
					$this->set_description($args[1]);
				}
			}
		}

		public function to_json(){
			return json_encode(array('id'=>$this->id, 'description'=>$this->description));
		}
		public function __toString(){
			return self::get_id();
		}
	}
?>
