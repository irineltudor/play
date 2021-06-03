<?php
   if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
  $_SESSION['user_id_update'] = $_POST['id'];
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

                <li><a href="../admin/manage_users_page.html">Back to Users</a></li>
            </ul>
        </div>

    <div class="everything-score">
      
         <h1 style = "text-align:center;margin-bottom:50px" class="title"></h1>
         <button class="button2" onclick="updateUser(<?php echo $_POST['id']?>)"> I am 100% sure about it !!!</button>
         <h1 style = "text-align:center;margin-bottom:50px" class = "update"></h1>
    </div>
</div>

 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../Js/setAdmin.js"></script>
<script>
    getUserInfo(<?php echo $_POST['id']?>);
</script>
</body>
</html> 