<?php
	require_once('/../../sqlserverconnection/connection_sql_server.php');
	require_once ('/../general/Information.php');

	class MovementConcept extends Information
	{
		private $type;
		function __construct()
		{
			parent::__construct();
			if (func_num_args() == 0) {
				$this->type = "";
			}
			else{
				$args = func_get_args();
				if (func_num_args() == 1) {
					$connection = new SqlServerConnection();
					try{
						$sql = sprintf('SELECT mco_id, mco_description, mco_type FROM movementconpects WHERE mco_id = %d', $args[0]);
						$query = $connection->execute_query($sql);
						while (odbc_fetch_array($query)) {
							$this->set_id(odbc_result($query, 'mco_id'));
							$this->set_description(odbc_result($query, 'mco_description'));
							$this->type = odbc_result($query, 'mco_type');
						}
					}
					finally{
						$connection->close();
					}
				}
				elseif (func_num_args() == 3) {
					$this->set_id($args[0]);
					$this->set_description($args[1]);
					$this->type = $args[2];
				}
			}
		}

		public function get_type(){return $this->type;}
		public function set_type($newVal){$this->type = $newVal;}

		public function to_json(){
			return json_encode(array('id'=>$this->id, 'description'=>$this->description, 'type'=>$this->type));
		}

		public function __toString(){
			return self::get_description();
		}
	}
?>
