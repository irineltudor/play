<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/comment.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$comment = new Comment($db);

$result = $comment->getCommentInfo($_SESSION["game_id"]);

$num = $result->rowCount();

  
  if($num == 1) {
    
   
   

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
    }

    
    $_SESSION['comments'] = $comment;

  } 

  ?>
