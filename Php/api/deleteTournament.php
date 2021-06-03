<?php
//Headers


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/tournaments.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$tournaments = new Tournament($db);


$id = $_POST["id"];


$tournaments->deleteTournament($id);

header('Location: ../../Html/admin/manage_tournaments_page.php', true, 301);

?>