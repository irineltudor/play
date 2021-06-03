<?php

class Comment{

    private $conn;
    private $table='review';
    
    public $id;
    public $game_id;
    public $user_id;
    public $rating;
    public $comment;


    public function __construct($db) {

        $this->conn = $db;
    
    }
    
    public function addComment($game_id,$user_id,$rating,$comment)
   {
    if($game_id != null && $user_id != null && $rating != null && $comment != null){
        $query="INSERT INTO " . $this->table . " (game_id,user_id,rating,comment) values('" . $game_id . "','" . $user_id . "','" . $rating . "','" . $comment  . "')";

    $stmt=$this->conn->prepare($query);

    $stmt->execute();
    }
   }
   public function getComments(){

    $query="SELECT * from " . $this->table;

    $stmt=$this->conn->prepare($query);

    $stmt->execute();

    return $stmt;
}

public function exists($user_id , $game_id)
{
    $query="SELECT * FROM " . $this->table . " WHERE game_id= " . $game_id . " and user_id= " . $user_id ;
    
    $stmt=$this->conn->prepare($query);

    $stmt->execute();

    return $stmt;
}
public function deleteComment($id)
{
 $query="DELETE FROM " . $this->table . " WHERE id =" . $id;
 $stmt=$this->conn->prepare($query);

 $stmt->execute();
}

public function deleteRating($user_id , $game_id)
{
    $query="DELETE FROM " . $this->table . " WHERE game_id= " . $game_id . " and user_id= " . $user_id ;
    
    $stmt=$this->conn->prepare($query);

    $stmt->execute();
}

}

?>
