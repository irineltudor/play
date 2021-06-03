<?php
//Headers
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user = new User($db);

$result = $user->login($_POST["username"],$_POST["password"]);

$num = $result->rowCount();


if($num == 1) {
      
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $_SESSION['user_id']=$id;
        $_SESSION['user_username']=$username;
        $_SESSION['user_password']=$password;
        $_SESSION['user_firstname']=$firstname;
        $_SESSION['user_lastname']=$lastname;
        $_SESSION['user_emailaddress']=$emailaddress;

   
    
         
      }

      echo $admin;
    } 
    else {
      return false;
    }


  ?>
