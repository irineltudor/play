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
$result = $game->getGameRating($_POST["id"]);

$num = $result->rowCount();

  
  if($num == 1) {

    $row = $result->fetch(PDO::FETCH_ASSOC);
    extract($row);
    echo json_encode($rating);
    

  } 

  ?>
