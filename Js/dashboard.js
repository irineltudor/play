var csvFileData = "";
var xmlFileData = "";
function getUsers(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getUsers.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {  
            var users = JSON.parse(this.responseText);
            
            var number = users.length;

            csvFileData = csvFileData + "Users," + number + "\n";

            xmlFileData = xmlFileData + "Users number: " + number + "\n";

            var there = document.getElementById("user_number");

            there.innerHTML=number;
        }
    }
}

function getTournaments(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getTournaments.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var tournaments = JSON.parse(this.responseText);
            
            var number = tournaments.length;

            csvFileData = csvFileData + "Tournaments," + number + "\n";

            xmlFileData = xmlFileData + "Tournaments number: " + number + "\n";

            var there = document.getElementById("tournament_number");

            there.innerHTML=number;
        }
    }
}

function getGames(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getGames.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var games = JSON.parse(this.responseText);
            
            var number =games.length;

            csvFileData = csvFileData + "Games," + number + "\n";

            xmlFileData = xmlFileData + "Games number: " + number + "\n";

            var there = document.getElementById("game_number");

            there.innerHTML=number;

    
         }
    }
}

function getComments(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getComments.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var comments = JSON.parse(this.responseText);
            
            var number =comments.length;

            csvFileData = csvFileData + "Comments," + number + "\n";

            xmlFileData = xmlFileData + "Comments number: " + number;

            var there = document.getElementById("comment_number");

            there.innerHTML = number;

    
         }
    }
}

function csvFunction() {  
  
    //define the heading for each row of the data  
    var hiddenElement = document.createElement('a');  
    hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csvFileData);  
    hiddenElement.target = '_blank';
     
    //provide the name for the CSV file to be downloaded  
    hiddenElement.download = 'dashboard.csv';  
    hiddenElement.click();      
}  


function docBookFunction(){
     //define the heading for each row of the data  
     var hiddenElement = document.createElement('a');  
     hiddenElement.href = 'data:xml;charset=utf-8,' + encodeURI(xmlFileData);  
     hiddenElement.target = '_blank';
      
     //provide the name for the CSV file to be downloaded  
     hiddenElement.download = 'dashboard.xml';  
     hiddenElement.click();  
}

getUsers();
getTournaments();
getGames();
getComments();