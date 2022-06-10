var selectedCategory = sessionStorage.getItem("selectedCategory");
var loc = sessionStorage.getItem("municipality");
function setSelectedCategory(){

    var selected = document.getElementById("selectedCategory");
    selected.innerText = selectedCategory;
    document.getElementById('myLocation').value=loc;

    getPositions(selectedCategory);
}


// gets data from php 
function getPositions(name){
    var data = name;
    
    var xmlhttp = new XMLHttpRequest();
    
    query = "condition=" + data;
    console.log(query)

    xmlhttp.open("POST", "Backend/Get_services.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            document.getElementById("AvailServiceContent").innerHTML = "";
            
            
            selectedCategory = document.getElementById("selectedCategory");
            AvailServiceFormCategory = document.getElementById("Category");
            selectedCategory.innerText = data + " Services";
            AvailServiceFormCategory.value = data;


            var dataArray = this.response;
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);

            var number = dataArray.length;
            createServiceElements(number);
            dataArray = positions(dataArray);
            setData(dataArray);

            //console.log(positions(dataArray));

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


// for filtering
function positions(array){
    var dataArray = array;
    var number = dataArray.length;
    var newData = [];
    var seenTwice = [];
    var filtered = [];
  
    for(var i = 0; i<number; i++){
        newData[i] = dataArray[i]['servicePosition']
      
        
    }

    newData.sort();

    var j;

    for(var i = 0; i<number; i++){

        j = i +1;

        if(newData[i] === newData[j]){
            seenTwice[i] = newData[i];
        }
    }
    
    for(var i = 0; i<number; i++){

        j = i +1;
        if(newData[i] != seenTwice[i]){
            filtered[i] = newData[i];
        }
    }

    return newData;

}


// create elements to be appended 
function createServiceElements(Number){
 
    DataNumber = Number;
    div = document.getElementById("AvailServiceContent");
   
    
    for(var i = 0;i<DataNumber;i++){
    
    // create elements for rows
    var card = document.createElement('div');


    var data = document.createElement('td');



    // set attributes
    card.setAttribute('class','serviceCard');


    // append elements to the row
    card.appendChild(data);


    div.append(card);

    } 
    
    
} // end of function


// set positions data 
function setData(array){

    var dataArray = array;
    var number = dataArray.length;

    var selectedCategory = sessionStorage.getItem("selectedCategory");
    var serviceCard = document.getElementsByClassName("serviceCard");

    for(var i = 0; i<number;i++){
        serviceCard[i].innerText = dataArray[i];
        serviceCard[i].setAttribute("onclick","getsuggestedResponders('" + dataArray[i] +"')");

    }

}

// get suggested resopnders

// gets data from php 
function getsuggestedResponders(position){
    var position = position;
    var category =  sessionStorage.getItem("selectedCategory");
    var municipality = sessionStorage.getItem('municipality');

    var divCategory= document.getElementById("Category"); 
    var divPosition=document.getElementById("Position");

    divCategory.value = sessionStorage.getItem("selectedCategory");
    divPosition.value= position;

    console.log(divCategory.value);


    var xmlhttp = new XMLHttpRequest();
    
    query = "position=" + position + "&municipality=" + municipality +"&category=" + category;
    console.log(query)

    xmlhttp.open("POST", "Backend/SuggestResponders.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

           
            // refresh the div to avoid duplication in appending
             var suggestedResponders = document.getElementById("SuggestedResponders");
             suggestedResponders.innerHTML ="";
             document.getElementById("Responders").style.display="block";

            var dataArray = this.response;

            if(dataArray === "No responders near you for this service"){

                suggestedResponders.innerText = dataArray;
            } else{
                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
                
                var number = dataArray.length
                createSuggestedRespondersElements(number);
                setResponderData(dataArray);
            }

     
            getAvailableResponders(position);
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);


    
    
}// end of function







// create elements for responders to be appended 
function createSuggestedRespondersElements(Number){
 
    DataNumber = Number;
    div = document.getElementById("SuggestedResponders");
    
   
    
    for(var i = 0;i<DataNumber;i++){
    
    // create elements for rows
    var card = document.createElement('div');


    var ID = document.createElement('td');
    var name = document.createElement('td');
    var municipality = document.createElement('td');
    var rate = document.createElement('td');
    var selectButton = document.createElement('button');
    var viewProfile = document.createElement('a');
    



    // set attributes
    selectButton.innerText = "Select";
    viewProfile.innerText = "View Profile";
    viewProfile.setAttribute('class','viewProfile');
    card.setAttribute('class','responderCard');
    ID.setAttribute('class','responderID');
    name.setAttribute('class','responderName');
    municipality.setAttribute('class','responderMunicipality');
    rate.setAttribute('class','responderRate');
    selectButton.setAttribute('class','selectButton');


    // append elements to the row
    card.appendChild(ID);
    card.appendChild(name);
    card.appendChild(municipality);
    card.appendChild(rate);
    card.appendChild(selectButton);
    card.appendChild(viewProfile);
    


    div.append(card);

    } 
    
    
} // end of function


// set suggested responders data 
function setResponderData(array){

    var dataArray = array;
    var number = dataArray.length;

    var responderCard = document.getElementsByClassName("responderCard");

    var ID= document.getElementsByClassName('responderID');
    var name= document.getElementsByClassName('responderName');
    var municipality= document.getElementsByClassName('responderMunicipality');
    var rate= document.getElementsByClassName('responderRate');
    var selectButton = document.getElementsByClassName('selectButton');
    var viewProfile = document.getElementsByClassName('viewProfile');

    for(var i = 0; i<number;i++){


        ID[i].innerText = dataArray[i]['responderID'];
        name[i].innerText = dataArray[i]['userName'];
        municipality[i].innerText = dataArray[i]['municipality'];
        rate[i].innerText = dataArray[i]['rate'];
        viewProfile[i].href= "Public_Profile.php?userID=" +  dataArray[i]['responderID'] + "&userType=Responder";
        selectButton[i].setAttribute('onclick','selectResponder('+ dataArray[i]['responderID']+','+dataArray[i]['rate']+')');
        

    }

}


//----------------------------------------------------Available responders -------------------------------------------------------
// set suggested responders data 
function setAvailableResponderData(array){

    var dataArray = array;
    var number = dataArray.length;


    var responderCard = document.getElementsByClassName("availableResponderCard");

    var availableViewProfile = document.getElementsByClassName('availableViewProfile');
    var availableSelectButton = document.getElementsByClassName('availableSelectButton');

    var ID= document.getElementsByClassName('availableResponderID');
    var name= document.getElementsByClassName('availableResponderName');
    var municipality= document.getElementsByClassName('availableResponderMunicipality');
    var rate= document.getElementsByClassName('availableResponderRate');
   // var selectButton.innerText = "Select";
   //var viewProfile.innerText = "View Profile";

    for(var i = 0; i<number;i++){


        ID[i].innerText = dataArray[i]['responderID'];
        name[i].innerText = dataArray[i]['userName'];
        municipality[i].innerText = dataArray[i]['municipality'];
        rate[i].innerText = dataArray[i]['rate'];
        availableViewProfile[i].href= "Public_Profile.php?userID=" +  dataArray[i]['responderID'] + "&userType=Responder";
        availableSelectButton[i].setAttribute('onclick','selectResponder('+ dataArray[i]['responderID']+','+dataArray[i]['rate']+')');
        

    }

}



// 31-05-2022: has issues in displaying - fixed
// For available responders not on the location
function getAvailableResponders(position,category){
    var position = position;
    var category =  sessionStorage.getItem("selectedCategory");
    var municipality = sessionStorage.getItem('municipality');
    
    var xmlhttp = new XMLHttpRequest();
    
    query = "position=" + position + "&municipality=" + municipality + "&category=" + category;
    console.log(query)

    xmlhttp.open("POST", "Backend/AvailableResponders.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

           
            // refresh the div to avoid duplication in appending
             AllResponders = document.getElementById("AllResponders");
             AllResponders.innerHTML = "";
             document.getElementById("Responders").style.display="block";

            var dataArray = this.response;
            console.log(dataArray);
            if(dataArray === "Unable to load other available responders"){

                AllResponders.innerText = dataArray;
                
            } else{

                dataArray = JSON.parse(dataArray);
                console.log(dataArray);
 
                var number = dataArray.length
                createAvailableRespondersElements(number);
                setAvailableResponderData(dataArray);
            }

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


// create elements for responders to be appended 
function createAvailableRespondersElements(Number){
 
    DataNumber = Number;
    div = document.getElementById("AllResponders");
    
   
    
    for(var i = 0;i<DataNumber;i++){
    
    // create elements for rows
    var card = document.createElement('div');

    var ID = document.createElement('td');
    var name = document.createElement('td');
    var municipality = document.createElement('td');
    var rate = document.createElement('td');
    var selectButton = document.createElement('button');
    var viewProfile = document.createElement('a');
    



    // set attributes
    selectButton.innerText = "Select";
    viewProfile.innerText = "View Profile";
    selectButton.setAttribute('class','availableSelectButton');
    viewProfile.setAttribute('class','availableViewProfile');
    card.setAttribute('class','availableResponderCard');
    ID.setAttribute('class','availableResponderID');
    name.setAttribute('class','availableResponderName');
    municipality.setAttribute('class','availableResponderMunicipality');
    rate.setAttribute('class','availableResponderRate');


    // append elements to the row
    card.appendChild(ID);
    card.appendChild(name);
    card.appendChild(municipality);
    card.appendChild(rate);
    card.appendChild(selectButton);
    card.appendChild(viewProfile);


    div.append(card);

    } 
    
    
} // end of function



/* Avail Service form */
function selectResponder(responderID,rate){
    var responderID = responderID;
    var rate = rate;

    divResponderID =document.getElementById("responderID");
    divServicePrice =document.getElementById("servicePrice");

    divResponderID.value = responderID;
    divServicePrice.value = rate;

    var form = document.getElementById('AvailServiceFormContainer'); 
    form.style.display = "block";
}


// closing form 
// for closing the forms
function closeForms(){
    
var modal = document.getElementById("AvailServiceFormContainer");
   modal.style.display = "none";

   //sessionStorage.setItem('vercode','');


}