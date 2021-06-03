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

$user = new User($db);

$result = $user->getUserInfo($_SESSION['user_id']);

$num = $result->rowCount();


   if($num == 1) {
  
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo json_encode($row);
  }
} 
else {
  return false;
}



?>

