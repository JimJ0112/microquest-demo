
function getServiceOrders(userID){
    var userID = userID;
    var query = "userID=" + userID +"&TransactionType=Service&column=responderID";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_myTransactions.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var div = document.getElementById('requestsOrdersContent');
            div.innerHTML = "";
            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestInfoContent");
                var h2 = document.createElement('h2');
                h2.innerText = "No request application";
                div.innerHTML = "";
                div.style.textAlign = "center";
                div.appendChild(h2);


            } else {
                
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                number = dataArray.length;
                createServiceOrderElements(number)
                setServiceOrdersData(dataArray);    
            }

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function



function getRequestApplications(userID){
    var userID = userID;
    var query = "userID=" + userID +"&TransactionType=Request&column=responderID";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_myTransactions.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var div = document.getElementById('requestsOrdersContent');
            div.innerHTML = "";
            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestInfoContent");
                var h2 = document.createElement('h2');
                h2.innerText = "Request does not exist, entered link might be broken";
                div.innerHTML = "";
                div.style.textAlign = "center";
                div.appendChild(h2);


            } else {
                
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                number = dataArray.length;
                createAppliedRequestsElements(number)
                setRequestsApplicationData(dataArray);    
            }

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


// create service order elements to append ------------------------------------------------------------------------

function createServiceOrderElements(number){

    var number = number;
    var div = document.getElementById('requestsOrdersContent');

    for(var i = 0; i<number; i++){
        var serviceOrderRow = document.createElement('tr');
        var serviceInfoRow = document.createElement('tr');
        var serviceOrderContainer = document.createElement('div')

        // about the transactions 
        transactionID= document.createElement('p');
        requestorID= document.createElement('p');
        RequestorName = document.createElement('p');
        price= document.createElement('p');
        rate= document.createElement('p');
        transactionInfoCol = document.createElement('td');

        // about the service 
        serviceID= document.createElement('p');
        serviceCategory= document.createElement('p');
        servicePosition= document.createElement('p');
        serviceStatus = document.createElement('p');

        transactionStartDate= document.createElement('p');
        transactionEndDate= document.createElement('p');
        transactionStatus= document.createElement('p');
        viewService = document.createElement('button');

        buttonsCol = document.createElement('td');
        cancelButton = document.createElement('button');
        AcceptButton = document.createElement('button');
        br = document.createElement('br');


        // set attributes 
        serviceOrderRow.setAttribute('class','serviceOrderRow');
        serviceInfoRow.setAttribute('class','serviceInfoRow');
        serviceOrderContainer.setAttribute('class','serviceOrderContainer');
        serviceStatus.setAttribute('class','serviceStatus');
        transactionInfoCol.setAttribute('class','transactionInfoCol');

        // about the transactions 
        transactionID.setAttribute('class','transactionID');
        requestorID.setAttribute('class','requestorID');
        RequestorName.setAttribute('class','RequestorName');
        price.setAttribute('class','price');
        rate.setAttribute('class','rate');

        // about the service 
        serviceID.setAttribute('class','serviceID');
        serviceCategory.setAttribute('class','serviceCategory');
        servicePosition.setAttribute('class','servicePosition');

        transactionStartDate.setAttribute('class','transactionStartDate');
        transactionEndDate.setAttribute('class','transactionEndDate');
        transactionStatus.setAttribute('class','transactionStatus');
        viewService.setAttribute('class','viewService');
        viewService.innerText = "View Service";


        buttonsCol.setAttribute('class','buttonsCol');
        cancelButton.setAttribute('class','cancelButton');
        AcceptButton.setAttribute('class','AcceptButton');
        AcceptButton.innerText = "Accept";
        cancelButton.innerText = "Cancel";

        // append them
        transactionInfoCol.appendChild(transactionID);
        transactionInfoCol.appendChild(serviceCategory);
        transactionInfoCol.appendChild(servicePosition);

        transactionInfoCol.appendChild(requestorID);
        transactionInfoCol.appendChild(RequestorName);
        transactionInfoCol.appendChild(price);
        transactionInfoCol.appendChild(rate);

        transactionInfoCol.appendChild(transactionStartDate);
        transactionInfoCol.appendChild(transactionEndDate);
        transactionInfoCol.appendChild(transactionStatus);
        transactionInfoCol.appendChild(rate);
        transactionInfoCol.appendChild(viewService);

        buttonsCol.appendChild(AcceptButton);
        buttonsCol.appendChild(br);
        buttonsCol.appendChild(br);
        buttonsCol.appendChild(cancelButton);


        serviceInfoRow.appendChild(serviceCategory);
        serviceInfoRow.appendChild(servicePosition);
        serviceInfoRow.appendChild(serviceID);
        serviceInfoRow.appendChild(rate);
        serviceInfoRow.appendChild(serviceStatus);

        serviceOrderRow.appendChild(transactionInfoCol);
        serviceOrderRow.appendChild(buttonsCol);
        
        serviceOrderContainer.appendChild(serviceOrderRow);
        serviceOrderContainer.appendChild(serviceInfoRow);
        
        div.appendChild(serviceOrderContainer);



        


    }
} // end of function


