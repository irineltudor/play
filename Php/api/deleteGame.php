<?php
//Headers


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);


$id = $_POST["id"];


$game->deleteGame($id);

header('Location: ../../Html/admin/manage_games_page.html', true, 301);

?>