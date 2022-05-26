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
    $this->dbname = "microquestdbv2";

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
public function registerUser($userType,	$userName, $userEmail,$userPassword,$userPhoto,$firstName,$lastName,$userGender,$education,$birthDate,$houseNo,$street,$baranggay,$municipality,$idType,$idFile,$idNumber,$idExpiration,$otherIDType,$otherIDFile,$otherIDNumber,$otheridExpiration){

    $tablename = "userprofile";
    $userID = 0;
    $userStatus = 'not verified';
    $userType  = mysqli_real_escape_string($this->dbconnection, $userType);
    $userName  = mysqli_real_escape_string($this->dbconnection, $userName);
    $userEmail = mysqli_real_escape_string($this->dbconnection, $userEmail);
    $userPassword = mysqli_real_escape_string($this->dbconnection, $userPassword);
    $userPhoto = mysqli_real_escape_string($this->dbconnection, $userPhoto);
    $firstName = mysqli_real_escape_string($this->dbconnection, $firstName);
    $lastName  = mysqli_real_escape_string($this->dbconnection, $lastName );
    $userGender= mysqli_real_escape_string($this->dbconnection, $userGender);
    $education = mysqli_real_escape_string($this->dbconnection, $education);
    $birthDate = mysqli_real_escape_string($this->dbconnection, $birthDate);
    $houseNo   = mysqli_real_escape_string($this->dbconnection, $houseNo);
    $street    = mysqli_real_escape_string($this->dbconnection, $street);
    $baranggay = mysqli_real_escape_string($this->dbconnection, $baranggay);
    $municipality = mysqli_real_escape_string($this->dbconnection, $municipality);
    $idType    = mysqli_real_escape_string($this->dbconnection, $idType);
    $idFile    = mysqli_real_escape_string($this->dbconnection, $idFile);
    $idNumber  = mysqli_real_escape_string($this->dbconnection, $idNumber);
    $idExpiration = mysqli_real_escape_string($this->dbconnection, $idExpiration);
    $otherIDType = mysqli_real_escape_string($this->dbconnection, $otherIDType);
    $otherIDFile = mysqli_real_escape_string($this->dbconnection, $otherIDFile);
    $otherIDNumber = mysqli_real_escape_string($this->dbconnection, $otherIDNumber);
    $otheridExpiration = mysqli_real_escape_string($this->dbconnection, $otheridExpiration);


	

    $query = "INSERT INTO $tablename() VALUES ($userID, '$userType','$userStatus','$userName', '$userEmail','$userPassword','$userPhoto','$firstName','$lastName','$userGender','$education','$birthDate','$houseNo','$street','$baranggay','$municipality','$idType','$idFile','$idNumber','$idExpiration','$otherIDType','$otherIDFile','$otherIDNumber','$otheridExpiration')";
    return mysqli_query($this->dbconnection, $query);

}


// for registration of admins

public function registerAdmin($adminusername,$adminemail,$adminpassword,$admintype){
   
    $tablename = "admins";
    $adminusername = mysqli_real_escape_string($this->dbconnection, $adminusername);
    $adminemail = mysqli_real_escape_string($this->dbconnection, $adminemail);
    $adminpassword = mysqli_real_escape_string($this->dbconnection, $adminpassword);
    $admintype = mysqli_real_escape_string($this->dbconnection, $admintype);





    $query = "INSERT INTO $tablename() VALUES (0,'$adminusername','$adminemail','$adminpassword','$admintype')";
    return mysqli_query($this->dbconnection, $query);

}

// for login

public function verifyuser($email,$password){
    $tablename = "userprofile";
    $email = mysqli_real_escape_string($this->dbconnection, $email);
    $password = mysqli_real_escape_string($this->dbconnection, $password);

    $query = "SELECT * FROM $tablename WHERE userEmail = '$email' AND userPassword='$password'";
    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0){
        return true;
    } else {
        return false;
    }
  

}

// for admin login
public function verifyadmin($email,$password){
    $tablename = "admin";
    $email = mysqli_real_escape_string($this->dbconnection, $email);
    $password = mysqli_real_escape_string($this->dbconnection, $password);

    $query = "SELECT * FROM $tablename WHERE adminEmail = '$email' AND adminPassword='$password'";
    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0){
        return true;
    } else {
        return false;
    }
  

}


