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

$result=$game->getGamesCategories();

$num=$result->rowCount();
$all_categories= array();
if($num > 0) {
   

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      array_push($all_categories,$category);
    }
      

    echo json_encode($all_categories);

  }


?>