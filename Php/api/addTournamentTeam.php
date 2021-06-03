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

$user_tournament = new User_tournament($db);

$user_id=$_SESSION['user_id'];
$tournament_id=$_SESSION['tournament_id'];
$user_team_name=$_POST['TeamName'];
$user_ign=$_POST['IGN'];
$user_rank=$_POST['Rank'];
$user_phone_number=$_POST['phonenumber'];
$score=0;


$result = $user_tournament->addTournamentTeam($user_id,$tournament_id,$user_team_name,$user_ign,$user_rank,$user_phone_number,$score);

echo json_encode($result);

?>