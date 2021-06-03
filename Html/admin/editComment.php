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

<title>play?</title>

<meta charset="UTF-8" />
<link rel="icon" href="../../Poze/logo.png" type="image/x-icon" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href = "../../Css/adminpages.css" rel = "stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

    <div class="content">
            <div class="logo">

            </div>
            <div class="navbar">
                <ul>

                    <li><a href="../admin/manage_games_page.html">Back to Game</a></li>
                </ul>
            </div>

                <div class="everything">
                
                    <h1 style = "text-align:center;margin-bottom:50px" class="title"></h1>
                    <div class="w3-container" style="overflow-y: scroll;height: 300px;">
                        <ul class="w3-ul w3-card-4">

                        </ul>
                    </div>
                
                </div>
    </div>

 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../Js/editComments.js"></script>
<script>
    getGameInfo(<?php echo  $_SESSION['game_id']?>);
    getComments(<?php echo  $_SESSION['game_id']?>);
</script>
</body>
</html>