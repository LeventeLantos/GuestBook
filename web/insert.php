<?php
include_once('dbconn.php');


//Insert data to postgres
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $stars = $_POST['stars'];
  // Conditions
  // if (!isset($stars)) {
  //   die('Didnt set the rating');
  // }
  // if (strlen($title) >= 35) {
  //   die('It shoudnt be more than 35 characters!');
  // }
  // if (strlen($body) >= 350) {
  //   die('It shoudnt be more than 350 characters!');
  // }
  // Emoji support part
  $body = str_replace(':smile:','<img src="assets/emojis/smile.png" alt="Smile face emoji" height="15px" width="15px">', $body);
  $body = str_replace(':joy:','<img src="assets/emojis/joy.png" alt="Joy face emoji" height="15px" width="15px">', $body);
  $body = str_replace(':heart:','<img src="assets/emojis/heart.jpg" alt="Heart emoji" height="15px" width="15px">', $body);
  $body = str_replace(':sunglasses:','<img src="assets/emojis/sunglasses.png" alt="Emoji with sunglasses" height="15px" width="15px">', $body);
  $body = str_replace(':wink:','<img src="assets/emojis/wink.png" alt="Wink face emoji" height="15px" width="15px">', $body);

  $title = str_replace(':smile:','<img src="assets/emojis/smile.png" alt="Smile face emoji" height="15px" width="15px">', $title);
  $title = str_replace(':joy:','<img src="assets/emojis/joy.png" alt="Joy face emoji" height="15px" width="15px">', $title);
  $title = str_replace(':heart:','<img src="assets/emojis/heart.jpg" alt="Heart emoji" height="15px" width="15px">', $title);
  $title = str_replace(':sunglasses:','<img src="assets/emojis/sunglasses.png" alt="Emoji with sunglasses" height="15px" width="15px">', $title);
  $title = str_replace(':wink:','<img src="assets/emojis/wink.png" alt="Wink face emoji" height="15px" width="15px">', $title);

  $sql = 'INSERT INTO guestbook1(title, body, stars) VALUES(:title, :body, :stars)';
  $statement = $conn->prepare($sql);
  $statement->execute([':title' => $title, ':body' => $body, ':stars' => $stars]);
  header('Location: /index.php', TRUE, 303);
}
