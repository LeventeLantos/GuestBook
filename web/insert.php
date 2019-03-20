<?php
include_once('dbconn.php');



//Insert data to postgres
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $stars = $_POST['stars'];
  // Conditions
  if (!isset($stars)) {
    die('Didnt set the rating');
  }
  if (strlen($title) >= 35) {
    die('It shoudnt be more than 35 characters!');
  }
  if (strlen($body) >= 350) {
    die('It shoudnt be more than 350 characters!');
  }

  $sql = 'INSERT INTO guestbook1(title, body, stars) VALUES(:title, :body, :stars)';
  $statement = $conn->prepare($sql);
  $statement->execute([':title' => $title, ':body' => $body, ':stars' => $stars]);
  header('Location: /index.php', TRUE, 303);
}