// check if exists
public function exists($tablename,$column,$name){
    $tablename = mysqli_real_escape_string($this->dbconnection, $tablename);
    $column = mysqli_real_escape_string($this->dbconnection, $column);
    $name = mysqli_real_escape_string($this->dbconnection, $name);

    $query = "SELECT * FROM $tablename WHERE $column = '$name'";

    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0){
        return true;
    } else {
        return false;
    }
  
}

/*------------------------------------------GET FUNCTIONS---------------------------------------------- */
// get data, 1 column only
public function getData($tablename,$column,$condition,$name){
    $tablename = mysqli_real_escape_string($this->dbconnection, $tablename);
    $column = mysqli_real_escape_string($this->dbconnection, $column);
    $condition = mysqli_real_escape_string($this->dbconnection, $condition);
    $name = mysqli_real_escape_string($this->dbconnection, $name);

    $query = "SELECT $name FROM $tablename WHERE $column = '$condition'";

    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0){
       
        $row = mysqli_fetch_array($result);
        return $row[$name];

    } else {return "failed to fetch";}

        
  
}

// get Rows 
public function getRow($tablename,$column,$condition,$orderby = null){
    $tablename = mysqli_real_escape_string($this->dbconnection, $tablename);
    $column = mysqli_real_escape_string($this->dbconnection, $column);
    $condition = mysqli_real_escape_string($this->dbconnection, $condition);
    
   
    if(isset($orderby)){
        $query = "SELECT * FROM $tablename WHERE $column = '$condition' ORDER BY $orderby";
    }else{
        $query = "SELECT * FROM $tablename WHERE $column = '$condition'";
    }

    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = array();
  


    if($resultCheck > 0){
       

            while($row = mysqli_fetch_assoc($result)){
                

                /*
                $file = 'data:image/image/png;base64,'.base64_encode($row['bannerimage']);
                $row['bannerimage'] = $file;
                */

                $data[] = $row;
                
             
            }
            return $data;
        
        
        

    } else {return "failed to fetch";}

        
  
}


// get Rows 
public function getCategories($tablename,$column,$condition,$groupby = null){
    $tablename = mysqli_real_escape_string($this->dbconnection, $tablename);
    $column = mysqli_real_escape_string($this->dbconnection, $column);
    $condition = mysqli_real_escape_string($this->dbconnection, $condition);
    
   
    if(isset($groupby)){
        $query = "SELECT * FROM $tablename WHERE $column = '$condition' GROUP BY $groupby";
    }else{
        $query = "SELECT * FROM $tablename WHERE $column = '$condition'";
    }

    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = array();
  


    if($resultCheck > 0){
       

            while($row = mysqli_fetch_assoc($result)){
                

                
                $file = 'data:image/image/png;base64,'.base64_encode($row['certificateFile']);
                $row['certificateFile'] = $file;
                

                $data[] = $row;
                
             
            }
            return $data;
        
        
        

    } else {return "failed to fetch";}

        
  
}


// getting user row from users table
public function getUserRow($tablename,$column,$condition){
    $tablename = mysqli_real_escape_string($this->dbconnection, $tablename);
    $column = mysqli_real_escape_string($this->dbconnection, $column);
    $condition = mysqli_real_escape_string($this->dbconnection, $condition);
   
   
    $query = "SELECT * FROM $tablename WHERE $column = '$condition'";

    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = array();
    $file;


    if($resultCheck > 0){
       

            while($row = mysqli_fetch_assoc($result)){
                
                //if(strpos($row['ID_FILETYPE'],"image")){
                    $file = 'data:image/image/png;base64,'.base64_encode($row['idFile']);
                    $row['idFile'] = $file;
                /*} else {
                    $file = 'data:application/pdf;base64,'.base64_encode($row['IDCARD']);
                    $row['IDCARD'] = $file;
                    
                  } 
                */

                $file = 'data:image/image/png;base64,'.base64_encode($row['userPhoto']);
                $row['userPhoto'] = $file;

                $file = 'data:image/image/png;base64,'.base64_encode($row['otherIDFile']);
                $row['otherIDFile'] = $file;

                $data[] = $row;
                
             
            }
            return $data;
        
        
        

    } else {return "failed to fetch";}

        
  
}

