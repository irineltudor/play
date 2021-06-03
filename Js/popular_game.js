var csvFileData="'\u0022'";
var xmlFileData = "";
function getGameRank()
{  
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getMostPopularGame.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {
            var list=document.getElementsByClassName("w3-ul","w3-card-4")[0];
            var game = JSON.parse(this.responseText);
            for(var i=0;i< game.length;i++){
                var title = game[i].title;
                var number = game[i].number;

                if(i == 0){
                    csvFileData = '\u0022' + title + '\u0022' + "," + number;
                }
                else {
                     csvFileData = csvFileData + "\n" + '\u0022' + title + '\u0022' + "," + number;
                }

                if(number != 1){
                    xmlFileData = xmlFileData + "Only " + number + " users have " + title + " in their inventory" + "\n";
                    }
                    else{
                        if(number == 0){
                            xmlFileData = xmlFileData + "No users have " + title + " in their inventory" + "\n";
                        }
                        else{
                            xmlFileData = xmlFileData + "Only " + number + " user has " + title + " in their inventory" + "\n";
                        }
                    }

             var li = document.createElement("li");
             li.classList.add("w3-display-container");
             li.innerHTML=title;
             li.style.border="2px solid black";
             var p = document.createElement("p");
             p.classList.add("w3-button","w3-transparent","w3-display-right");
             p.innerHTML=number;
             li.appendChild(p);
             list.appendChild(li);
            }
        }
    }
}
function csvFunction() {  
  
    //define the heading for each row of the data  
    var hiddenElement = document.createElement('a');  
    hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csvFileData);  
    hiddenElement.target = '_blank';
     
    //provide the name for the CSV file to be downloaded  
    hiddenElement.download = 'statistics_by_popular_game.csv';  
    hiddenElement.click();  
}  
function docBookFunction(){
    //define the heading for each row of the data  
    var hiddenElement = document.createElement('a');  
    hiddenElement.href = 'data:xml;charset=utf-8,' + encodeURI(xmlFileData);  
    hiddenElement.target = '_blank';
     
    //provide the name for the CSV file to be downloaded  
    hiddenElement.download = 'statistics_by_popular_game.xml';  
    hiddenElement.click();  
}

getGameRank();