// set data for service orders ----------------------------------------------------------------------------------

function setServiceOrdersData(array){
    var dataArray = array;
    var number = dataArray.length;

            
    
            // about the transactions 
            transactionID= document.getElementsByClassName('transactionID');
            requestorID= document.getElementsByClassName('requestorID');
            RequestorName= document.getElementsByClassName('RequestorName');
            price= document.getElementsByClassName('price');
            rate= document.getElementsByClassName('rate');

            transactionStartDate= document.getElementsByClassName('transactionStartDate');
            transactionEndDate= document.getElementsByClassName('transactionEndDate');
            transactionStatus= document.getElementsByClassName('transactionStatus');
    
            buttonsCol= document.getElementsByClassName('buttonsCol');
            cancelButton= document.getElementsByClassName('cancelButton');
            AcceptButton= document.getElementsByClassName('AcceptButton');
            viewService = document.getElementsByClassName('viewService');

    
            // about the service 
            serviceID= document.getElementsByClassName('serviceID');
            serviceCategory= document.getElementsByClassName('serviceCategory');
            servicePosition= document.getElementsByClassName('servicePosition');
            serviceStatus = document.getElementsByClassName('serviceStatus');

            for(var i=0; i<number;i++){
                transactionID[i].innerHTML = "<b>Transaction ID: </b>"+ dataArray[i]['transactionID'];
                requestorID[i].innerHTML = "<b>Requestor ID: </b>"+ dataArray[i]['requestorID'];
                RequestorName[i].innerHTML = "<b>Requestor Name: </b>"+ dataArray[i]['RequestorName'];
                price[i].innerHTML = "<b>Price: </b> Php "+ dataArray[i]['price'];
                rate[i].innerHTML = "<b>Responder Rate: </b> Php "+ dataArray[i]['rate'];
    
                transactionStartDate[i].innerHTML = "<b>Order Date: </b>"+ dataArray[i]['transactionStartDate'];
                transactionEndDate[i].innerHTML = "<b>Order Due Date: </b>"+ dataArray[i]['transactionEndDate'];
                transactionStatus[i].innerHTML = "<b>Order Status: </b>"+ dataArray[i]['transactionStatus'];
        
                viewService[i].setAttribute('onclick','callService('+i+')');
                //cancelButton[i].innerText = dataArray[i][''];
                //AcceptButton[i].innerText = dataArray[i][''];
    
        
                // about the service 
                serviceID[i].innerHTML = "<b> Service ID: </b>"+ dataArray[i]['serviceID'];
                serviceCategory[i].innerHTML = "<b> Service Category: </b>"+ dataArray[i]['serviceCategory'];
                servicePosition[i].innerHTML = "<b> Service Type: </b>"+ dataArray[i]['servicePosition'];
                AcceptButton[i].setAttribute('onclick','updateRequestApplication('+dataArray[i]['transactionID']+",'accepted')");
                serviceStatus[i].innerHTML = "<b> Service Status: </b>"+ dataArray[i]['serviceStatus'];

                cancelButton[i].setAttribute('onclick','updateRequestApplication('+dataArray[i]['transactionID']+",'cancelled')");
            }
    

}

// to show and hide service class

function callService(number){
    var number = number;
    serviceInfoRow = document.getElementsByClassName('serviceInfoRow')[number];
    var style = window.getComputedStyle(serviceInfoRow,null).display;
      
    if(style === "none"){
        serviceInfoRow.style.display = "block";
      

    }  else if( style == "block"){
        serviceInfoRow.style.display = "none";
      
    }
    

};


//------Applied Requests---------------------------------------------------------------------------------------
function createAppliedRequestsElements(number){

    var number = number;
    var div = document.getElementById('requestsOrdersContent');

    for(var i = 0; i<number; i++){
        // create elements
        var requestRow = document.createElement('tr');
        var requestContainer = document.createElement('div');


        RequestorName = document.createElement('p');
        requestTitle = document.createElement('p');
        requestCategory = document.createElement('p');
        requestDescription= document.createElement('p');
        requestExpectedPrice= document.createElement('p');
        isNegotiable= document.createElement('p');
        datePosted= document.createElement('p');
        dueDate= document.createElement('p');
        requestStatus= document.createElement('p');

        transactionStartDate= document.createElement('p');
        transactionStatus= document.createElement('p');

        var infoCol = document.createElement('td');
        var buttonsCol = document.createElement('td');
        
        var cancelButton = document.createElement('button');

        // set element attributes
        requestRow.setAttribute('class','requestRow');
        requestContainer.setAttribute('class','requestContainer');


        RequestorName.setAttribute('class','RequestorName');
        requestTitle.setAttribute('class','requestTitle');
        requestCategory.setAttribute('class','requestCategory');
        requestDescription.setAttribute('class','requestDescription');
        requestExpectedPrice.setAttribute('class','requestExpectedPrice');
        isNegotiable.setAttribute('class','isNegotiable');
        datePosted.setAttribute('class','datePosted');
        dueDate.setAttribute('class','dueDate');
        requestStatus.setAttribute('class','requestStatus');

        transactionStartDate.setAttribute('class','transactionStartDate');
        transactionStatus.setAttribute('class','transactionStatus');

        infoCol.setAttribute('class','infoCol');
        buttonsCol.setAttribute('class','buttonsCol');
        cancelButton.setAttribute('class','cancelButton');
        cancelButton.innerText = "Cancel";

        // append elements
        infoCol.appendChild(RequestorName);
        infoCol.appendChild(requestTitle);
        infoCol.appendChild(requestCategory);
        infoCol.appendChild(requestExpectedPrice);
        infoCol.appendChild(isNegotiable);
        infoCol.appendChild(datePosted);
        infoCol.appendChild(dueDate);
        infoCol.appendChild(requestStatus);
        infoCol.appendChild(requestDescription);
        infoCol.appendChild(transactionStartDate);
        infoCol.appendChild(transactionStatus);

        buttonsCol.appendChild(cancelButton);

        requestRow.appendChild(infoCol);
        requestRow.appendChild(buttonsCol);

        requestContainer.appendChild(requestRow);
        


        
        div.appendChild(requestContainer);



        


    }
} // end of function


