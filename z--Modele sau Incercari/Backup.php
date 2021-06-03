<?php
 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

  include "../Php/api/getGameInfo.php";
  include "../Php/api/getComments.php";
  ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href = "../Css/GameScrapePage.css" rel ="stylesheet">

        
        <meta name = "author" content = "Zaharia Andrei-Lucian && Urma Tudor-Irinel" >
        <!-- It will show in the search engine the Author name.-->
        <link rel="shortcut icon" href="Icon.ico" type="image/x-icon">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>play? - Apex</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    </head>


    <body>
        <!-- Here is our main header that is used across all the pages of our website -->

        <header>
            <button onclick = "location.href ='../Html/main_page_play.php'" class="back" >Back to inventory</button>
            <!-- back button-->
        </header>

            <img src="<?php echo $_SESSION['game_image_src'] ?>" alt="">

                    <div class = "Game">
                                  <?php echo '</br>'; 
                                        echo $_SESSION['game_info'];
                                        echo '</br>';
                                        echo '</br>';
                                        echo '</br>';
                                        echo '</br>';
                                        echo '</br>';
                                  ?> 
                                
                                  <?php  echo $_SESSION['game_system_req']?> 
                              
                              <h2>
                                  SlideShow:
                              </h2>
                          <div class = "slidershow">
                          
                              <div class = "slides">
                                  <input type = "radio" name ="r" id ="r1" checked>
                                  <input type = "radio" name ="r" id ="r2">
                                  <input type = "radio" name ="r" id ="r3">
                                  <input type = "radio" name ="r" id ="r4">
                                  <input type = "radio" name ="r" id ="r5">
                  
                                  <div class="slide s1">
                                      <img src="<?php echo $_SESSION['game_screenshots_src'][0] ?>" alt = "">
                                  </div>
                                  <div class="slide">
                                      <img src="<?php echo $_SESSION['game_screenshots_src'][1] ?>" alt = "">
                                  </div>
                                  <div class="slide">
                                      <img src="<?php echo $_SESSION['game_screenshots_src'][2] ?>" alt = "">
                                  </div>
                                  <div class="slide">
                                      <img src="<?php echo $_SESSION['game_screenshots_src'][3] ?>" alt = "">
                                  </div>
                                  <div class="slide">
                                      <video src="<?php echo $_SESSION['game_video_src'] ?>" controls></video>
                                  </div>
                              </div>
                              <div class="navigation">
                                  <label for="r1" class ="bar"></label>
                                  <label for="r2" class ="bar"></label>
                                  <label for="r3" class ="bar"></label>
                                  <label for="r4" class ="bar"></label>
                                  <label for="r5" class ="bar"></label>
                              </div>
                          </div>
                      </div>
            <br>
          <h2 class = "Rating"> Comments from Users </h2>
          <div class = "box">
            <ul id ="comments_list">
              <?php 
                $number = 0;  
                foreach($_SESSION['all_comments'] as $com){

                  $game_id = $com['game_id']; 
                  $comment = $com['comment'];
                  if($game_id == $_SESSION["game_id"] && $comment != NULL)
                  {
                    $number = 1;
                    echo "<li>{$comment}</li>";
                  }
                }
                if($number == 0)
                {
                  echo "<li>There are no comments yet</li>";
                }
                  ?>
              </ul>
          </div>

              <br>
            <h2 class = "Rating">Give a rating</h2>
            <div class = "container">
              <form action="../Php/api/addComment.php" method="post"> 
              <div class="star-widget">
                <input type="radio" name="rate" id="rate-5" value = "5">
                <label for="rate-5" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-4" value = "4">
                <label for="rate-4" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-3" value = "3">
                <label for="rate-3" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-2" value = "2">
                <label for="rate-2" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-1" value = "1">
                <label for="rate-1" class="fas fa-star"></label>
                  <header></header>
                  <div class="textarea">
                    <textarea id="comment" name="comment" required cols="30" placeholder="Describe your experience.."></textarea>
                    
                  </div>
                  <div class="btn">
                    <button type="submit">Post</button>
                  </div>
                  </form>
              </div>
            </div>

<button onclick="topFunction()" id="myBtn" title="Go to top">^</button>
            
<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>

    </body>
</html>
