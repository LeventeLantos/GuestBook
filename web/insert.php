<?php
include_once('dbconn.php');


//Insert data to postgres
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $stars = $_POST['stars'];
  // Conditions
  if ($stars == null) {
    die("<script type='text/javascript'>alert('Set some rating!')</script>");
    header('Location: /view.php', TRUE, 303);
  }
  if (strlen($title) >= 35) {
    die("<script type='text/javascript'>alert('The title exceeded 35 chars!')</script>");
    header('Location: /view.php', TRUE, 303);
  }
  if (strlen($body) >= 350) {
    die("<script type='text/javascript'>alert('The review exceeded 350 chars!')</script>");
    header('Location: /view.php', TRUE, 303);
  }
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
  header('Location: /view.php', TRUE, 303);
}
