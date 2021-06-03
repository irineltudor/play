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

$review = new Comment($db);


$review->deleteRating($_SESSION['user_id'],$_SESSION['game_id']);

header('Location: ../../Html/GameScrapePage.php', true, 301);

?>