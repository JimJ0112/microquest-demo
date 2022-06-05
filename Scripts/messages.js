
// create elements to be appended 
function createSenderElements(Number){
 
    DataNumber = Number;
    div = document.getElementById("inbox");
    
    for(var i = 0;i<DataNumber;i++){
    
    // create elements for rows
    var card = document.createElement('div');


    var data = document.createElement('td');



    // set attributes
    card.setAttribute('class','inboxCard');


    // append elements to the row
    card.appendChild(data);


    div.append(card);

    } 
    
    
} // end of function


// set positions data 
function setUsersData(array){

    var myID = sessionStorage.getItem('myID');
    var dataArray = array;
    var number = dataArray.length;
    dataArray.sort();


    var inboxCard = document.getElementsByClassName("inboxCard");
    for(var i = 0; i<number;i++){

        if (myID === dataArray[i]['messageSender']){
            inboxCard[i].innerText = dataArray[i]['messageReciever'];
            inboxCard[i].setAttribute("onclick","selectConversation('" + dataArray[i]['messageReciever'] + "')");
        } else if(myID === dataArray[i]['messageReciever']){
            inboxCard[i].innerText = dataArray[i]['messageSender'];
            inboxCard[i].setAttribute("onclick","selectConversation('" + dataArray[i]['messageSender'] + "')");
        }

        //inboxCard[i].innerText = dataArray[i]['messageSender'];
        //inboxCard[i].setAttribute("onclick","selectConversation('" + dataArray[i]['messageSender'] + "')");

    }

}


// for getting messages 
function getMessages(id){
    userID = id;
    var query = "userID="+ userID;     
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_userMessages.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload= function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            var dataArray = this.response;

            if(dataArray != "failed to fetch"){
            
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);
            var number = dataArray.length
            createSenderElements(number);
            setUsersData(dataArray);

            } else {
                console.log(dataArray);
            }


     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


// for targeting a conversation
function selectConversation(id){
    userID = id;
    headerID = document.getElementById('conversationUserID');

    headerID.innerText = userID;
    sessionStorage.setItem("selectedConversation",userID);

    setConversation();

}


function init() { 
    // This is the function the browser first runs when it's loaded.
    setConversation();
    
    // Then runs the refresh function for the first time.
    var int = self.setInterval(function () {
    setConversation();
    }, 2000); // Set the refresh() function to run every 10 seconds. [1 second would be 1000, and 1/10th of a second would be 100 etc.
}


function sendMessage(){
    headerID = document.getElementById('conversationUserID').innerText;
    recieverID = headerID;
    sender = sessionStorage.getItem('myID');
    messageBody = document.getElementById('messageBody').value;

    var query = "recieverID="+ userID + "&senderID=" + sender+"&messageBody=" + messageBody;     
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/insertMessage.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload= function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            var dataArray = this.response;

            if(dataArray != "failed to fetch"){
            
            //dataArray = JSON.parse(dataArray);
            //console.log(dataArray);
            //var number = dataArray.length
            //createSenderElements(number);
            //setUsersData(dataArray);

            } else {
                console.log(dataArray);
            }

            setConversation(sender);
     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    document.getElementById('messageBody').value = "";

}


function setConversation(){
    userID = sessionStorage.getItem("selectedConversation");
    myID = sessionStorage.getItem('myID');
    //userID = id;
    var query = "userID="+ userID+"&myID="+myID;     
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_userConversation.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload= function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            document.getElementById('conversation').innerHTML = "";

            var dataArray = this.response;

            if(dataArray != "failed to fetch"){
            
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);
            var number = dataArray.length;
            createConversationElements(number);
            setMessagesData(dataArray);


            } else {
                console.log(dataArray);
            }


     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);

    

}


// create elements to be appended 
function createConversationElements(Number){
 
    DataNumber = Number;
    div = document.getElementById("conversation");
    
    for(var i = 0;i<DataNumber;i++){
    
    // create elements for rows
    var card = document.createElement('div');


    var date = document.createElement('td');
    var sender = document.createElement('td');
    var message = document.createElement('td');
    var br= document.createElement('br');



    // set attributes
    card.setAttribute('class','messageCard');

    date.setAttribute('class','messageDate');
    sender.setAttribute('class','messageSender');
    message.setAttribute('class','message');


    // append elements to the row
    card.appendChild(br);
    card.appendChild(date);
    card.appendChild(br);
    card.appendChild(sender);
    card.appendChild(br);
    card.appendChild(message);


    div.append(card);

    } 
    
    
} // end of function

// set messages data 
function setMessagesData(array){

    var dataArray = array;
    var number = dataArray.length;

    var date = document.getElementsByClassName('messageDate');
    var sender= document.getElementsByClassName('messageSender');
    var message= document.getElementsByClassName('message');
    for(var i = 0; i<number;i++){
        
        date[i].innerText = dataArray[i]['messageDate'];
        sender[i].innerText = dataArray[i]['messageSender'];
        message[i].innerText = dataArray[i]['messageBody'];
        //message[i].setAttribute("onclick","selectConversation('" + dataArray[i]['messageBody'] + "')");

    }

}


// for closing the forms

function closeForms(){
    var fileForm = document.getElementById("fileForm");
    fileForm.style.display = "none";
}