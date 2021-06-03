<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/tournaments.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$tournament = new Tournament($db);

$result = $tournament->getTournaments();

$num = $result->rowCount();
$all_tournaments= array();
  // Check if any posts
  if($num > 0) {
    

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'organizer' => $organizer,
        'begin_date' => $begin_date,
        'end_date' => $end_date,
        'game_id' => $game_id
      );

      array_push($all_tournaments,$post_item);
    }
      

    echo json_encode($all_tournaments);

  }

