var csvFileData="'\u0022'";
var xmlFileData = "";
function getGameRank()
{  
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getUsersByScore.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {
            var list=document.getElementsByClassName("w3-ul","w3-card-4")[0];
            var all_users_score = JSON.parse(this.responseText);
            for(var i=0;i< all_users_score.length;i++){
                var team_name = all_users_score[i].user_team_name;
                var score = all_users_score[i].scores;

                if(i == 0){
                    csvFileData = '\u0022' + team_name + '\u0022' + "," + score;
                }
                else {
                     csvFileData = csvFileData + "\n" + '\u0022' + team_name + '\u0022' + "," + score;
                }

                if(score  != 1){
                    xmlFileData = xmlFileData + team_name + " has the score of " + score + " points" + "\n";
                    }
                    else{
                        xmlFileData = xmlFileData + team_name + " has the score of " + score + " point" + "\n";
                    }    

             var li = document.createElement("li");
             li.classList.add("w3-display-container");
             li.innerHTML=team_name;
             li.style.border="2px solid black";
             var p = document.createElement("p");
             p.classList.add("w3-button","w3-transparent","w3-display-right");
             p.innerHTML=score;
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
    hiddenElement.download = 'statistics_by_score.csv';  
    hiddenElement.click();  
}  
function docBookFunction(){
    //define the heading for each row of the data  
    var hiddenElement = document.createElement('a');  
    hiddenElement.href = 'data:xml;charset=utf-8,' + encodeURI(xmlFileData);  
    hiddenElement.target = '_blank';
     
    //provide the name for the CSV file to be downloaded  
    hiddenElement.download = 'statistics_by_score.xml';  
    hiddenElement.click();  
}

getGameRank();