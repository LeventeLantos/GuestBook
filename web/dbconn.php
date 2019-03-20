<?php

//Variables to set
$host = 'postgres';
$port = '5432';
$dbname = 'drupal';
$user = 'drupal';
$pass= 'drupal';
//Error messages to catch
$conn_status;
// Setting up connection, in try-catch block to see the error if there's any
try {
  $conn = new PDO('pgsql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname . ';user=' . $user . ';password=' .$pass);
  $conn_status = "Succesfully connected to the database!";
} catch (PDOException $e) {
  $conn_status = $e->getMessage();
}
