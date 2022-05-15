<?php


class DBHandler {
// properties
    private $dbservername;
    private $dbusername;
    private $dbpassword;
    private $dbname;
    private $dbconnection;


// constructor

function __construct(){
    
    $this->dbservername = "localhost";
    $this->dbusername = "root";
    $this->dbpassword = "";
    $this->dbname = "microQuestDB";

    $this-> dbconnection = mysqli_connect($this->dbservername,$this->dbusername,$this->dbpassword,$this->dbname);
 
  

    // for error message
    if (mysqli_connect_errno()) {
        $errorlog = "MySQL Error: " . mysqli_connect_errno();
        exit($errorlog);
    }
}


// destructor

function __destruct(){

    if(isset($this->dbconnection)){
        mysqli_close($this->dbconnection);
        
    }

}
// methods

// for registration
public function registerUser($fname,$usertype,$lname,$mdlname,$email,$password,$idcard,$signature,$snapshot,$birthdate,$occupation,$address){
   
    $tablename = "users";
    $usertype = mysqli_real_escape_string($this->dbconnection, $usertype);
    $fname = mysqli_real_escape_string($this->dbconnection, $fname);
    $lname = mysqli_real_escape_string($this->dbconnection, $lname);
    $mdlname = mysqli_real_escape_string($this->dbconnection, $mdlname);
    $email = mysqli_real_escape_string($this->dbconnection, $email);
    $password = mysqli_real_escape_string($this->dbconnection, $password);
    $idcard = mysqli_real_escape_string($this->dbconnection, $idcard);
    $signature = mysqli_real_escape_string($this->dbconnection, $signature);
    $snapshot = mysqli_real_escape_string($this->dbconnection, $snapshot);
    $birthdate = mysqli_real_escape_string($this->dbconnection, $birthdate);
    $occupation = mysqli_real_escape_string($this->dbconnection, $occupation);
    $address = mysqli_real_escape_string($this->dbconnection, $address);

    $query = "INSERT INTO $tablename() VALUES (0,'$usertype','$fname','$lname','$mdlname','$email','$password','$idcard','$signature','$snapshot','$birthdate','$occupation','$address')";
    return mysqli_query($this->dbconnection, $query);

}

// for login

public function verifyuser($email,$password){
    $tablename = "users";
    $email = mysqli_real_escape_string($this->dbconnection, $email);
    $password = mysqli_real_escape_string($this->dbconnection, $password);

    $query = "SELECT * FROM $tablename WHERE email = '$email' AND userpassword='$password'";
    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0){
        return true;
    } else {
        return false;
    }
  

}




}// end of class