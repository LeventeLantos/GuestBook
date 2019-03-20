<?php
include_once('dbconn.php');

//Insert data to postgres
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $stars = $_POST['stars'];
  // Conditions to do!!!!!
  if (strlen($title) >= 35) {
    die('It should be not more than 35 character!');
  }
  if (strlen($body) >= 350) {
    die('It should be not more than 350 character!');
  }

  $sql = 'INSERT INTO guestbook(title, body, stars) VALUES(:title, :body, :stars)';
  $statement = $conn->prepare($sql);
  $statement->execute([':title' => $title, ':body' => $body, ':stars' => $stars]);
  header('Location: /index.php', TRUE, 303);
}
