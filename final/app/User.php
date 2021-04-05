<?php
include_once "database.php";
include_once "operation.php";
class User extends database implements operation
{
    private $ID;
    private $Name;
    private $Password;
    private $Phone;
    private $E_mail;
    private $Code;
    private $Status;
    private $Photo;
    private $Created_at;
    private $Updated_at;
    private $Gender;
    //getters
    public function getId()
    {
        # code...
        return $this->ID;
    }
    public function getName()
    {
        # code...
        return $this->Name;
    }
    public function getGender()
    {
        # code...
        return $this->Gender;
    }
    public function getPhone()
    {
        # code...
        return $this->Phone;
    }
    public function getEmail()
    {
        # code...
        return $this->E_mail;
    }
    public function getPassword()
    {
        # code...
        return $this->Password;
    }
    public function getPhoto()
    {
        # code...
        return $this->Photo;
    }
    public function getStatus()
    {
        # code...
        return $this->Status;
    }
    public function getCode()
    {
        # code...
        return $this->Code;
    }
    public function getCreatedAt()
    {
        # code...
        return $this->Created_at;
    }
    public function getUpdatedAt()
    {
        # code...
        return $this->Updated_at;
    }

    //setters
    public function setId($id)
    {
        # code...
        $this->ID = $id;
    }
    public function setName($Name)
    {
        # code...
        $this->Name = $Name;
    }
    public function setGender($Gender)
    {
        # code...
        $this->Gender = $Gender;
    }
    public function setPassword($password)
    {
        # code...
        $this->Password = sha1($password);
    }
    public function setEmail($email)
    {
        # code...
        $this->E_mail = $email;
    }
    public function setPhone($phone)
    {
        # code...
        $this->Phone = $phone;
    }
 
    public function setPhoto($photo)
    {
        # code...
        $this->Photo = $photo;
    }
    public function setStatus($status)
    {
        # code...
        $this->Status = $status;
    }
    public function setCreatedAt($created_at)
    {
        # code...
        $this->Created_at = $created_at;
    }
    public function setUpdatedAt($updated_at)
    {
        # code...
        $this->Updated_at = $updated_at;
    }
    public function setCode($Code)
    {
        # code...
        $this->Code = $Code;
    }

    // --- --- //

   public function updateData(){

   }
   public function insertData(){
        $query  = "INSERT INTO `users` (`users`.`Name`,`users`.`E_mail`,`users`.`Phone`,`users`.`Password`,`users`.`Gender`,`users`.`code`) 
        VALUES ('$this->Name','$this->E_mail','$this->Phone','$this->Password','$this->Gender','$this->Code')";
        // echo $query;die;
        return $this->runDML( $query );
   }
   public function deleteData(){

   }
   public function selectAllData(){

   }

   public function emailCheck()
   {
       $query = "SELECT `users`.* FROM `users` WHERE `users`.`E_mail` = '$this->E_mail'";
       return $this->runDQL($query);
   }

   public function checkCode()
   {
      $query = "SELECT `users`.* FROM `users` WHERE `users`.`Code` = '$this->Code' AND `users`.`E_mail` = '$this->E_mail'";
      return $this->runDQL($query);
   }

   public function updateStatus()
   {
       $query = "UPDATE `users` SET `users`.`Status` = $this->Status WHERE `users`.`E_mail` = '$this->E_mail'";
       return $this->runDML($query);
   }

   public function updateCode()
   {
      $query = " UPDATE `users` SET `users`.`code` = $this->Code WHERE `users`.`E_mail` = '$this->E_mail' ";
      return $this->runDML($query);
   }

   public function updatePassword()
   {
      $query = "UPDATE `users` SET `users`.`password` = '$this->Password' WHERE `users`.`E_mail` = '$this->E_mail' ";
      return $this->runDML($query);
   }

   public function login()
   {
       $query = "SELECT `users`.* FROM `users` WHERE `users`.`E_mail` = '$this->E_mail' AND `users`.`Password` = '$this->Password'";
       return $this->runDQL($query);
   }

   
}