// set requests data
function setRequestsApplicationData(array){
    var dataArray = array;
    var number = dataArray.length;

    RequestorName = document.getElementsByClassName('RequestorName');
    requestTitle= document.getElementsByClassName('requestTitle');
    requestCategory= document.getElementsByClassName('requestCategory');
    requestDescription= document.getElementsByClassName('requestDescription');
    requestExpectedPrice= document.getElementsByClassName('requestExpectedPrice');
    isNegotiable= document.getElementsByClassName('isNegotiable');
    datePosted= document.getElementsByClassName('datePosted');
    dueDate= document.getElementsByClassName('dueDate');
    requestStatus= document.getElementsByClassName('requestStatus');

    transactionStartDate= document.getElementsByClassName('transactionStartDate');
    transactionStatus= document.getElementsByClassName('transactionStatus');

    infoCol= document.getElementsByClassName('infoCol');
    buttonsCol= document.getElementsByClassName('buttonsCol');
    cancelButton = document.getElementsByClassName('cancelButton');
    
    


    for(var i=0; i<number;i++){

        RequestorName[i].innerHTML = "<b> Requestor Name: </b>"+dataArray[i]['RequestorName'];
        requestTitle[i].innerHTML = "<b> Title: </b>"+dataArray[i]['requestTitle'];
        requestCategory[i].innerHTML = "<b> Category:  </b>"+dataArray[i]['requestCategory'];
        requestDescription[i].innerHTML = "<b> Description: </b>"+dataArray[i]['requestDescription'];
        requestExpectedPrice[i].innerHTML = "<b> Expected Price:  </b> Php "+dataArray[i]['requestExpectedPrice'];
        isNegotiable[i].innerHTML = dataArray[i]['isNegotiable'];
        datePosted[i].innerHTML = "<b> Date Posted: </b>"+dataArray[i]['datePosted'];
        dueDate[i].innerHTML = "<b> Due Date: </b>"+dataArray[i]['dueDate'];
        requestStatus[i].innerHTML = "<b> Request Status:  </b>"+dataArray[i]['requestStatus'];
    
        transactionStartDate[i].innerHTML = "<b>Application Date: </b>"+dataArray[i]['transactionStartDate'];
        transactionStatus[i].innerHTML = "<b>Application Status: </b>"+dataArray[i]['transactionStatus'];
        cancelButton[i].setAttribute('onclick','updateRequestApplication('+dataArray[i]['transactionID']+",'cancelled')");
    
    }
    

}

/*------------------------------------------------------------------------------------------------------- */
// accept requests 
function updateRequestApplication(transactionID,update){
    var transactionID = transactionID;
    var update = update;
    var query = "transactionID=" + transactionID+"&update="+update;
    console.log(query);
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/UpdateTransaction.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            var dataArray = this.response;
            console.log(dataArray);
 
            

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    var myID = sessionStorage.getItem('myID');
    getRequestApplications(myID);
    
}// end of function

// --------------------- For cancelled transactions --------------------------------------------------------------
function getCancelledRequests(userID){
    var userID = userID;
    var query = "userID=" + userID +"&TransactionType=Request&column=responderID";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_cancelledTransactions.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var div = document.getElementById('requestsOrdersContent');
            div.innerHTML = "";
            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestInfoContent");
                var h2 = document.createElement('h2');
                h2.innerText = "You currently have no cancelled request";
                div.innerHTML = "";
                div.style.textAlign = "center";
                div.appendChild(h2);
                console.log(dataArray);

            } else {
                
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                number = dataArray.length;
                createNoButtonAppliedRequestsElements(number)
                setNoButtonRequestsApplicationData(dataArray);    
            }

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


