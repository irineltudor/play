<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/comment.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$comment = new Comment($db);

$result = $comment->getComments();

$num = $result->rowCount();
$comments= array();
  // Check if any posts
  if($num > 0) {
    

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'game_id' => $game_id,
        'user_id' => $user_id,
        'rating' => $rating,
        'comment' => $comment
      );

      array_push($comments,$post_item);
    }
      

    echo json_encode($comments);

  } 
?>

