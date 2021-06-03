<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user_tournament.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$users = new User_tournament($db);

$result = $users->getUsersScore();

$num = $result->rowCount();
$all_users_score= array();
   // Check if any posts
   if($num > 0) {
    

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'user_team_name' => $user_team_name,
        'scores' => $scores
      );

      array_push($all_users_score,$post_item);
    }
      

     echo json_encode($all_users_score);

  } 

?>