function getCancelledServices(userID){
    var userID = userID;
    var query = "userID=" + userID +"&TransactionType=Service&column=responderID";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_cancelledTransactions.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var div = document.getElementById('requestsOrdersContent');
            div.innerHTML = "";
            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestInfoContent");
                var h2 = document.createElement('h2');
                h2.innerText = "You currently have no cancelled service orders";
                div.innerHTML = "";
                div.style.textAlign = "center";
                div.appendChild(h2);


            } else {
                
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                number = dataArray.length;
                createNoButtonServiceOrderElements(number)
                setNoButtonServiceOrdersData(dataArray);    
            }

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function

//--------------accepted requests -------------------------------------------------------------------------------

function getAcceptedRequestApplications(userID){
    var userID = userID;
    var query = "userID=" + userID +"&TransactionType=Request&column=responderID";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_acceptedTransactions.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var div = document.getElementById('requestsOrdersContent');
            div.innerHTML = "";
            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestInfoContent");
                var h2 = document.createElement('h2');
                h2.innerText = "You currently have no accepted requests";
                div.innerHTML = "";
                div.style.textAlign = "center";
                div.appendChild(h2);


            } else {
                
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                number = dataArray.length;
                createAcceptedRequestElements(number);
                setRequestsApplicationData(dataArray);  
            }

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function

function getAcceptedServices(userID){
    var userID = userID;
    var query = "userID=" + userID +"&TransactionType=Service&column=responderID";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_acceptedTransactions.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var div = document.getElementById('requestsOrdersContent');
            div.innerHTML = "";
            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestInfoContent");
                var h2 = document.createElement('h2');
                h2.innerText = "You currently have no accepted service orders";
                div.innerHTML = "";
                div.style.textAlign = "center";
                div.appendChild(h2);


            } else {
                
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                number = dataArray.length;
                createAcceptedServiceOrderElements(number)
                setAcceptedServiceOrdersData(dataArray);    
            }

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function

/*----Completed------------------------------------------------------------------------------------------ */



function getCompletedRequests(userID){
    var userID = userID;
    var query = "userID=" + userID +"&TransactionType=Request&column=responderID";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_completedTransactions.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var div = document.getElementById('requestsOrdersContent');
            div.innerHTML = "";
            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestsOrdersContent");
                var h2 = document.createElement('h2');
                h2.innerText = "You currently have no completed requests";
                div.innerHTML = "";
                div.style.textAlign = "center";
                div.appendChild(h2);


            } else {
                
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                number = dataArray.length;
                createNoButtonAppliedRequestsElements(number)
                setNoButtonRequestsApplicationData(dataArray);  
            }

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


function getCompletedService(userID){
    var userID = userID;
    var query = "userID=" + userID +"&TransactionType=Service&column=responderID";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_completedTransactions.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var div = document.getElementById('requestsOrdersContent');
            div.innerHTML = "";
            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestInfoContent");
                var h2 = document.createElement('h2');
                h2.innerText = "You currently have no completed service orders";
                div.innerHTML = "";
                div.style.textAlign = "center";
                div.appendChild(h2);


            } else {
                
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                number = dataArray.length;
                createNoButtonServiceOrderElements(number)
                setNoButtonServiceOrdersData(dataArray);  
            }

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


/* ------------------------------------- create elements with no buttons------------------------------------ */

// create service order elements to append ------------------------------------------------------------------------

