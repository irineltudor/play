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
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user = new User($db);

$result = $user->getUsers();

$num = $result->rowCount();
$all_users= array();

if($num > 0) {
    

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'username' => $username,
        'password' => $password,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'emailaddress' => $emailaddress,
        'admin' => $admin
      );

      array_push($all_users,$post_item);
    }
      

    echo json_encode($all_users);

  } 
?>

