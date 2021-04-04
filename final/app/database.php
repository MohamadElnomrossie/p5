<?php
// mysqli (improved)
class database {
    private $DBHost = 'localhost';
    private $DBuserName = 'root';
    private $DBpassword = '';
    private $DBname = 'final';
    private $con;
    // database connection
    function __construct()
    {
        $this->con = new mysqli($this->DBHost,$this->DBuserName,$this->DBpassword,$this->DBname);
        if($this->con->connect_error){
            die("Connection Failed :$this->con->connect_error");
        }else{
            // echo "Connection True";
        }
    }
    // DML (insert-update-delete) Return true OR false
    public function runDML($query)
    {
        $result = $this->con->query($query);
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    // DQL (selects) return array of data OR empty array
    public function runDQL($query)
    {
        $result = $this->con->query($query);
        if($result->num_rows > 0){
            return $result;
        }else{
            return [];
        }
    }

}