// get Products row 
public function getProducts($tablename,$column,$condition,$orderby = null){
    $tablename = mysqli_real_escape_string($this->dbconnection, $tablename);
    $column = mysqli_real_escape_string($this->dbconnection, $column);
    $condition = mysqli_real_escape_string($this->dbconnection, $condition);
    
   
    if(isset($orderby)){
        $query = "SELECT * FROM $tablename WHERE $column = '$condition' ORDER BY $orderby";
    }else{
        $query = "SELECT * FROM $tablename WHERE $column = '$condition'";
    }

    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = array();
  


    if($resultCheck > 0){
       

            while($row = mysqli_fetch_assoc($result)){
                

                
                $file = 'data:image/image/png;base64,'.base64_encode($row['productImage']);
                $row['productImage'] = $file;
                

                $data[] = $row;
                
             
            }
            return $data;
        
        
        

    } else {return "failed to fetch";}

        
  
}

// get Services row 
public function getServices($tablename,$column,$condition,$orderby = null){
    $tablename = mysqli_real_escape_string($this->dbconnection, $tablename);
    $column = mysqli_real_escape_string($this->dbconnection, $column);
    $condition = mysqli_real_escape_string($this->dbconnection, $condition);
    
   
    if(isset($orderby)){
        $query = "SELECT * FROM $tablename WHERE $column = '$condition' GROUP BY $orderby";
    }else{
        $query = "SELECT * FROM $tablename WHERE $column = '$condition'";
    }

    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = array();
  


    if($resultCheck > 0){
       

            while($row = mysqli_fetch_assoc($result)){
                

                
                $file = 'data:image/image/png;base64,'.base64_encode($row['certificateFile']);
                $row['certificateFile'] = $file;
                

                $data[] = $row;
                
             
            }
            return $data;
        
        
        

    } else {return "failed to fetch";}

        
  
}

// get other Services row 
public function getOtherServices(){
    $tablename = "servicesinfo";
    $column = "serviceCategory";
 
    
   

    $query = "SELECT * FROM $tablename WHERE $column != 'Home Service' AND $column !='Computer related work' AND $column !='Pasabuy'";


    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = array();
  


    if($resultCheck > 0){
       

            while($row = mysqli_fetch_assoc($result)){
                

                
                $file = 'data:image/image/png;base64,'.base64_encode($row['certificateFile']);
                $row['certificateFile'] = $file;
                

                $data[] = $row;
                
             
            }
            return $data;
        
        
        

    } else {return "failed to fetch";}

        
  
}


// get responders based on their services and location


