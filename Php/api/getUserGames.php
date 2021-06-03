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
include_once dirname(__FILE__) . '/../models/user_game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();

$game = new Game($db);
$user_game=new User_game($db);
$user_id=$_SESSION['user_id'];
$result_games = $user_game->getGamesAssigned($user_id);

$num = $result_games->rowCount();

$games=array();
  
  if($num > 0) {
   
    while($row = $result_games->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      array_push($games,$game_id);
    }

  } 


$all_user_games= array();

  foreach($games as $game_id)
  {
    
    $result= $game->getGameInfo($game_id);
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
            'pegi_age' => $pegi_age
          );
    
          array_push($all_user_games,$post_item);
        }
          
    
       
    
      } 
         
       
  
}

echo json_encode($all_user_games);


?>

