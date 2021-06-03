<?php
//Headers
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


include_once dirname(__FILE__) . '/../config/database.php';
include_once dirname(__FILE__) . '/../models/game.php';
include_once dirname(__FILE__) . '/../HtmlParse/simple_html_dom.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();


$gameid = $_SESSION['game_id'];

$game = new Game($db);

$_SESSION["am_intrat"] = 1;
$result = $game->getGameInfo($gameid);


$num = $result->rowCount();

  
  if($num == 1) {
    
   
   

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'title' => $title,
        'url' => $url,
        'category' => $category,
        'rating_no' => $rating_no,
        'rating' => $rating
      );
    }

    $new_rating_no = $rating_no + 1;
    $new_rating = ($rating * $rating_no + $_POST['rate']) / $new_rating_no;
    $game->updateGameRating($gameid,$new_rating,$new_rating_no);
}

?>