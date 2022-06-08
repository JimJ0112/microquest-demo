


// set positions data 
function setData(array){

var dataArray = array;


/*message me portion */
requestorImageContainer = document.getElementById("requestorImageContainer");
requestorName= document.getElementById("requestorName");
recieverID = document.getElementById("recieverID");
recieverUserName= document.getElementById("recieverUserName");
 
/*request info portion */
requestTitle= document.getElementById("requestTitle");

category= document.getElementById("category");


requestorLocation= document.getElementById( "requestorLocation");
datePosted = document.getElementById("datePosted");
dueDate =document.getElementById("dueDate");
expectedPrice =document.getElementById("expectedPrice");
isNegotiable=document.getElementById("isNegotiable");



requestNotes =document.getElementById("requestNotes");












// set data to elements
/*message me portion */
requestorName.innerText= dataArray[0]['userName'];
requestorName.href="Public_Profile.php?userID=" +  dataArray[0]['requestorID'] + "&userType=Requestor";
recieverID.value = dataArray[0]['requestorID'];
recieverUserName.value= dataArray[0]['userName'];

/*request info portion */
requestTitle.innerText= dataArray[0]['requestTitle'];

category.innerText= dataArray[0]['requestCategory'];


requestorLocation.innerText= dataArray[0]['requestorMunicipality'];
datePosted.innerText = dataArray[0]['datePosted'];
dueDate.innerText = dataArray[0]['dueDate'];
expectedPrice.innerText = dataArray[0]['requestExpectedPrice'];
isNegotiable.innerText = dataArray[0]['isNegotiable'];



requestNotes.innerText = dataArray[0]['requestDescription'];


// for displaying profile pic 
var profileimage = new Image();
profileimage.src = dataArray[0]['userPhoto'];
profileimage.setAttribute("Id",'requestorProfile');
requestorImageContainer.appendChild(profileimage);


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
                setData(dataArray);    
            }


     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function

function checkText(){
    send = document.getElementById('send');
    messageBody = document.getElementById('requestInfoMessageBody');

    if(messageBody.value === "" || messageBody.value <= "   "){
        send.disabled = true;
    } else{
        send.disabled = false;
    }
}

