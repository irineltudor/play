<?php
//Headers


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/tournaments.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$tournament = new Tournament($db);

$name=$_POST['tournament'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$organizer=$_POST['tournament_organizer'];
$begin_date=$_POST['tournament_begin'];
$end_date=$_POST['tournament_end'];
$game_id=$_POST['game_id'];


$result = $tournament->addTournament($name,$email,$phone,$organizer,$begin_date,$end_date,$game_id);

header('Location: ../../Html/admin/manage_tournaments_page.html', true, 301);

?>