function createNoButtonServiceOrderElements(number){

    var number = number;
    var div = document.getElementById('requestsOrdersContent');

    for(var i = 0; i<number; i++){
        var serviceOrderRow = document.createElement('tr');
        var serviceInfoRow = document.createElement('tr');
        var serviceOrderContainer = document.createElement('div')

        // about the transactions 
        transactionID= document.createElement('p');
        requestorID= document.createElement('p');
        RequestorName = document.createElement('p');
        price= document.createElement('p');
        rate= document.createElement('p');
        transactionInfoCol = document.createElement('td');

        // about the service 
        serviceID= document.createElement('p');
        serviceCategory= document.createElement('p');
        servicePosition= document.createElement('p');
        serviceStatus = document.createElement('p');

        transactionStartDate= document.createElement('p');
        transactionEndDate= document.createElement('p');
        transactionStatus= document.createElement('p');
        viewService = document.createElement('button');

        buttonsCol = document.createElement('td');
        cancelButton = document.createElement('button');
        AcceptButton = document.createElement('button');
        br = document.createElement('br');


        // set attributes 
        serviceOrderRow.setAttribute('class','serviceOrderRow');
        serviceInfoRow.setAttribute('class','serviceInfoRow');
        serviceOrderContainer.setAttribute('class','serviceOrderContainer');
        serviceStatus.setAttribute('class','serviceStatus');
        transactionInfoCol.setAttribute('class','transactionInfoCol');

        // about the transactions 
        transactionID.setAttribute('class','transactionID');
        requestorID.setAttribute('class','requestorID');
        RequestorName.setAttribute('class','RequestorName');
        price.setAttribute('class','price');
        rate.setAttribute('class','rate');

        // about the service 
        serviceID.setAttribute('class','serviceID');
        serviceCategory.setAttribute('class','serviceCategory');
        servicePosition.setAttribute('class','servicePosition');

        transactionStartDate.setAttribute('class','transactionStartDate');
        transactionEndDate.setAttribute('class','transactionEndDate');
        transactionStatus.setAttribute('class','transactionStatus');
        viewService.setAttribute('class','viewService');
        viewService.innerText = "View Service";


        buttonsCol.setAttribute('class','buttonsCol');
        cancelButton.setAttribute('class','cancelButton');
        AcceptButton.setAttribute('class','AcceptButton');
        AcceptButton.innerText = "Accept";
        cancelButton.innerText = "Cancel";

        // append them
        transactionInfoCol.appendChild(transactionID);
        transactionInfoCol.appendChild(serviceCategory);
        transactionInfoCol.appendChild(servicePosition);

        transactionInfoCol.appendChild(requestorID);
        transactionInfoCol.appendChild(RequestorName);
        transactionInfoCol.appendChild(price);
        transactionInfoCol.appendChild(rate);

        transactionInfoCol.appendChild(transactionStartDate);
        transactionInfoCol.appendChild(transactionEndDate);
        transactionInfoCol.appendChild(transactionStatus);
        transactionInfoCol.appendChild(rate);
        transactionInfoCol.appendChild(viewService);

        //buttonsCol.appendChild(AcceptButton);
       // buttonsCol.appendChild(br);
       // buttonsCol.appendChild(br);
       // buttonsCol.appendChild(cancelButton);


        serviceInfoRow.appendChild(serviceCategory);
        serviceInfoRow.appendChild(servicePosition);
        serviceInfoRow.appendChild(serviceID);
        serviceInfoRow.appendChild(rate);
        serviceInfoRow.appendChild(serviceStatus);

        serviceOrderRow.appendChild(transactionInfoCol);
        serviceOrderRow.appendChild(buttonsCol);
        
        serviceOrderContainer.appendChild(serviceOrderRow);
        serviceOrderContainer.appendChild(serviceInfoRow);
        
        div.appendChild(serviceOrderContainer);



        


    }
} // end of function

//-----------for requests-------------------------------------

function createNoButtonAppliedRequestsElements(number){

    var number = number;
    var div = document.getElementById('requestsOrdersContent');

    for(var i = 0; i<number; i++){
        // create elements
        var requestRow = document.createElement('tr');
        var requestContainer = document.createElement('div');


        RequestorName = document.createElement('p');
        requestTitle = document.createElement('p');
        requestCategory = document.createElement('p');
        requestDescription= document.createElement('p');
        requestExpectedPrice= document.createElement('p');
        isNegotiable= document.createElement('p');
        datePosted= document.createElement('p');
        dueDate= document.createElement('p');
        requestStatus= document.createElement('p');

        transactionStartDate= document.createElement('p');
        transactionStatus= document.createElement('p');

        var infoCol = document.createElement('td');
        var buttonsCol = document.createElement('td');
        
        var cancelButton = document.createElement('button');

        // set element attributes
        requestRow.setAttribute('class','requestRow');
        requestContainer.setAttribute('class','requestContainer');


        RequestorName.setAttribute('class','RequestorName');
        requestTitle.setAttribute('class','requestTitle');
        requestCategory.setAttribute('class','requestCategory');
        requestDescription.setAttribute('class','requestDescription');
        requestExpectedPrice.setAttribute('class','requestExpectedPrice');
        isNegotiable.setAttribute('class','isNegotiable');
        datePosted.setAttribute('class','datePosted');
        dueDate.setAttribute('class','dueDate');
        requestStatus.setAttribute('class','requestStatus');

        transactionStartDate.setAttribute('class','transactionStartDate');
        transactionStatus.setAttribute('class','transactionStatus');

        infoCol.setAttribute('class','infoCol');
        buttonsCol.setAttribute('class','buttonsCol');
        cancelButton.setAttribute('class','cancelButton');
        cancelButton.innerText = "Cancel";

        // append elements
        infoCol.appendChild(RequestorName);
        infoCol.appendChild(requestTitle);
        infoCol.appendChild(requestCategory);
        infoCol.appendChild(requestExpectedPrice);
        infoCol.appendChild(isNegotiable);
        infoCol.appendChild(datePosted);
        infoCol.appendChild(dueDate);
        infoCol.appendChild(requestStatus);
        infoCol.appendChild(requestDescription);
        infoCol.appendChild(transactionStartDate);
        infoCol.appendChild(transactionStatus);

        //buttonsCol.appendChild(cancelButton);

        requestRow.appendChild(infoCol);
        requestRow.appendChild(buttonsCol);

        requestContainer.appendChild(requestRow);
        


        
        div.appendChild(requestContainer);



        


    }
} // end of function

// set data for no buttons

