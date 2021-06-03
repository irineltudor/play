<?php

class Game{

    private $conn;
    private $table='game';
    
    public $id;
    public $title;
    public $url;


    public function __construct($db) {

        $this->conn = $db;
    
       }

    public function getGames(){

        $query="SELECT * from " . $this->table;

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }
    public function getGamesByRanking(){

        $query="SELECT * from " . $this->table ." order by rating desc";

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }

    public function getMostPopularGame(){

        $query="Select title, count(game_id) as number  from game JOIN user_game ON game.id = user_game.game_id group by game_id order by number desc";

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }

    public function getUserName(){

        $query="Select user.id as id, username from user JOIN review ON review.user_id = user.id group by id";

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }


    public function getGamesByRatingNumber(){

        $query="SELECT * from " . $this->table ." order by rating_no desc";

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }


    public function addGame($title,$url,$category,$pegi_age)
   {
    if($title != null && $url != null)
    {
    $query="INSERT INTO " . $this->table . " (title,url,category,pegi_age) values('" . $title . "','" . $url . "','" . $category . "','" . $pegi_age . "')";

    $stmt=$this->conn->prepare($query);

    $stmt->execute();
    return true;
    }

    return false;



   }

   public function deleteGame($id)
   {
    $query="DELETE FROM " . $this->table . " WHERE id =" . $id;
    $stmt=$this->conn->prepare($query);

    $stmt->execute();
   }

    public function getGameInfo($id){
        $query="SELECT * from " . $this->table . " WHERE id = " . $id;

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;

    }

    public function getGamesCategories()
    {
        $query="SELECT DISTINCT category from " . $this->table;

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }
    
    public function getGamesAge()
    {
        $query="SELECT DISTINCT pegi_age from " . $this->table;

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }
    public function updateGameRating($id, $rating, $ratingNO)
    {

        $sql = "UPDATE game SET rating=" .$rating. ", rating_no= ". $ratingNO . " WHERE id = " .$id;

       $this->conn->query($sql);
    

    }

    public function getGameRating($id)
    {
        $query = "SELECT rating FROM " . $this->table . " WHERE id=" . $id;
        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }
    
    public function exists($url)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE url='" . $url . "'";
        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        if($stmt->rowCount() > 0)
        {
            return true;
        }
        else{
            return false;
        }
    }
}

?>
