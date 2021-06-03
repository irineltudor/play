function getTournaments(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getTournaments.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var list = document.getElementsByClassName("w3-ul","w3-card-4")[0];
            var tournaments = JSON.parse(this.responseText);
            for(var i=0;i< tournaments.length;i++)
            { 
              tournament=tournaments[i];
              var name=tournament.name;
              var id = tournament.id;
              
              var li = document.createElement("li");
              li.classList.add("w3-display-container");
              li.innerHTML=name;

              var setscore=document.createElement("form");
              setscore.setAttribute("action","../../Html/admin/setTeamScore.php");
              setscore.setAttribute("method","post");

              var setButton=document.createElement("button");
              setButton.setAttribute("type","submit");
              setButton.setAttribute("name","id");
              setButton.setAttribute("value",id);
              setButton.classList.add("w3-button","w3-transparent","w3-display-right");
              setButton.style.marginRight="35px";
              setButton.innerHTML="Set Scores";

              setscore.appendChild(setButton);

              var deleteForm=document.createElement("form");
              deleteForm.setAttribute("action","../../Php/api/deleteTournament.php");
              deleteForm.setAttribute("method","post");

              var delButton=document.createElement("button");
              delButton.setAttribute("type","submit");
              delButton.setAttribute("name","id");
              delButton.setAttribute("value",id);
              delButton.classList.add("w3-button","w3-transparent","w3-display-right");
              delButton.innerHTML="&times;";

              deleteForm.appendChild(delButton);

              li.appendChild(setscore);
              li.appendChild(deleteForm);
              list.appendChild(li);
             
            }
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
        {   var options=document.getElementById("select");
            var games = JSON.parse(this.responseText);
            for(var i=0;i< games.length;i++)
            { 
             var title = games[i].title;
             var id = games[i].id;
             
             var option=document.createElement("option");
             option.setAttribute("value",id);
             option.innerHTML=title;

             options.appendChild(option);
    
            }
        }
    }
}




getTournaments();
getGames();