function setNoButtonServiceOrdersData(array){
    var dataArray = array;
    var number = dataArray.length;

            
    
            // about the transactions 
            transactionID= document.getElementsByClassName('transactionID');
            requestorID= document.getElementsByClassName('requestorID');
            RequestorName= document.getElementsByClassName('RequestorName');
            price= document.getElementsByClassName('price');
            rate= document.getElementsByClassName('rate');

            transactionStartDate= document.getElementsByClassName('transactionStartDate');
            transactionEndDate= document.getElementsByClassName('transactionEndDate');
            transactionStatus= document.getElementsByClassName('transactionStatus');
    
            buttonsCol= document.getElementsByClassName('buttonsCol');
            //cancelButton= document.getElementsByClassName('cancelButton');
            //AcceptButton= document.getElementsByClassName('AcceptButton');
            viewService = document.getElementsByClassName('viewService');

    
            // about the service 
            serviceID= document.getElementsByClassName('serviceID');
            serviceCategory= document.getElementsByClassName('serviceCategory');
            servicePosition= document.getElementsByClassName('servicePosition');
            serviceStatus = document.getElementsByClassName('serviceStatus');

            for(var i=0; i<number;i++){
                transactionID[i].innerHTML = "<b>Transaction ID: </b>"+ dataArray[i]['transactionID'];
                requestorID[i].innerHTML = "<b>Requestor ID: </b>"+ dataArray[i]['requestorID'];
                RequestorName[i].innerHTML = "<b>Requestor Name: </b>"+ dataArray[i]['RequestorName'];
                price[i].innerHTML = "<b>Price: </b> Php "+ dataArray[i]['price'];
                rate[i].innerHTML = "<b>Responder Rate: </b> Php "+ dataArray[i]['rate'];
    
                transactionStartDate[i].innerHTML = "<b>Order Date: </b>"+ dataArray[i]['transactionStartDate'];
                transactionEndDate[i].innerHTML = "<b>Order Due Date: </b>"+ dataArray[i]['transactionEndDate'];
                transactionStatus[i].innerHTML = "<b>Order Status: </b>"+ dataArray[i]['transactionStatus'];
        
                viewService[i].setAttribute('onclick','callService('+i+')');
                //cancelButton[i].innerText = dataArray[i][''];
                //AcceptButton[i].innerText = dataArray[i][''];
    
        
                // about the service 
                serviceID[i].innerHTML = "<b> Service ID: </b>"+ dataArray[i]['serviceID'];
                serviceCategory[i].innerHTML = "<b> Service Category: </b>"+ dataArray[i]['serviceCategory'];
                servicePosition[i].innerHTML = "<b> Service Type: </b>"+ dataArray[i]['servicePosition'];
                //AcceptButton[i].setAttribute('onclick','updateRequestApplication('+dataArray[i]['transactionID']+",'accepted')");
                serviceStatus[i].innerHTML = "<b> Service Status: </b>"+ dataArray[i]['serviceStatus'];

                //cancelButton[i].setAttribute('onclick','updateRequestApplication('+dataArray[i]['transactionID']+",'cancelled')");
            }
    

}



// set requests data
function setNoButtonRequestsApplicationData(array){
    var dataArray = array;
    var number = dataArray.length;

    RequestorName = document.getElementsByClassName('RequestorName');
    requestTitle= document.getElementsByClassName('requestTitle');
    requestCategory= document.getElementsByClassName('requestCategory');
    requestDescription= document.getElementsByClassName('requestDescription');
    requestExpectedPrice= document.getElementsByClassName('requestExpectedPrice');
    isNegotiable= document.getElementsByClassName('isNegotiable');
    datePosted= document.getElementsByClassName('datePosted');
    dueDate= document.getElementsByClassName('dueDate');
    requestStatus= document.getElementsByClassName('requestStatus');

    transactionStartDate= document.getElementsByClassName('transactionStartDate');
    transactionStatus= document.getElementsByClassName('transactionStatus');

    infoCol= document.getElementsByClassName('infoCol');
    buttonsCol= document.getElementsByClassName('buttonsCol');
    //cancelButton = document.getElementsByClassName('cancelButton');
    
    


    for(var i=0; i<number;i++){

        RequestorName[i].innerHTML = "<b> Requestor Name: </b>"+dataArray[i]['RequestorName'];
        requestTitle[i].innerHTML = "<b> Title: </b>"+dataArray[i]['requestTitle'];
        requestCategory[i].innerHTML = "<b> Category:  </b>"+dataArray[i]['requestCategory'];
        requestDescription[i].innerHTML = "<b> Description: </b>"+dataArray[i]['requestDescription'];
        requestExpectedPrice[i].innerHTML = "<b> Expected Price:  </b> Php "+dataArray[i]['requestExpectedPrice'];
        isNegotiable[i].innerHTML = dataArray[i]['isNegotiable'];
        datePosted[i].innerHTML = "<b> Date Posted: </b>"+dataArray[i]['datePosted'];
        dueDate[i].innerHTML = "<b> Due Date: </b>"+dataArray[i]['dueDate'];
        requestStatus[i].innerHTML = "<b> Request Status:  </b>"+dataArray[i]['requestStatus'];
    
        transactionStartDate[i].innerHTML = "<b>Application Date: </b>"+dataArray[i]['transactionStartDate'];
        transactionStatus[i].innerHTML = "<b>Application Status: </b>"+dataArray[i]['transactionStatus'];
       // cancelButton[i].setAttribute('onclick','updateRequestApplication('+dataArray[i]['transactionID']+",'cancelled')");
    
    }
    

}



