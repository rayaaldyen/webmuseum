<?php
class Connection {
  public function __construct()
  {
    $this->mysqli = new mysqli('localhost', 'root', '', 'museumclick');
  }

  public function getConnection(){ 
    return $this->mysqli;
  }
}
?>