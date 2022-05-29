
// create elements to be appended 
function createServiceElements(Number){
 
    DataNumber = Number;
    div = document.getElementById("RequestsContainer");
   
    
    for(var i = 0;i<DataNumber;i++){
    
    // create elements for rows
    var card = document.createElement('div');


    var dueDate= document.createElement('td');
    var isNegotiable= document.createElement('td');
    var requestCategory= document.createElement('td');
    var requestDescription= document.createElement('td');
    var requestExpectedPrice= document.createElement('td');
    var requestID= document.createElement('td');
    var requestTitle= document.createElement('td');
    var requestorID = document.createElement('td');



    // set attributes
    card.setAttribute('class','requestCard');

    
    dueDate.setAttribute('class','dueDate');
    isNegotiable.setAttribute('class','isNegotiable');
    requestCategory.setAttribute('class','requestCategory');
    requestDescription.setAttribute('class','requestDescription');
    requestExpectedPrice.setAttribute('class','requestExpectedPrice');
    requestID.setAttribute('class','requestID');
    requestTitle.setAttribute('class','requestTitle');
    requestorID.setAttribute('class','requestorID');




    // append elements to the row
    card.appendChild(requestID);
    card.appendChild(requestCategory);
    card.appendChild(requestTitle);
    card.appendChild(requestDescription);
    card.appendChild(requestExpectedPrice);
    card.appendChild(isNegotiable);
    card.appendChild(dueDate);
    card.appendChild(requestorID);


    div.append(card);

    } 
    
    
} // end of function


// set positions data 
function setData(array){

    var dataArray = array;
    var number = dataArray.length;

    var serviceCard = document.getElementsByClassName("requestCard");
    var dueDate = document.getElementsByClassName( 'dueDate');
    var isNegotiable = document.getElementsByClassName('isNegotiable');
    var requestCategory = document.getElementsByClassName( 'requestCategory');
    var requestDescription = document.getElementsByClassName('requestDescription');
    var requestExpectedPrice = document.getElementsByClassName('requestExpectedPrice');
    var requestID = document.getElementsByClassName('requestID');
    var requestTitle = document.getElementsByClassName('requestTitle');
    var requestorID= document.getElementsByClassName('requestorID');



    for(var i = 0; i<number;i++){
        
         dueDate[i].innerText= dataArray[i]['dueDate'];
         isNegotiable[i].innerText = dataArray[i]['isNegotiable'];
         requestCategory[i].innerText = dataArray[i]['requestCategory'];
         requestDescription[i].innerText = dataArray[i]['requestDescription'];
         requestExpectedPrice[i].innerText = dataArray[i]['requestExpectedPrice'];
         requestID[i].innerText = dataArray[i]['requestID'];
         requestTitle[i].innerText = dataArray[i]['requestTitle'];
         requestorID[i].innerText = dataArray[i]['requestorID'];

    }

}


// for getting products for pasabuy
function getRequests(){
   
    
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_requests.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 || this.status === 200){ 
           


            var dataArray = this.response;
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);

            var number = dataArray.length;
            createServiceElements(number);
            setData(dataArray);


     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send();
    
}// end of function