//--- create elements without buttons --------------------------------------------------------------------------------

// create accepted request elements for responder
//-----------for requests-------------------------------------

function createAcceptedRequestElements(number){

    var number = number;
    var div = document.getElementById('requestsOrdersContent');

    for(var i = 0; i<number; i++){
        // create elements
        var requestRow = document.createElement('tr');
        var requestContainer = document.createElement('div');


        RequestorName = document.createElement('p');
        requestTitle = document.createElement('p');
        requestCategory = document.createElement('p');
        requestDescription= document.createElement('p');
        requestExpectedPrice= document.createElement('p');
        isNegotiable= document.createElement('p');
        datePosted= document.createElement('p');
        dueDate= document.createElement('p');
        requestStatus= document.createElement('p');

        transactionStartDate= document.createElement('p');
        transactionStatus= document.createElement('p');

        var infoCol = document.createElement('td');
        var buttonsCol = document.createElement('td');
        
        var cancelButton = document.createElement('button');
        var completeButton = document.createElement('button');

        // set element attributes
        requestRow.setAttribute('class','requestRow');
        requestContainer.setAttribute('class','requestContainer');


        RequestorName.setAttribute('class','RequestorName');
        requestTitle.setAttribute('class','requestTitle');
        requestCategory.setAttribute('class','requestCategory');
        requestDescription.setAttribute('class','requestDescription');
        requestExpectedPrice.setAttribute('class','requestExpectedPrice');
        isNegotiable.setAttribute('class','isNegotiable');
        datePosted.setAttribute('class','datePosted');
        dueDate.setAttribute('class','dueDate');
        requestStatus.setAttribute('class','requestStatus');

        transactionStartDate.setAttribute('class','transactionStartDate');
        transactionStatus.setAttribute('class','transactionStatus');

        infoCol.setAttribute('class','infoCol');
        buttonsCol.setAttribute('class','buttonsCol');
        cancelButton.setAttribute('class','cancelButton');
        completeButton.setAttribute('class','completeButton');
        cancelButton.innerText = "Cancel";
        completeButton.innerText = "Complete";

        // append elements
        infoCol.appendChild(RequestorName);
        infoCol.appendChild(requestTitle);
        infoCol.appendChild(requestCategory);
        infoCol.appendChild(requestExpectedPrice);
        infoCol.appendChild(isNegotiable);
        infoCol.appendChild(datePosted);
        infoCol.appendChild(dueDate);
        infoCol.appendChild(requestStatus);
        infoCol.appendChild(requestDescription);
        infoCol.appendChild(transactionStartDate);
        infoCol.appendChild(transactionStatus);

        buttonsCol.appendChild(cancelButton);
        buttonsCol.appendChild(completeButton);

        requestRow.appendChild(infoCol);
        requestRow.appendChild(buttonsCol);

        requestContainer.appendChild(requestRow);
        


        
        div.appendChild(requestContainer);



        


    }
} // end of function


