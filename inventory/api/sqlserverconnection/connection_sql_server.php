<?php
  /**
   * SqlServerConnection class
   */
  class SqlServerConnection
  {
    private $connection;
    private $connection_string = 'DRIVER={SQL Server};SERVER=USER;DATABASE=inventory';
    private $user = 'sa';
    private $password = 'usersql';
    function __construct(){
      $this->connection = odbc_connect($this->connection_string, $this->user, $this->password);
    }
    public function close(){ odbc_close($this->connection); }
    public function execute_query($sql){
        if (($data = odbc_exec($this->connection, $sql)) === false) {
          return die('Error '. odbc_errormsg($this->connection));
        }
        return $data;
    }
    public function execute_non_query(){
      $args = func_get_args();
      $sql = $args[0];
      $parameters = $args[1];
      $prepare = odbc_prepare($this->connection, $sql);
      if ($prepare === false) {
        return die('Error '. odbc_errormsg($this->connection));
      }
      odbc_execute($prepare, $parameters);
    }
  }
?>
