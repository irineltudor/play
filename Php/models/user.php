<?php

class User{

   private $conn;
   private $table='user';
   
   public $id;
   public $username;
   public $password;
   public $firstname;
   public $lastname;
   public $emailaddress;
 

   public function __construct($db) {

    $this->conn = $db;

   }

   public function login($username_parsed,$password_parsed){
       $query="SELECT * from " . $this->table . " WHERE username= '" . $username_parsed . "' and password = '" . $password_parsed . "'";

       $stmt=$this->conn->prepare($query);

       $stmt->execute();
       return $stmt;
   }

   public function createaccount($username,$password,$firstname,$lastname,$emailaddress,$admin)
   {
    if($username != null && $password != null && $firstname != null && $lastname != null && $emailaddress != null)
    {$query="INSERT INTO " . $this->table . " (username,password,firstname,lastname,emailaddress,admin) values('" . $username . "','" . $password . "','" . $firstname . "','" . $lastname . "','" . $emailaddress . "','" . $admin . "')" ;

    $stmt=$this->conn->prepare($query);

    $stmt->execute();
    return true;
    }
    else
    {
    return false;
    }

   }

   public function logout()
   {
     session_unset();
     header("Location: ../../Html/login_play.html");
   }


   public function getId()
   {
     return $this->id;
   }

   public function getUsername()
   {
     return $this->username;
   }
   public function getPassword()
   {
     return $this->password;
   }
   public function getFirstname()
   {
     return $this->firstname;
   }
   public function getLastname()
   {
     return $this->lastname;
   }
   public function getEmailaddress()
   {
     return $this->emailaddress;
   }
   public function getUsers(){

    $query="SELECT * from " . $this->table;

    $stmt=$this->conn->prepare($query);

    $stmt->execute();

    return $stmt;
}

public function deleteUser($id)
   {
    
    $query="DELETE FROM " . $this->table . " WHERE id =" . $id;
    $stmt=$this->conn->prepare($query);
    if( $stmt->execute())
    {
      return true;
    }
    return false;
   

   }

public function getUserInfo($id)
{

  $query="SELECT * from " . $this->table . " WHERE id=" . $id;

  $stmt=$this->conn->prepare($query);

  $stmt->execute();
  
  return $stmt;

}

public function verify($id,$password)
{
  if($password != NULL)
  {
  $query = "SELECT * FROM " . $this->table . " WHERE id= " . $id . " and password = '" . $password . "'" ;
  if($stmt=$this->conn->prepare($query)){
    if($stmt->execute())
    return $stmt;
  }
 
  }
  return false;
}

public function changePass($id,$newpassword)
{
  $query="UPDATE " . $this->table . 
  " SET password = '" . $newpassword .  
  "' WHERE id = " . $id;

  $stmt=$this->conn->prepare($query);

  $stmt->execute();
  
  return $stmt;
}

public function updateUser($id)
    {  
         $query="UPDATE " . $this->table . " SET admin = 1 WHERE id = " . $id;

        $stmt=$this->conn->prepare($query);
    
        $stmt->execute();
  
        return $stmt;
    }

}