<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);

$result = $game->getMostPopularGame();

$num = $result->rowCount();
$popular_games= array();
  // Check if any posts
  if($num > 0) {
   

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'title' => $title,
        'number' => $number
        
      );

      array_push($popular_games,$post_item);
    }
      

    echo json_encode($popular_games);

  } 

?>


