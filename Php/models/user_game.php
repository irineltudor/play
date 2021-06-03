<?php

class User_game{

    private $conn;
    private $table='user_game';
    
    public $id;
    public $title;
    public $url;


    public function __construct($db) {

        $this->conn = $db;
    
       }

    public function getGamesAssigned($user_id){

        $query="SELECT game_id from " . $this->table . " WHERE user_id = " . $user_id;

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }
   
    public function exists($user_id,$game_id)
    {
        $query="SELECT * FROM " . $this->table . " WHERE user_id =" . $user_id . " AND game_id = " . $game_id;

        $stmt=$this->conn->prepare($query);
    
        $stmt->execute();

        return $stmt;
    }

    public function addGame($user_id,$game_id)
   {
    
    $query="INSERT INTO " . $this->table . " (user_id,game_id) values('" . $user_id . "','" . $game_id. "')";

    $stmt=$this->conn->prepare($query);

    $stmt->execute();

   }

   public function deleteGame($user_id,$game_id)
   {
    $query="DELETE FROM " . $this->table . " WHERE user_id =" . $user_id . " AND game_id = " . $game_id;
    $stmt=$this->conn->prepare($query);

    $stmt->execute();
   }


}

?>
