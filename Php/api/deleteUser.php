<?php
//Headers


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/user.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$user = new User($db);


$id = $_POST["id"];


$result=$user->deleteUser($id);
if($result==1)
{
header('Location: ../../Html/admin/manage_users_page.html', true, 301);
}

?>