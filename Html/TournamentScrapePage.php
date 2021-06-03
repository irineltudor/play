<?php
   if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
  $_SESSION['tournament_id']=$_POST['tournament_id'];
  ?>
<!DOCTYPE html>
<html>
    <head>

      <title>play? - Tournamets</title>
      <meta charset="UTF-8" />
      <link rel="icon" href="../Poze/logo.png" type="image/x-icon" sizes="16x16">
      <link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href = "../css/tournament_scrape_page.css" rel = "stylesheet">
    </head>

<body>

    <div class="disk disk_opened_right"></div>

    <div class="disk disk_opened_left">
      <div class="topnav">
        <a href="../Html/next_page_play.html">Go Back</a>
      </div>

        <div class="content">
          <div class="title"> 
             
          </div>
          <div class="tournament_info">
     
              
          </div>

          <div class="tournament_ranking">
          <h1> Tournament Ranking </h1>
          <ul id = "teams_list">
          
           </ul> 
          </div>
          
        </div>

       
        
        <div id="id01" class="registerTournament">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                      <form class="modal-content register" action="../Php/api/addTournamentTeam.php" method="post">
                          <div class="container">
                              <h1>Register Tournament</h1>
                              <p>Please fill in this form to register Tournament.</p>
                              <hr>
                              
                              <label for="TeamName"><b>Team Name</b></label>

                              <input id = "TeamName" type="text" placeholder="Enter Team Name" name="TeamName" required>

                              <label for="IGN"><b>In game name</b></label>

                              <input id = "IGN" type="text" placeholder="Enter IGN" name="IGN" required>

                              <label for="Rank"><b>Rank</b></label>

                              <input id = "Rank" type="text" placeholder="Enter Rank" name="Rank" required>

                              <label for="phonenumber"><b>Phone Number</b></label>

                              <input id = "phonenumber" type="tel" name="phonenumber"
                                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                required placeholder="Enter Phone Number">
                                <small>Nubmer Format: 123-456-7890</small>
                                <p>&nbsp;</p>         
      
                                  <div class="clearfix">
                                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                        <button type="submit" class="registerbtn">Register</button>
                                  </div>
                            </div>
                       </form>

          </div>
        </div>
    <script>
  // Get the modal
  var modal = document.getElementById('id01');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../Js/tournamentscrapepage.js"></script>
 <script>
   getTournamentInfo(<?php echo $_POST['tournament_id'] ?>);
   getTournamentTeams(<?php echo $_POST['tournament_id'] ?>);
   alreadyRegistered(<?php echo $_POST['tournament_id'] ?>);

  </script>
</body>
</html>