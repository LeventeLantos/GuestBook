<?php

class Connection {
  private $host = 'postgres';
  private $port = '5432';
  private $dbname = 'drupal';
  private $user = 'drupal';
  private $pass= 'drupal';

  public $conn_status;

  public function connect(){
    $this->conn = null;
    try {
      $this->conn = new PDO('pgsql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname . ';user=' . $this->user . ';password=' .$this->pass);
      $conn_status = "Succesfully connected to the database!";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $this->conn;
  }
}
