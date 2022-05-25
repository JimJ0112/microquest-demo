// gets data from php 
function requesterAccounts(){
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("POST", "Backend/Get_requesterAccounts.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            // refresh table 
            document.getElementById("dashboardtable").innerHTML ="";
            
            var dataArray = this.response;
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);

            var number = dataArray.length;
            createElements(number);
            setData(dataArray);
     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send();
    
}// end of function

// for approving account
function approveaccount(number){
    var idnum = number;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "Backend/approveaccount.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    

    xmlhttp.onreadystatechange = function() {
        
        if (this.readyState === 4 || this.status === 200){ 
           
            // refresh table 
           document.getElementById("dashboardtable").innerHTML ="";
            
            var dataArray = this.response;
            
            console.log(dataArray);
            requesterAccounts();

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send("userID=" + idnum);
    
}// end of function


// for declining account
function declineaccount(number){
    var idnum = number;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "Backend/declineaccount.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    

    xmlhttp.onreadystatechange = function() {
        
        if (this.readyState === 4 || this.status === 200){ 
           
            // refresh table 
           document.getElementById("dashboardtable").innerHTML ="";
            
            var dataArray = this.response;
            
            console.log(dataArray);
            requesterAccounts();

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send("userID=" + idnum);
    
}// end of function
    




//function that creates table elements for user data and append it to the displayTable

function createElements(Number){
 
    DataNumber = Number;
    Table = document.getElementById("dashboardtable");
    
    for(var i = 0;i<DataNumber;i++){
    
    // create elements for rows
    row = document.createElement('tr');
    var ADDRESS = document.createElement('td');
    var BIRTHDATE = document.createElement('td');
    var EMAIL= document.createElement('td');
    var FIRSTNAME= document.createElement('td');
    var LASTNAME= document.createElement('td');
    var MIDDLENAME= document.createElement('td');
    var OCCUPATION= document.createElement('td');
    var USERTYPE= document.createElement('td');
    var Username= document.createElement('td');

    var IDCARD= document.createElement('td');
    var USERSNAPSHOT= document.createElement('td');

    var AcceptButton = document.createElement('button');
    var DeclineButton = document.createElement('button');


    // set attributes

     ADDRESS.setAttribute('class','Address');
     BIRTHDATE.setAttribute('class','Birthdate'); 
     EMAIL.setAttribute('class','email');
     FIRSTNAME.setAttribute('class','firstname');
     LASTNAME.setAttribute('class','lastname');
     MIDDLENAME.setAttribute('class','middlename');
     OCCUPATION.setAttribute('class','occupation');
     USERTYPE.setAttribute('class','usertype');
     Username.setAttribute('class','username');

    IDCARD.setAttribute('class','idcard');
    USERSNAPSHOT.setAttribute('class','usersnapshot');

    AcceptButton.setAttribute('class','Acceptbutton');
    DeclineButton.setAttribute('class','declinebutton');

    AcceptButton.innerText = "Accept";
    DeclineButton.innerText="Decline";

    // append elements to the row
    row.appendChild(USERTYPE);
    row.appendChild(Username);
    row.appendChild(FIRSTNAME);
    row.appendChild(LASTNAME);
    row.appendChild(MIDDLENAME);

    row.appendChild(EMAIL);
    row.appendChild(ADDRESS);
    row.appendChild(BIRTHDATE);
    
 
    row.appendChild(OCCUPATION);
    row.appendChild(IDCARD);
    row.appendChild(USERSNAPSHOT);

    row.appendChild(AcceptButton);
    row.appendChild(DeclineButton);



    Table.append(row);

    } 
    
    
    } // end of function


function setData(array){
        var dataArray = array;
        var Number = parseInt(dataArray.length);

        ADDRESS = document.getElementsByClassName('Address');
        BIRTHDATE = document.getElementsByClassName('Birthdate'); 
        EMAIL = document.getElementsByClassName('email');
        FIRSTNAME = document.getElementsByClassName('firstname');
        LASTNAME = document.getElementsByClassName('lastname');
        MIDDLENAME = document.getElementsByClassName('middlename');
        OCCUPATION = document.getElementsByClassName('occupation');
        USERTYPE = document.getElementsByClassName('usertype');
        Username = document.getElementsByClassName('username');
   
       IDCARD = document.getElementsByClassName('idcard');
       USERSNAPSHOT = document.getElementsByClassName('usersnapshot');
   
       AcceptButton = document.getElementsByClassName('Acceptbutton');
       DeclineButton = document.getElementsByClassName('declinebutton');


     
   

        for(var i=0;i<Number;i++){





            ADDRESS[i].innerText = dataArray[i]['ADDRESS'];
            BIRTHDATE[i].innerText = dataArray[i]['BIRTHDATE'];
            EMAIL[i].innerText = dataArray[i]['EMAIL'];
            FIRSTNAME[i].innerText = dataArray[i]['FIRSTNAME'];
            LASTNAME[i].innerText = dataArray[i]['LASTNAME'];
            MIDDLENAME[i].innerText = dataArray[i]['MIDDLENAME'];
            OCCUPATION[i].innerText = dataArray[i]['OCCUPATION'];
            USERTYPE[i].innerText = dataArray[i]['USERTYPE'];
            Username[i].innerText = dataArray[i]['Username'];

            AcceptButton[i].setAttribute('onclick','approveaccount(' + dataArray[i]['UserID'] + ')');
            DeclineButton[i].setAttribute('onclick','declineaccount(' + dataArray[i]['UserID'] + ')');;
       
            
            if(dataArray[i]['ID_FILETYPE'].includes("image")){
                var IDimg = new Image();
                IDimg.src = dataArray[i]['IDCARD'];
                IDCARD[i].appendChild(IDimg);
                IDCARD[i].setAttribute('onclick','showImage(' + dataArray[i]['UserID']+')');
                IDimg.setAttribute('class','IDimg');
            } else {

                // para pag pdf file - di pa tapos, di pa nag dididsplay pdf file
                var embed = document.createElement('object');
                embed.setAttribute('class','IDFILE');
               var file = URL.createObjectURL(new Blob([dataArray[i]['IDCARD']], {type: "application/pdf"}));
                embed.data = file;
                embed.setAttribute("type","application/pdf");
                embed.innerText="file";
                IDCARD[i].appendChild(embed);

                
                
            }


            var Snapshot= new Image();
            Snapshot.src = dataArray[i]['USERSNAPSHOT'];
            USERSNAPSHOT[i].appendChild(Snapshot);
            USERSNAPSHOT[i].setAttribute('onclick','showImage(' + dataArray[i]['UserID']+')');
            Snapshot.setAttribute('class','snapshot');
            


        }



}// end of function



    /* for requests and services  */

    // gets data from php 
function Get_requests(){
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("POST", "Backend/Get_requests.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            // refresh table 
            document.getElementById("dashboardtable").innerHTML ="";
            
            var dataArray = this.response;
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);

            var number = dataArray.length;
            createRequestElements(number);
            setRequestData(dataArray);
     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send();
    
}// end of function


function Get_services(){
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("POST", "Backend/Get_services.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 && this.status === 200 && this.responseText){ 
           
            // refresh table 
            document.getElementById("dashboardtable").innerHTML ="";
            
            var dataArray = this.response;
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);

            var number = dataArray.length;
            createServiceElements(number);
            setServiceData(dataArray);
     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send();
    
}// end of function


// creating and setting elements for requests and services

function createRequestElements(Number){
 
    DataNumber = Number;
    Table = document.getElementById("dashboardtable");
    
    for(var i = 0;i<DataNumber;i++){
    
    // create elements for rows
    var row = document.createElement('tr');

    var datePosted = document.createElement('td');
    var deadline = document.createElement('td');
    var requestCategory = document.createElement('td');
    var requestDescription = document.createElement('td');
    var requestDifficulty = document.createElement('td');
    var requestPrice = document.createElement('td');
    var requestRequirement = document.createElement('td');
   
    var requestTitle= document.createElement('td');
    var requestorID= document.createElement('td');

    var AcceptButton = document.createElement('button');
    var DeclineButton = document.createElement('button');


    // set attributes

     datePosted.setAttribute("class","datePosted"); 
     deadline.setAttribute("class","deadline"); 
     requestCategory.setAttribute("class","requestCategory"); 
     requestDescription.setAttribute("class","requestDescription"); 
     requestDifficulty.setAttribute("class","requestDifficulty"); 
     requestPrice.setAttribute("class","requestPrice"); 
     requestRequirement.setAttribute("class","requestRequirement"); 
     
     requestTitle.setAttribute("class","requestTitle"); 
     requestorID.setAttribute("class","requestorID"); 

    AcceptButton.setAttribute('class','Acceptbutton');
    DeclineButton.setAttribute('class','declinebutton');

    AcceptButton.innerText = "Accept";
    DeclineButton.innerText="Decline";

    // append elements to the row
    row.appendChild(requestCategory);
    row.appendChild(requestTitle);
    row.appendChild(requestDescription);
    row.appendChild(requestRequirement);
    row.appendChild(datePosted);
    row.appendChild(deadline);
    row.appendChild(requestDifficulty);
    row.appendChild(requestPrice);
    row.appendChild(requestorID);
    row.appendChild(AcceptButton);
    row.appendChild(DeclineButton);





    Table.append(row);

    } 
    
    
} // end of function

// set data to request elements
function setRequestData(array){
    var dataArray = array;
    var Number = parseInt(dataArray.length);

    datePosted = document.getElementsByClassName("datePosted"); 
    deadline  = document.getElementsByClassName("deadline"); 
    requestCategory  = document.getElementsByClassName("requestCategory"); 
    requestDescription = document.getElementsByClassName("requestDescription"); 
    requestDifficulty = document.getElementsByClassName("requestDifficulty"); 
    requestPrice = document.getElementsByClassName("requestPrice"); 
    requestRequirement = document.getElementsByClassName("requestRequirement"); 
    
    requestTitle = document.getElementsByClassName("requestTitle"); 
    requestorID = document.getElementsByClassName("requestorID"); 

    AcceptButton = document.getElementsByClassName('Acceptbutton');
    DeclineButton = document.getElementsByClassName('declinebutton');

    

  


 


    for(var i=0;i<Number;i++){





        datePosted[i].innerText = dataArray[i]['datePosted']; 
        deadline[i].innerText = dataArray[i]['deadline'];
        requestCategory[i].innerText = dataArray[i]['requestCategory'];
        requestDescription[i].innerText = dataArray[i]['requestDescription'];
        requestDifficulty[i].innerText = dataArray[i]['requestDifficulty'];
        requestPrice[i].innerText = "Php" +dataArray[i]['requestPrice'];
        requestRequirement[i].innerText = dataArray[i]['requestRequirement'];
        
        requestTitle[i].innerText = dataArray[i]['requestTitle'];
        requestorID[i].innerText = dataArray[i]['requestorID'];



        AcceptButton[i].setAttribute('onclick','approverequest(' + dataArray[i]['requestID'] + ')');
        DeclineButton[i].setAttribute('onclick','declinerequest(' + dataArray[i]['requestID'] + ')');;
   

        


    }



}// end of function


// for services
function createServiceElements(Number){
 
    DataNumber = Number;
    Table = document.getElementById("dashboardtable");
    
    for(var i = 0;i<DataNumber;i++){
    
    // create elements for rows
    var row = document.createElement('tr');

    var bannerimage = document.createElement('td');
    var responderID= document.createElement('td');
    var serviceCategory= document.createElement('td');
    var serviceDescription= document.createElement('td');
    var servicePrice= document.createElement('td');
    var serviceTitle= document.createElement('td');
    var serviceWorkingHour_End= document.createElement('td');
    var serviceWorkingHour_Start= document.createElement('td');


    var AcceptButton = document.createElement('button');
    var DeclineButton = document.createElement('button');


    // set attributes
     bannerimage.setAttribute('class','bannerimage');
     responderID.setAttribute('class','responderID');
     serviceCategory.setAttribute('class','serviceCategory');
     serviceDescription.setAttribute('class','serviceDescription');
     servicePrice.setAttribute('class','servicePrice');
     serviceTitle.setAttribute('class','serviceTitle');
     serviceWorkingHour_End.setAttribute('class','serviceWorkingHour_End');
     serviceWorkingHour_Start.setAttribute('class','serviceWorkingHour_Start');


    AcceptButton.setAttribute('class','Acceptbutton');
    DeclineButton.setAttribute('class','declinebutton');

    AcceptButton.innerText = "Accept";
    DeclineButton.innerText="Decline";

    // append elements to the row
    row.appendChild(serviceCategory);
    row.appendChild(serviceTitle);
    row.appendChild(serviceDescription);
    row.appendChild(serviceWorkingHour_Start);
    row.appendChild(serviceWorkingHour_End);
    row.appendChild(bannerimage);
    row.appendChild(servicePrice);
    row.appendChild(responderID);
    row.appendChild(AcceptButton);
    row.appendChild(DeclineButton);





    Table.append(row);

    } 
    
    
} // end of function

// set data to service elements

function setServiceData(array){
    var dataArray = array;
    var Number = parseInt(dataArray.length);

    var bannerimage = document.getElementsByClassName('bannerimage');
    var responderID = document.getElementsByClassName('responderID');
    var serviceCategory = document.getElementsByClassName('serviceCategory');
    var serviceDescription = document.getElementsByClassName('serviceDescription');
    var servicePrice = document.getElementsByClassName('servicePrice');
    var serviceTitle = document.getElementsByClassName('serviceTitle');
    var serviceWorkingHour_End = document.getElementsByClassName('serviceWorkingHour_End');
    var serviceWorkingHour_Start = document.getElementsByClassName('serviceWorkingHour_Start');

    AcceptButton = document.getElementsByClassName('Acceptbutton');
    DeclineButton = document.getElementsByClassName('declinebutton');


 


    for(var i=0;i<Number;i++){




     
      
        responderID[i].innerText = dataArray[i]['responderID'];
        serviceCategory[i].innerText = dataArray[i]['serviceCategory'];
        serviceDescription[i].innerText = dataArray[i]['serviceDescription'];
      
        servicePrice[i].innerText = "Php" + dataArray[i]['servicePrice'];
        serviceTitle[i].innerText = dataArray[i]['serviceTitle'];
        serviceWorkingHour_End[i].innerText= dataArray[i]['serviceWorkingHour_End'];
        serviceWorkingHour_Start[i].innerText= dataArray[i]['serviceWorkingHour_Start'];



        AcceptButton[i].setAttribute('onclick','approveservice(' + dataArray[i]['serviceID'] + ')');
        DeclineButton[i].setAttribute('onclick','declineservice(' + dataArray[i]['serviceID'] + ')');;
   

        var banner= new Image();
        banner.src = dataArray[i]['bannerimage'];
        bannerimage[i].appendChild(banner);

        //bannerimage[i].setAttribute('onclick','showImage(' + dataArray[i]['UserID']+')');
        banner.setAttribute('class','snapshot');
        


    }



}// end of function


// for approving and declining 

// for approving request
function approverequest(number){
    var idnum = number;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "Backend/approverequest.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    

    xmlhttp.onreadystatechange = function() {
        
        if (this.readyState === 4 || this.status === 200){ 
           
            // refresh table 
           document.getElementById("dashboardtable").innerHTML ="";
            
            var dataArray = this.response;
            
            console.log(dataArray);
            Get_requests();

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send("requestID=" + idnum);
    
}// end of function

// for declining request
function declinerequest(number){
    var idnum = number;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "Backend/declinerequest.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    

    xmlhttp.onreadystatechange = function() {
        
        if (this.readyState === 4 || this.status === 200){ 
           
            // refresh table 
           document.getElementById("dashboardtable").innerHTML ="";
            
            var dataArray = this.response;
            
            console.log(dataArray);
            Get_requests();

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send("requestID=" + idnum);
    
}// end of function

// for approving services
function approveservice(number){
    var idnum = number;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "Backend/approveservice.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    

    xmlhttp.onreadystatechange = function() {
        
        if (this.readyState === 4 || this.status === 200){ 
           
            // refresh table 
           document.getElementById("dashboardtable").innerHTML ="";
            
            var dataArray = this.response;
            
            console.log(dataArray);
            Get_services();

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send("serviceID=" + idnum);
    
}// end of function

// for declining services
function declineservice(number){
    var idnum = number;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "Backend/declineservice.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    

    xmlhttp.onreadystatechange = function() {
        
        if (this.readyState === 4 || this.status === 200){ 
           
            // refresh table 
           document.getElementById("dashboardtable").innerHTML ="";
            
            var dataArray = this.response;
            
            console.log(dataArray);
            Get_services();

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send("serviceID=" + idnum);
    
}// end of function



