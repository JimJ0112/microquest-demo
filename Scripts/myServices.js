// create elements for data
function createElements(number){
    var number = number;

    var div = document.getElementById('myServicesContent');
    for(var i=0; i<number; i++){
        var myServiceCard = document.createElement('div');
        var serviceCategory = document.createElement('h4');
        var servicePosition = document.createElement('h4');
        var serviceID = document.createElement('p');
        var serviceRate = document.createElement('p');
        var serviceCertification = document.createElement('p');
        var serviceCertificateFile = document.createElement('p');
        var serviceStatus = document.createElement('p');
        var delist = document.createElement('button');
        var update = document.createElement('button');
        var br = document.createElement('br');


         myServiceCard.setAttribute('class','myServiceCard');
         serviceCategory.setAttribute('class','serviceCategory');
         servicePosition.setAttribute('class','servicePosition');
         serviceID.setAttribute('class','serviceID');
         serviceRate.setAttribute('class','serviceRate');
         serviceCertification.setAttribute('class','serviceCertification');
         serviceCertificateFile.setAttribute('class','serviceCertificateFile');
         serviceStatus.setAttribute('class','serviceStatus');
     
         update.innerText = "Update";

         delist.setAttribute('class','delist');
         update.setAttribute('class','update');

         myServiceCard.appendChild(serviceID);
         myServiceCard.append(br);
         myServiceCard.appendChild(serviceCategory);
         myServiceCard.appendChild(br);
         myServiceCard.appendChild(servicePosition);
         myServiceCard.appendChild(br);
         myServiceCard.appendChild(serviceRate);
         myServiceCard.appendChild(br);
         myServiceCard.appendChild(serviceStatus);
         myServiceCard.appendChild(br);
         myServiceCard.appendChild(serviceCertification);
         myServiceCard.appendChild(br);
         myServiceCard.appendChild(serviceCertificateFile);
         myServiceCard.appendChild(br);
         myServiceCard.appendChild(delist);
         myServiceCard.appendChild(br);
         myServiceCard.appendChild(update);

         div.appendChild(myServiceCard);






    }

}

// set positions data 
function setData(array){

var dataArray = array;
var number = dataArray.length;


myServiceCard = document.getElementsByClassName('myServiceCard');
serviceCategory = document.getElementsByClassName( 'serviceCategory');
servicePosition = document.getElementsByClassName('servicePosition');
serviceID = document.getElementsByClassName('serviceID');
serviceRate = document.getElementsByClassName('serviceRate');
serviceCertification = document.getElementsByClassName('serviceCertification');
serviceCertificateFile = document.getElementsByClassName('serviceCertificateFile');
serviceStatus = document.getElementsByClassName('serviceStatus');

delist= document.getElementsByClassName('delist');
update= document.getElementsByClassName('update');


for(var i = 0; i< number; i++){
    serviceCategory[i].innerText  = "Category: "+dataArray[i]['serviceCategory'];
    servicePosition[i].innerText  = "Position: "+dataArray[i]['servicePosition'];
    serviceID[i].innerText  = dataArray[i]['serviceID'];
    serviceRate[i].innerText  = "Rate: Php"+ dataArray[i]['rate'];
    serviceCertification [i].innerText =  "Certification: "+ dataArray[i]['certification'];
    serviceStatus[i].innerText  = "Status: "+ dataArray[i]['serviceStatus'];
    update[i].setAttribute('onclick','updateForm(' + dataArray[i]['serviceID'] +')');

    if(dataArray[i]['serviceStatus'] === "Active"){
        delist[i].setAttribute('onclick','delistService('+dataArray[i]['serviceID'] +')');
        delist[i].innerText = "Delist";

    } else if(dataArray[i]['serviceStatus'] === "" || dataArray[i]['serviceStatus'] === " "){
        delist[i].setAttribute('onclick','activeService('+dataArray[i]['serviceID'] +')');
        delist[i].innerText = "Activate";

    } else if(dataArray[i]['serviceStatus'] === "Delisted" ){
        delist[i].setAttribute('onclick','activeService('+dataArray[i]['serviceID'] +')');
        delist[i].innerText = "Activate";
    }
  
    var image = new Image();
    image.src = dataArray[i]['certificateFile'];
    image.setAttribute('class','certificateImage');
    serviceCertificateFile[i].appendChild(image);

}

}

function getMyServices(userID){
    var userID = userID;
    var query = "userID=" + userID;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_myServices.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var div = document.getElementById('myServicesContent');
            div.innerHTML = "";
            var dataArray = this.response;

            if(dataArray === "failed to fetch"){
                var content = document.getElementById("requestInfoContent");
                var h2 = document.createElement('h2');
                h2.innerHTML = "<center> No Services </center>";
                div.innerHTML = "";
                div.style.textAlign = "center";
                div.appendChild(h2);


            } else {
                
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                number = dataArray.length;
                createElements(number)
                setData(dataArray);    
            }

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


// set update form
function updateForm(serviceID){
    var serviceID = serviceID;
    document.getElementById('serviceID').value = serviceID;
    openForms();

}





// close and open forms
function closeForms(){
    var updateFormBackground = document.getElementById("updateFormBackground");
    document.getElementById('serviceID').value ="";


    updateFormBackground.style.display = "none";

}

function openForms(){
    var updateFormBackground = document.getElementById("updateFormBackground");



    updateFormBackground.style.display = "block";

}


// update status
function delistService(serviceID){
    var serviceID = serviceID;
    var query = "serviceID=" + serviceID +"&status=Delisted";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/UpdateServiceStatus.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
        
            var dataArray = this.response;
            console.log(dataArray);

            
            var userID = sessionStorage.getItem('myID');
            getMyServices(userID)

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


function activeService(serviceID){
    var serviceID = serviceID;
    var query = "serviceID=" + serviceID +"&status=Active";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/UpdateServiceStatus.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
        
            var dataArray = this.response;
            console.log(dataArray);

            var userID = sessionStorage.getItem('myID');
            getMyServices(userID)

        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function