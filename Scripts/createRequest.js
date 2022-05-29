
function categories(array){
    var dataArray = array;
    var number = dataArray.length;
    var newData = [];
 


    for(var i = 0; i<number; i++){
  
        newData[i] = dataArray[i]['serviceCategory']
    }
    newData.sort();

    

    
    return newData;

}





// create elements to be appended 
function createServiceElements(Number){
 
    DataNumber = Number;
    div = document.getElementById("requestCategories");
   
    
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

    var serviceCard = document.getElementsByClassName("serviceCard");
    for(var i = 0; i<number;i++){
        
        serviceCard[i].innerText = dataArray[i];
        serviceCard[i].setAttribute("onclick","createRequest('" + dataArray[i] + "')");

    }

}


// for getting products for pasabuy
function getProducts(){
   
    
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "Backend/Get_products.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            document.getElementById("AvailServiceContent").innerHTML = "";
            selectedCategory = document.getElementById("selectedCategory");
            selectedCategory.innerText = "Product Categories";

            var dataArray = this.response;
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);

            var number = dataArray.length;
            createServiceElements(number);
            dataArray = productCategory(dataArray);
            setData(dataArray);

            console.log(positions(dataArray));

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send();
    
}// end of function


// getting product categories
// for filtering
function productCategory(array){
    var dataArray = array;
    var number = dataArray.length;
    var newData = [];

  
    for(var i = 0; i<number; i++){
        newData[i] = dataArray[i]['productCategory']
        //document.write(dataArray[i]['servicePosition']);
        
    }

    newData.sort();

    return newData;

}


// gets all services 
function getServices(){
    
    
    var xmlhttp = new XMLHttpRequest();
    
  
    

    xmlhttp.open("POST", "Backend/Get_otherServices.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 || this.status === 200){ 
           
            document.getElementById("requestCategories").innerHTML = "";
           
  

            var dataArray = this.response;
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);
           // positions(dataArray);
            var number = dataArray.length;
            createServiceElements(number);
            dataArray = categories(dataArray);
            setData(dataArray);

            console.log(positions(dataArray));

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send();
    
}// end of function


// for when a category has been selected
function selectCategory(string){

    var category = string;
    sessionStorage.setItem("selectedCategory",category);

    if(category != "Pasabuy"){
        location.href= "SelectedService.php?category=" + category;
    } else {
        location.href= "PasabuyService.php?category=" + category;
    }

}

// for creating request 
// shows forms based on parameter data
// to be continued
function createRequest(string){

    var data = string;
    var regularRequestForm = document.getElementById("regularRequestForm");
    var pasabuyRequestForm = document.getElementById("pasabuyRequestForm");
    var otherCategoriesRequestForm = document.getElementById("otherCategoriesRequestForm");
    var requestCategory = document.getElementById('requestCategory');
    var selectCategory = document.getElementById('selectedCategory');

    if(data ==="Pasabuy"){
        regularRequestForm.style.display = "none";
        pasabuyRequestForm.style.display = "grid";
        otherCategoriesRequestForm.style.display = "none";
        selectCategory.innerText = "Request for "+ data;

    }else if(data === "Other"){
        regularRequestForm.style.display = "none";
        pasabuyRequestForm.style.display = "none";
        otherCategoriesRequestForm.style.display = "grid";
        selectCategory.innerText = data;
    }else{
        regularRequestForm.style.display = "grid";
        pasabuyRequestForm.style.display = "none";
        otherCategoriesRequestForm.style.display = "none";
        requestCategory.value = data;
        selectCategory.innerText = "Request for "+ data;
    }


}

// for closing the forms

function closeForms(){
    var regularRequestForm = document.getElementById("regularRequestForm");
    var pasabuyRequestForm = document.getElementById("pasabuyRequestForm");
    var otherCategoriesRequestForm = document.getElementById("otherCategoriesRequestForm");


    regularRequestForm.style.display = "none";
    pasabuyRequestForm.style.display = "none";
    otherCategoriesRequestForm.style.display = "none";

}