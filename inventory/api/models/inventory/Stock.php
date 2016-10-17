<?php
	require_once('/../../sqlserverconnection/connection_sql_server.php');
	require_once('Warehouse.php');
	require_once('Ingredient.php');

	class Stock
	{
		private $id;
		private $ingredient;
		private $warehouse;
		private $quantity;

		function __construct()
		{
			if (func_num_args() == 0) {
				$this->id = 0;
				$this->ingredient = new Ingredient();
				$this->warehouse = new Warehouse();
				$this->quantity = 0;
			}
			else{
				$args = func_get_args();
				if (func_num_args() == 1) {
					$connection = new SqlServerConnection();
					$sql = sprintf('SELECT sto_id, sto_id_ing, war_id, sto_quantity FROM stock WHERE sto_id = %d', $args[0]);
					$query = $connection->execute_query($sql);
					while (odbc_fetch_array($query)) {
						$this->id = odbc_result($query, 'sto_id');
						$this->ingredient = odbc_result($query, 'sto_id_ing');
						$this->warehouse = odbc_result($query, 'war_id');
						$this->quantity = odbc_result($query, 'sto_quantity');
					}
					$connection->close();
				}
				elseif (func_num_args() == 4) {
					$this->id = $args[0];
					$this->ingredient = $args[1];
					$this->warehouse = $args[2];
					$this->quantity = $args[3];
				}
			}
		}

		public function get_id(){return $this->id;}
		public function set_id($newVal)	{	$this->id = $newVal;}

		public function get_ingredient(){return $this->ingredient;}
		public function set_ingredient($newVal)	{	$this->ingredient = $newVal;}

		public function get_warehouse(){return $this->warehouse;}
		public function set_warehouse($newVal)	{	$this->warehouse = $newVal;}

		public function get_quantity(){return $this->quantity;}
		public function set_quantity($newVal)	{	$this->quantity = $newVal;}

		public function to_json(){
			return json_encode(array('ingredient'=>$this->ingredient, 'warehouse'=>$this->warehouse, 'quantity'=>$this->quantity));
		}
	}
?>