// create accepted orders elements
function createAcceptedServiceOrderElements(number){

    var number = number;
    var div = document.getElementById('requestsOrdersContent');

    for(var i = 0; i<number; i++){
        var serviceOrderRow = document.createElement('tr');
        var serviceInfoRow = document.createElement('tr');
        var serviceOrderContainer = document.createElement('div')

        // about the transactions 
        transactionID= document.createElement('p');
        requestorID= document.createElement('p');
        RequestorName = document.createElement('p');
        price= document.createElement('p');
        rate= document.createElement('p');
        transactionInfoCol = document.createElement('td');

        // about the service 
        serviceID= document.createElement('p');
        serviceCategory= document.createElement('p');
        servicePosition= document.createElement('p');
        serviceStatus = document.createElement('p');

        transactionStartDate= document.createElement('p');
        transactionEndDate= document.createElement('p');
        transactionStatus= document.createElement('p');
        viewService = document.createElement('button');

        buttonsCol = document.createElement('td');
        cancelButton = document.createElement('button');
        completeButton = document.createElement('button');
        br = document.createElement('br');


        // set attributes 
        serviceOrderRow.setAttribute('class','serviceOrderRow');
        serviceInfoRow.setAttribute('class','serviceInfoRow');
        serviceOrderContainer.setAttribute('class','serviceOrderContainer');
        serviceStatus.setAttribute('class','serviceStatus');
        transactionInfoCol.setAttribute('class','transactionInfoCol');

        // about the transactions 
        transactionID.setAttribute('class','transactionID');
        requestorID.setAttribute('class','requestorID');
        RequestorName.setAttribute('class','RequestorName');
        price.setAttribute('class','price');
        rate.setAttribute('class','rate');

        // about the service 
        serviceID.setAttribute('class','serviceID');
        serviceCategory.setAttribute('class','serviceCategory');
        servicePosition.setAttribute('class','servicePosition');

        transactionStartDate.setAttribute('class','transactionStartDate');
        transactionEndDate.setAttribute('class','transactionEndDate');
        transactionStatus.setAttribute('class','transactionStatus');
        viewService.setAttribute('class','viewService');
        viewService.innerText = "View Service";


        buttonsCol.setAttribute('class','buttonsCol');
        cancelButton.setAttribute('class','cancelButton');
        completeButton.setAttribute('class','completeButton');
        completeButton.innerText = "Complete";
        cancelButton.innerText = "Cancel";

        // append them
        transactionInfoCol.appendChild(transactionID);
        transactionInfoCol.appendChild(serviceCategory);
        transactionInfoCol.appendChild(servicePosition);

        transactionInfoCol.appendChild(requestorID);
        transactionInfoCol.appendChild(RequestorName);
        transactionInfoCol.appendChild(price);
        transactionInfoCol.appendChild(rate);

        transactionInfoCol.appendChild(transactionStartDate);
        transactionInfoCol.appendChild(transactionEndDate);
        transactionInfoCol.appendChild(transactionStatus);
        transactionInfoCol.appendChild(rate);
        transactionInfoCol.appendChild(viewService);

        buttonsCol.appendChild(completeButton);
        buttonsCol.appendChild(br);
        buttonsCol.appendChild(br);
        buttonsCol.appendChild(cancelButton);


        serviceInfoRow.appendChild(serviceCategory);
        serviceInfoRow.appendChild(servicePosition);
        serviceInfoRow.appendChild(serviceID);
        serviceInfoRow.appendChild(rate);
        serviceInfoRow.appendChild(serviceStatus);

        serviceOrderRow.appendChild(transactionInfoCol);
        serviceOrderRow.appendChild(buttonsCol);
        
        serviceOrderContainer.appendChild(serviceOrderRow);
        serviceOrderContainer.appendChild(serviceInfoRow);
        
        div.appendChild(serviceOrderContainer);



        


    }
} // end of function

function setAcceptedServiceOrdersData(array){
    var dataArray = array;
    var number = dataArray.length;

            
    
            // about the transactions 
            transactionID= document.getElementsByClassName('transactionID');
            requestorID= document.getElementsByClassName('requestorID');
            RequestorName= document.getElementsByClassName('RequestorName');
            price= document.getElementsByClassName('price');
            rate= document.getElementsByClassName('rate');


            transactionStartDate= document.getElementsByClassName('transactionStartDate');
            transactionEndDate= document.getElementsByClassName('transactionEndDate');
            transactionStatus= document.getElementsByClassName('transactionStatus');
    
            buttonsCol= document.getElementsByClassName('buttonsCol');
            cancelButton= document.getElementsByClassName('cancelButton');
            completeButton= document.getElementsByClassName('completeButton');
            viewService = document.getElementsByClassName('viewService');

    
            // about the service 
            serviceID= document.getElementsByClassName('serviceID');
            serviceCategory= document.getElementsByClassName('serviceCategory');
            servicePosition= document.getElementsByClassName('servicePosition');
            serviceStatus = document.getElementsByClassName('serviceStatus');

            for(var i=0; i<number;i++){
                transactionID[i].innerHTML = "<b>Transaction ID: </b>"+ dataArray[i]['transactionID'];
                requestorID[i].innerHTML = "<b>Requestor ID: </b>"+ dataArray[i]['requestorID'];
                RequestorName[i].innerHTML = "<b>Requestor Name: </b>"+ dataArray[i]['RequestorName'];
                price[i].innerHTML = "<b>Price: </b> Php "+ dataArray[i]['price'];
                rate[i].innerHTML = "<b>Responder Rate: </b> Php "+ dataArray[i]['rate'];
    
                transactionStartDate[i].innerHTML = "<b>Order Date: </b>"+ dataArray[i]['transactionStartDate'];
                transactionEndDate[i].innerHTML = "<b>Order Due Date: </b>"+ dataArray[i]['transactionEndDate'];
                transactionStatus[i].innerHTML = "<b>Order Status: </b>"+ dataArray[i]['transactionStatus'];
        
                viewService[i].setAttribute('onclick','callService('+i+')');
                //cancelButton[i].innerText = dataArray[i][''];
                //AcceptButton[i].innerText = dataArray[i][''];
    
        
                // about the service 
                serviceID[i].innerHTML = "<b> Service ID: </b>"+ dataArray[i]['serviceID'];
                serviceCategory[i].innerHTML = "<b> Service Category: </b>"+ dataArray[i]['serviceCategory'];
                servicePosition[i].innerHTML = "<b> Service Type: </b>"+ dataArray[i]['servicePosition'];
                completeButton[i].setAttribute('onclick','updateRequestApplication('+dataArray[i]['transactionID']+",'completed')");
                serviceStatus[i].innerHTML = "<b> Service Status: </b>"+ dataArray[i]['serviceStatus'];

                cancelButton[i].setAttribute('onclick','updateRequestApplication('+dataArray[i]['transactionID']+",'cancelled')");
            }
    

}