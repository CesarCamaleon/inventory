<?php
	require_once('/../../sqlserverconnection/connection_sql_server.php');
	require_once('MovementConcept.php');
	require_once('Warehouse.php');
	require_once('Stock.php');

	class Movement
	{
		private $id;
		private $date;
		private $quantity;
		private $warehouse;
		private $stock;
		private $movement_concept;

		function __construct()
		{
			if (func_num_args() == 0) {
				$this->id = 0;
				$this->date = new DateTime();
				$this->quantity = 0;
				$this->warehouse = new Warehouse();
				$this->stock = new Stock();
				$this->movement_concept = new MovementConcept();
			}
			else{
				$args = func_get_args();
				if (func_num_args() == 1) {
					$connection = new SqlServerConnection();
					$sql = sprintf('SELECT mov_id, mov_date, mov_quantity, mov_id_warehouse, mov_id_stock_ingredient,
						mov_concept FROM movements WHERE mov_id = %d', $args[0]);
					$query = $connection->execute_query($sql);
					while (odbc_fetch_array($query)) {
						$this->id = odbc_result($query, 'mov_id');
						$this->date = odbc_result($query, 'mov_date');
						$this->quantity = odbc_result($query, 'mov_quantity');
						$this->warehouse = odbc_result($query, 'mov_id_warehouse');
						$this->stock = odbc_result($query, 'mov_id_stock_ingredient');
						$this->movement_concept = odbc_result($query, 'mov_concept');
					}
					$connection->close();
				}
				elseif (func_num_args() == 6) {
					$this->id = $args[0];
					$this->date = $args[1];
					$this->quantity = $args[2];
					$this->warehouse = $args[3];
					$this->stock = $args[4];
					$this->movement_concept = $args[5];
				}
			}
		}

		public function get_id(){return $this->id;}
		public function set_id($newVal){$this->id = $newVal;}

		public function get_date(){return $this->date;}
		public function set_date($newVal){$this->date = $newVal;}

		public function get_quantity(){return $this->quantity;}
		public function set_quantity($newVal){$this->quantity = $newVal;}

		public function get_movement_concept(){return $this->movement_concept;}
		public function set_movement_concept($newVal){$this->movement_concept = $newVal;}

		public function get_warehouse(){return $this->warehouse;}
		public function set_warehouse($newVal){$this->warehouse = $newVal;}

		public function get_stock(){return $this->stock;}
		public function set_stock($newVal){$this->stock = $newVal;}

		public function to_json(){
			return json_encode(array('id'=>$this->id, 'date'=>$this->date, 'quantity'=>$this->quantity,
			'warehouse'=>$this->warehouse, 'stock'=>$this->stock, 'movement_concept'=>$this->movement_concept));
		}

		public function get_all_movements(){
			$list = array();
			$connection = new SqlServerConnection();
			$sql = 'SELECT mov_id, mov_date, mov_quantity, mov_id_warehouse, mov_id_stock_ingredient, mov_concept FROM movements';
			$query = $connection->execute_query($sql);
			while (odbc_fetch_array($query)) {
				$id = odbc_result($query, 'mov_id');
				$date = odbc_result($query, 'mov_date');
				$quantity = odbc_result($query, 'mov_quantity');
				$warehouse = odbc_result($query, 'mov_id_warehouse');
				$stock = odbc_result($query, 'mov_id_stock_ingredient');
				$movement_concept = odbc_result($query, 'mov_concept');
				array_push($list, new Movement($id, $date, $quantity, $warehouse, $stock, $movement_concept));
			}
			$connection->close();
			return $list;
		}

		public function __toString(){
			return self::get_id();
		}
	}
?>
