<?php include_once('dbconn.php'); ?>
<?php include_once('insert.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Guestbook</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
     $( "#accordion" ).accordion({
       collapsible: true
     });
   } );
  </script>
  <link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
  <div class="container-fluid size">
    <div class="container h-100 guestbook">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-7 mx-auto col1">
        <div class="container overflow-auto display" id="accordion">
          <?php
            $sql = 'SELECT * FROM guestbook ORDER BY review_id DESC';
            $statement = $conn->prepare($sql);
            $statement->execute();
            $test01 = $statement->fetchAll(PDO::FETCH_OBJ);
            ?>
            <?php
              //Iterating trough the db
             foreach($test01 as $review): ?>
                <!-- <p>Stars:   </p><br> -->
                <h3> <b>  <?= $review->title; ?></b><div class="dpstars">
                <?php
                //Shorter form to output the stars
                $numberOfStars = $review->stars;
                for ($i=0; $i < $numberOfStars; $i++) {
                  echo '<label class="dpstara" >★</label>';
                }
                for ($i=0; $i < (5 - $numberOfStars); $i++) {
                  echo '<label class="dpstar" >☆</label>';
                }
                 ?></div></h3>
                <div>
                  <p> <i>,,<?= $review->body; ?>"</i></p>
                </div>
            <?php endforeach; ?>
        </div>

      </div>


      <div class="col mx-auto col1">
           <form action="insert.php" method="post">
             <div class="container inputs">

               <div class="rating">
                <input id="star5" name="stars" type="radio" value="5" class="radio-btn hide" />
                <label for="star5" >☆</label>
                <input id="star4" name="stars" type="radio" value="4" class="radio-btn hide" />
                <label for="star4" >☆</label>
                <input id="star3" name="stars" type="radio" value="3" class="radio-btn hide" />
                <label for="star3" >☆</label>
                <input id="star2" name="stars" type="radio" value="2" class="radio-btn hide" />
                <label for="star2" >☆</label>
                <input id="star1" name="stars" type="radio" value="1" class="radio-btn hide" />
                <label for="star1" >☆</label>
                <div class="clear"></div>
                </div>

               <input type="text" name="title" required="required" maxlength="35" placeholder="Title..."/><br/>
               <textarea class="review_input" type="text" name="body" maxlength="350" required="required" placeholder="Review..."></textarea><br />
             </div>

             <input class="btn btn-outline-dark btn-lg btn-block submitbutton" type="submit" value=" Submit " name="submit"/><br />
           </form>
      </div>
    </div>
    </div>
</div>
</body>
</html>
