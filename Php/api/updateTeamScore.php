<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user_tournament.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user_tournament = new User_tournament($db);

$user_tournament->updateTeamScore($_SESSION['team_id'],$_POST['score']);

header("Location: ../../Html/admin/setTeamScore.php", true, 301);


?>