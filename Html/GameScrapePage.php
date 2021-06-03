<?php
   if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
  if(isset($_POST['id']))
  {
  $_SESSION['game_id'] = $_POST['id'];
  }
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
        <title>play? - Game</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    </head>


    <body>
        <!-- Here is our main header that is used across all the pages of our website -->

        <header>
            <button onclick = "location.href ='../Html/main_page_play.html'" class="back" >Back to inventory</button>
            <!-- back button-->
        </header>

        <div class = "poza" id = "poza"> </div>
                  
                    <div class = "Game" id = "test">
                                
                              
                            
                      </div>


                      <div class = "slidershow">
                          
                              <div class = "slides">
                                  <input type = "radio" name ="r" id ="r1" checked>
                                  <input type = "radio" name ="r" id ="r2">
                                  <input type = "radio" name ="r" id ="r3">
                                  <input type = "radio" name ="r" id ="r4">
                                  <input type = "radio" name ="r" id ="r5">
                  
                                  <div class="slide s1" id = "slide1">
                                      
                                  </div>
                                  <div class="slide" id = "slide2">
                                      
                                  </div>
                                  <div class="slide" id = "slide3">
                                      
                                  </div>
                                  <div class="slide" id = "slide4">
                                      
                                  </div>
                                  <div class="slide" id = "slide5">
                                      
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
                





           






          <h2 class = "Rating" id = "game_rating"></h2>

            <br>
          <h2 class = "Rating"> Comments from Users </h2>
          <div class = "box">
            <ul id ="commentslist">
              </ul>
          </div>

              <br>
            <h2 class = "Rating">Give a rating</h2>
            <div class = "container" id="rating_container">
              <form action="../Php/api/addComment.php" method="post" id="rating_form"> 
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../Js/GameScrapePage.js"></script>
 <script>
   getComments(<?php echo $_SESSION['game_id'] ?>);
   getGameInfo(<?php echo $_SESSION['game_id'] ?>);
   getGameSlide1(<?php echo $_SESSION['game_id'] ?>);
   getGameSlide2(<?php echo $_SESSION['game_id'] ?>);
   getGameSlide3(<?php echo $_SESSION['game_id'] ?>);
   getGameSlide4(<?php echo $_SESSION['game_id'] ?>);
   getGameSlide5(<?php echo $_SESSION['game_id'] ?>);
   getPoza(<?php echo $_SESSION['game_id'] ?>);  
   alreadyRegistered(<?php echo $_SESSION['game_id'] ?>);
   getRating(<?php echo $_SESSION['game_id'] ?>);
  </script>
    </body>
</html>
