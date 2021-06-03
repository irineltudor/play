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

$result = $game->getGames();

$num = $result->rowCount();

$allgames= array();
  // Check if any posts
  if($num > 0) {
   

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $html = file_get_html($url);
      $postDiv=$html->find('.game_header_image_full',0);
      $src=$postDiv->attr['src'];
      if($pegi_age==null)
      $pegi_age="0";
      $post_item = array(
        'id' => $id,
        'title' => $title,
        'url' => $url,
        'category' => $category,
        'rating_no' => $rating_no,
        'rating' => $rating,
        'image_src' => $src,
        'pegi_age' =>$pegi_age
      );

      array_push($allgames,$post_item);
    }

    echo json_encode($allgames);
      

 

  } 
else{
  echo json_encode(0);
}

?>


