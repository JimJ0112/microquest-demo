


// set positions data 
function setData(array){

var dataArray = array;

profilepic = document.getElementById("profilePic");

fullName=document.getElementById("fullName");
userName=document.getElementById("userName");
userEmail=document.getElementById("userEmail") ;
userType =document.getElementById("userType");



recieverUserName = document.getElementById("recieverUserName");
recieverUserName.value = dataArray[0]['userName'];


birthDate =document.getElementById("Birth date");
Address=document.getElementById("Address");
Education=document.getElementById("Education") ;


userGovID=document.getElementById("userGovID");
userGovIDFile=document.getElementById("userGovIDFile");
userGovIDNumber=document.getElementById("userGovIDNumber");

userServicesDetails=document.getElementById("userServicesDetails");


userName.innerText = dataArray[0]['userName'];
userEmail.innerText = dataArray[0]['userEmail'];
userType.innerText = dataArray[0]['userType'];


fullName.innerText = dataArray[0]['firstName'] + " " + dataArray[0]['lastName'] ;
birthDate.innerText  = dataArray[0]['birthDate'];
//Address.innerText = dataArray[0]['houseNo'] + " "+dataArray[0]['street'] + " "+ dataArray[0]['baranggay'] + " "+ dataArray[0]['municipality'];
Address.innerText = dataArray[0]['street'] + " "+ dataArray[0]['baranggay'] + " "+ dataArray[0]['municipality'];
Education.innerText = dataArray[0]['education'];


userGovID.innerText = dataArray[0]['idType'];
userGovIDNumber.innerText = dataArray[0]['idNumber'];

userGovIDFile

// for displaying profile pic 
var profileimage = new Image();
profileimage.src = dataArray[0]['userPhoto'];
profileimage.setAttribute("Id",'profileimage');
profilepic.appendChild(profileimage);


}


// for getting products for pasabuy
function getRequest(requestID){
   
    
    var requestID = requestID;
    var query = "requestID=" + requestID;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_requestInfo.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           
  

            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestInfoContent");
                var h2 = document.createElement('h2');
                h2.innerText = "Request does not exist, entered link might be broken";
                content.innerHTML = "";
                content.style.textAlign = "center";
                content.appendChild(h2);


            } else {
                


                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                //setData(dataArray);    
            }


     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


