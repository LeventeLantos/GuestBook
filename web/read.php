<?php
  $sql = 'SELECT * FROM guestbook1 WHERE allowed IS true ORDER BY id DESC';
  $statement = $conn->prepare($sql);
  $statement->execute();
  $test01 = $statement->fetchAll(PDO::FETCH_OBJ);

    foreach($test01 as $review):
      echo '<h3> <b>  ' . $review->title . ' </b><div class="dpstars">';
      $numberOfStars = $review->stars;
      for ($i=0; $i < $numberOfStars; $i++) {
        echo '<label class="dpstara" >★</label>';
      }
      for ($i=0; $i < (5 - $numberOfStars); $i++) {
        echo '<label class="dpstar" >☆</label>';
      }
       echo '</div></h3><div><p> <i>,,' . $review->body . '"</i></p></div>';
    endforeach;