public function getResponders($position,$municipality){

    $position= mysqli_real_escape_string($this->dbconnection, $position);
    $municipality = mysqli_real_escape_string($this->dbconnection, $municipality);

    
   

    $query = "SELECT servicesinfo.responderID, userprofile.userName FROM userprofile INNER JOIN servicesinfo ON servicesinfo.responderID = userprofile.userID WHERE servicesinfo.servicePosition = '$position' AND userprofile.municipality = '$municipality' ";
   

    $result = mysqli_query($this->dbconnection, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = array();
  


    if($resultCheck > 0){
       

            while($row = mysqli_fetch_assoc($result)){
                


                

                $data[] = $row;
                
             
            }
            return $data;
        
        
        

    } else {return "failed to fetch";}

        
  
}


/*---------------------------------UPDATE FUNCTIONS----------------------------------------------------- */

// update columns 
public function updateColumn($tablename,$column,$name,$condition,$conditionvalue){
    $tablename = mysqli_real_escape_string($this->dbconnection, $tablename);
    $column = mysqli_real_escape_string($this->dbconnection, $column);
    $condition = mysqli_real_escape_string($this->dbconnection, $condition);
    $name = mysqli_real_escape_string($this->dbconnection, $name);
    $conditionvalue = mysqli_real_escape_string($this->dbconnection, $conditionvalue);

    $query = "UPDATE $tablename SET $column = '$name' WHERE $condition = '$conditionvalue' ";

    $result = mysqli_query($this->dbconnection, $query);


        
  
}

/*--------------------------------INSERT FUNCTIONS------------------------------------------------------ */

// insert requests
public function registerRequest($requestCategory,$requestTitle,$requestDescription,$requestPrice,$deadline,$requestRequirement,$requestDifficulty,$datePosted,$requestorID){
   
    $tablename = "requests_info";


    $requestCategory = mysqli_real_escape_string($this->dbconnection, $requestCategory);
    $requestTitle = mysqli_real_escape_string($this->dbconnection, $requestTitle );
    $requestDescription = mysqli_real_escape_string($this->dbconnection, $requestDescription);
    $requestPrice = mysqli_real_escape_string($this->dbconnection, $requestPrice );
    $deadline = mysqli_real_escape_string($this->dbconnection, $deadline );
    $requestRequirement = mysqli_real_escape_string($this->dbconnection, $requestRequirement);
    $requestDifficulty = mysqli_real_escape_string($this->dbconnection, $requestDifficulty );
    $datePosted = mysqli_real_escape_string($this->dbconnection, $datePosted );
    $requestorID = mysqli_real_escape_string($this->dbconnection, $requestorID);
    $requestStatus = 'available';
    $isapproved ='';



    $query = "INSERT INTO $tablename() VALUES (0,'$requestCategory','$requestTitle','$requestDescription','$requestPrice','$datePosted','$deadline','$requestRequirement','$requestDifficulty','$requestorID','$requestStatus','$isapproved')";
    return mysqli_query($this->dbconnection, $query);

}


// insert services
public function registerService($serviceCategory,$servicePosition,$rate,$responderID,$certification,$certificateFile){
  
    $tablename = "servicesinfo";

    $serviceCategory= mysqli_real_escape_string($this->dbconnection,$serviceCategory);
    $servicePosition= mysqli_real_escape_string($this->dbconnection,$servicePosition);
    $rate= mysqli_real_escape_string($this->dbconnection,$rate);
    $responderID= mysqli_real_escape_string($this->dbconnection,$responderID);
    $certification= mysqli_real_escape_string($this->dbconnection,$certification);
    $certificateFile= mysqli_real_escape_string($this->dbconnection,$certificateFile);
    $serviceStatus = "";

    

    $query = "INSERT INTO $tablename() VALUES (0,'$serviceCategory','$servicePosition','$rate','$responderID','$certification','$certificateFile','$serviceStatus')";
    return mysqli_query($this->dbconnection, $query);

}

// insert categories
public function registerCategory($serviceCategory,$servicePosition){
    
     $tablename = "categories";
 
     $categoryName= mysqli_real_escape_string($this->dbconnection,$serviceCategory);
     $categoryPosition= mysqli_real_escape_string($this->dbconnection,$servicePosition);
     $categoryStatus = "";
 
    
     
 
     $query = "INSERT INTO $tablename() VALUES ( 0,'$categoryName','$categoryStatus','$categoryPosition')";
     return mysqli_query($this->dbconnection, $query);
 
 }

 // insert products
 public function registerProduct($servicesInfoID,$itemCategory,$productName,$productBrand,$productDescription,$productPrice,$productImage,$responderID,$productStore,$storeLocation){

	
    
     $tablename = "products";
 
     
     $servicesInfoID=mysqli_real_escape_string($this->dbconnection,$servicesInfoID);
     $itemCategory=mysqli_real_escape_string($this->dbconnection,$itemCategory);
 
     $productName=mysqli_real_escape_string($this->dbconnection,$productName);
     $productBrand=mysqli_real_escape_string($this->dbconnection,$productBrand);
     $productDescription=mysqli_real_escape_string($this->dbconnection,$productDescription);
     $productPrice=mysqli_real_escape_string($this->dbconnection,$productPrice);
     $productImage=mysqli_real_escape_string($this->dbconnection,$productImage);
     $responderID = mysqli_real_escape_string($this->dbconnection,$responderID);

     $itemStatus = "";
     
     $productStore=mysqli_real_escape_string($this->dbconnection, $productStore);
     $storeLocation=mysqli_real_escape_string($this->dbconnection,$storeLocation);
  
     
 
     $query = "INSERT INTO $tablename() VALUES ( 0,$servicesInfoID,'$itemCategory', '$productName', '$productBrand', '$productDescription', '$productPrice',' $productImage', $responderID ,'$itemStatus','$productStore','$storeLocation')";
     return mysqli_query($this->dbconnection, $query);

 
 }

}// end of class