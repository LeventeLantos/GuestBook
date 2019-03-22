<?php

// Variables to set
$host = 'postgres';
$port = '5432';
$dbname = 'drupal';
$user = 'drupal';
$pass= 'drupal';
// Error messages to catch
$conn_status;
// Setting up connection, in try-catch block to see the error if there's any
try {
  $conn = new PDO('pgsql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname . ';user=' . $user . ';password=' .$pass);
   $conn_status = "Succesfully connected to the database!";
 } catch (PDOException $e) {
   $conn_status = $e->getMessage();
 }
//
//  class Connection {
//    private $host = 'postgres';
//    private $port = '5432';
//    private $dbname = 'drupal';
//    private $user = 'drupal';
//    private $pass= 'drupal';
//
//    public $conn_status;
//
//    public function connect(){
//      $this->conn = null;
//      try {
//        $this->conn = new PDO('pgsql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname . ';user=' . $this->user . ';password=' .$this->pass);
//        $conn_status = "Succesfully connected to the database!";
//      } catch (PDOException $e) {
//        echo $e->getMessage();
//      }
//      return $this->conn;
//    }
//  }
//
// function foo(int $bar): int {
//
// }
