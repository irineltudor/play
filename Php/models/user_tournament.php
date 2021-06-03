<?php

class User_tournament{

    private $conn;
    private $table='user_tournament';
    
    public $id;
    public $user_id;
    public $tournament_id;
    public $user_team_name;
    public $user_ign;
    public $user_rank;
    public $user_phone_number;
    public $score;


    public function __construct($db) {

        $this->conn = $db;
    
       }

    public function getTournamentTeams($tournament_id){

        $query="SELECT * from " . $this->table . " WHERE tournament_id = " . $tournament_id . " ORDER BY 8 DESC";

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }

    public function getUsersScore(){

        $query="SELECT user_team_name, SUM(score) as scores from " . $this->table ." group by user_team_name order by scores desc";

        $stmt=$this->conn->prepare($query);
 
        $stmt->execute();
 
        return $stmt;
    }

    public function updateTeamScore($id,$score)
    {  
         $query="UPDATE " . $this->table . " SET score = " . $score . " WHERE id = " . $id;

        $stmt=$this->conn->prepare($query);
    
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }
   
    public function exists($user_id,$tournament_id)
    {
        $query="SELECT * FROM " . $this->table . " WHERE user_id =" . $user_id . " AND tournament_id = " . $tournament_id;

        $stmt=$this->conn->prepare($query);
    
        $stmt->execute();

        return $stmt;
    }

    public function addTournamentTeam($user_id,$tournament_id,$user_team_name,$user_ign,$user_rank,$user_phone_number,$score)
   {
    if($user_id !=null && $tournament_id !=null && $user_team_name !=null && $user_ign !=null && $user_rank !=null && $user_phone_number !=null)
    {$query="INSERT INTO " . $this->table . " (user_id,tournament_id,user_team_name,user_ign,user_rank,user_phone_number,score) values('{$user_id}','{$tournament_id}','{$user_team_name}','{$user_ign}','{$user_rank}','{$user_phone_number}','{$score}')";

    $stmt=$this->conn->prepare($query);

    $stmt->execute();
      return 1;
    }
      return 0;

   }

}

?>
