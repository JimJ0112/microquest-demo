
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
    var requestorUserName = document.createElement('a');
    var requestorLocation = document.createElement('td');
    var viewRequest = document.createElement('a');
    var userPhotoDiv = document.createElement('div');
    var requestBannerDiv = document.createElement('div');


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
    requestorUserName.setAttribute('class','requestorUserName');
    requestorLocation.setAttribute('class','requestorLocation');
    viewRequest.setAttribute('class','viewRequest');
    viewRequest.innerText = "View More";
    userPhotoDiv.setAttribute('class','userPhotoDiv');
    requestBannerDiv.setAttribute('class','requestBannerDiv');



    // append elements to the row
    card.appendChild(requestID);
    card.appendChild(requestBannerDiv);
    card.appendChild(requestCategory);
    card.appendChild(requestTitle);
    card.appendChild(requestDescription);
    card.appendChild(requestExpectedPrice);
    card.appendChild(isNegotiable);
    card.appendChild(dueDate);
    card.appendChild(requestorID);

    card.appendChild(userPhotoDiv);
    card.appendChild(requestorUserName);
    card.appendChild(requestorLocation);
    card.appendChild(viewRequest)


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
    var requestorUserName= document.getElementsByClassName('requestorUserName');
    var requestorLocation= document.getElementsByClassName('requestorLocation');
    var viewRequest = document.getElementsByClassName('viewRequest');
    var userPhotoDiv = document.getElementsByClassName('userPhotoDiv');
    var requestBannerDiv = document.getElementsByClassName('requestBannerDiv');




    for(var i = 0; i<number;i++){
        
        dueDate[i].innerHTML= "<b>Due date: </b>"+dataArray[i]['dueDate'];
        isNegotiable[i].innerHTML = "<b>Negotiable: </b>"+dataArray[i]['isNegotiable'];
        requestCategory[i].innerHTML = "<b>Category: </b>"+dataArray[i]['requestCategory'];
        requestDescription[i].innerHTML = "<b>Description: </b>"+dataArray[i]['requestDescription'];
        requestExpectedPrice[i].innerHTML = "<b>Expected Price: </b>"+dataArray[i]['requestExpectedPrice'];
        requestID[i].innerHTML ="<b>Request ID: </b>"+ dataArray[i]['requestID'];
        requestTitle[i].innerHTML = "<b>Title: </b>"+dataArray[i]['requestTitle'];
        requestorID[i].innerHTML = "<b>Requestor ID: </b>"+dataArray[i]['requestorID'];
        requestorUserName[i].innerHTML = "<b style='color:black;'>Requestor: </b>"+dataArray[i]['userName'];
        requestorLocation[i].innerHTML = "<b>Location: </b>"+dataArray[i]['requestorMunicipality'];
        requestorUserName[i].href = "Public_Profile.php?userID=" +  dataArray[i]['requestorID'] + "&userType=Requestor";

        viewRequest[i].href = "RequestInfo.php?requestID=" + dataArray[i]['requestID'];
        var image = new Image();
        image.src = dataArray[i]['userPhoto'];
        image.setAttribute('class','userPhotoPic');
        userPhotoDiv[i].appendChild(image);

        var requestBannerImage = new Image();

        if(dataArray[i]['requestCategory'] === "Computer related work"){
            requestBannerImage.src = "Images/RequestBanners/ComputerRelated.jpeg";
            requestBannerImage.setAttribute('class','bannerImage');
            requestBannerDiv[i].appendChild(requestBannerImage);

        }else if(dataArray[i]['requestCategory'] === "Home Service"){
            requestBannerImage.src = "Images/RequestBanners/HomeServices.jpg";
            requestBannerImage.setAttribute('class','bannerImage');
            requestBannerDiv[i].appendChild(requestBannerImage);
            
        }else{

            requestBannerImage.src = "Images/RequestBanners/others.jpg";
            requestBannerImage.setAttribute('class','bannerImage');
            requestBannerDiv[i].appendChild(requestBannerImage);
        }
        


    }

}


// for getting products for pasabuy
function getRequests(){
   
    
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_requests.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            var RequestsContainer = document.getElementById('RequestsContainer');
            RequestsContainer.innerHTML = "";

            var dataArray = this.response;

            if(dataArray != "failed to fetch"){
                
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);

            var number = dataArray.length;
            createServiceElements(number);
            setData(dataArray);
            } else{
                RequestsContainer.innerText = "No Requests";
            }

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send();
    
}// end of function



// getting requests based on category selected

function setCategory(category){
    var selectedCategory = category;
    var query = "category=" + selectedCategory;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_categorizedRequests.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 || this.status === 200){ 
           

            var RequestsContainer = document.getElementById('RequestsContainer');
            RequestsContainer.innerHTML = "";

            var dataArray = this.response;

            if(dataArray != "failed to fetch"){
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);

            var number = dataArray.length;
            createServiceElements(number);
            setData(dataArray);
            }

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
}

// get nearest requests



function getNearestRequest(municipality){
    var municipality = municipality;
    var query = "municipality=" + municipality;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_nearestRequest.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 || this.status === 200){ 
           

            var RequestsContainer = document.getElementById('RequestsContainer');
            RequestsContainer.innerHTML = "";

            var dataArray = this.response;

            if(dataArray != "failed to fetch"){
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);

            var number = dataArray.length;
            createServiceElements(number);
            setData(dataArray);
            }

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
}
