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


$text = $_POST['comment'];
$rate = $_POST['rate'];
$userid = $_SESSION['user_id'];
$gameid = $_SESSION['game_id'];

$result = $comment->addComment($gameid,$userid,$rate,$text);

include "../api/updateGameRating.php";

header('Location: ../../Html/GameScrapePage.php', true, 301);

?>