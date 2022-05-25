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
           

            var dataArray = this.response;
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);
            positions(dataArray);

     
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send(query);
    
}// end of function


function positions(array){
    var dataArray = array;
    var number = dataArray.length;

    for(var i = 0; i<number; i++){
        document.write(dataArray[i]['servicePosition']);
    }



}


function categories(array){
    var dataArray = array;
    var number = dataArray.length;

    for(var i = 0; i<number; i++){
        document.write(dataArray[i]['serviceCategory']);
    }



}


// gets data from php 
function getOtherPositions(){
   
    
    var xmlhttp = new XMLHttpRequest();
    
   
   

    xmlhttp.open("POST", "Backend/Get_otherservices.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 || this.status === 200){ 
           

            var dataArray = this.response;
            dataArray = JSON.parse(dataArray);
            console.log(dataArray);
            positions(dataArray);
            categories(dataArray);
        }else{
            console.log(err);
        }      
    };
    
    xmlhttp.send();
    
}// end of function