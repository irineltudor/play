<?php
//Headers

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user = new User($db);

$user->logout();

session_destroy();

  ?>