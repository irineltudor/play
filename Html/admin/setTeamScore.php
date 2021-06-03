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

            <li><a href="../admin/manage_tournaments_page.html">Back to Tournaments</a></li>
        </ul>
    </div>

    <div class="everything-score">
      
         <h1 style = "text-align:center;margin-bottom:50px" class="title"></h1>
         <ul class="w3-ul w3-card-4">
        </ul>
       
     </div>
    </div>
</div>

 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../Js/setTeamScore.js"></script>
<script>
    getTournamentInfo(<?php echo $_POST['id']?>);
    getTournamentTeams(<?php echo $_POST['id']?>);
</script>
</body>
</html>