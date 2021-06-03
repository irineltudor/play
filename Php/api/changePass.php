<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user= new User($db);

$result=$user->verify($_SESSION['user_id'],$_POST['pass']);
if($result->rowCount() == 0)
{
    $post = array(
        "number" => "0",
        "text" => "Invalid password"
      );
    
      echo json_encode($post);
}
else {


if($_POST['newpass'] != $_POST['renewpass'])
{
  $post = array(
    "number" => "0",
    "text" => "New Password does not match"
  );

  echo json_encode($post);
}
else{
    $result=$user->changePass($_SESSION['user_id'],$_POST['newpass']);
    if($result)
    {
        $post = array (
            "number" => "1",
            "text" => "Password Changed"
          );
        
          echo json_encode($post);
    }
}
}

?>