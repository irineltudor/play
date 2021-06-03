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
$result = $game->getGameInfo($_POST["id"]);

$num = $result->rowCount();

  
  if($num == 1) {
    
   
   

    $row = $result->fetch(PDO::FETCH_ASSOC);
    extract($row);
    

    $html = file_get_html($url);
    
    $postDiv=$html->find('.game_header_image_full',0);
    $src=$postDiv->attr['src'];
    $info=$html->find('#game_area_description',0)->innertext;
    $system=$html->find('.game_page_autocollapse.sys_req',0)->innertext;
    $video=$html->find('.highlight_player_item.highlight_movie',0)->attr['data-mp4-hd-source'];
    $_SESSION['game_id'] = $_POST["id"];
    $_SESSION['rating'] = $rating;
    $_SESSION['rating_no'] = $rating_no;
    $_SESSION['game_title'] = $title ;
    $_SESSION['game_image_src'] = $src;
    $_SESSION['game_info'] = $info;
    $_SESSION['game_video_src'] = $video;
    $_SESSION['game_system_req'] = $system;
    $_SESSION['pegi_age'] = $pegi_age;
    $_SESSION['game_screenshots_src'] = array();

    foreach($html->find('.highlight_player_item.highlight_screenshot') as $a)
    {
      $img=$a->find('.screenshot_holder',0)->find('.highlight_screenshot_link',0)->attr['href'];
      array_push($_SESSION['game_screenshots_src'],$img);
    }
 


    $game_info= array(
    'game_id' => $_POST["id"],
    'rating'=> $rating,
    'rating_no' => $rating_no,
    'game_title' => $title,
    'game_image_src' => $src,
    'game_info' => $info,
    'game_video_src' => $video,
    'game_system_req' => $system,
    'pegi_age' => $pegi_age,
    'game_screenshots_src' =>  $_SESSION['game_screenshots_src']
    );
  
 
    echo json_encode($game_info);
    

  } 

  ?>
