function getTournaments(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../Php/api/getTournaments.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var gallery=document.getElementsByClassName("tournament_gallery")[0];
            var tournaments = JSON.parse(this.responseText);
            for(var i=0;i< tournaments.length;i++)
            { 
              tournament=tournaments[i];
              var name=tournament.name;
              var id = tournament.id;
              var div=document.createElement("div");
              div.classList.add("tournament");
  
              var img=document.createElement("img");
              img.setAttribute("alt",name);

              var form=document.createElement("form");
              form.setAttribute("action","../html/TournamentScrapePage.php");
              form.setAttribute("method","post");

              var button=document.createElement("button");
              button.classList.add("openbtn");
              button.setAttribute("value",id);
              button.setAttribute("name","tournament_id")
              button.innerHTML="open";

              var p = document.createElement("p");
              p.style.color="white";
              p.style.textAlign="center";
              p.innerHTML=name;

              form.appendChild(button);
              div.appendChild(img);
              div.appendChild(form);
              div.appendChild(p);
              gallery.appendChild(div);
              
              getTournamentImage(tournament.game_id,img);
            }
        }
    }
}

function getTournamentImage(game_id,img)
{
    var ajax = new XMLHttpRequest();
    var url="../Php/api/getGameInfo.php";
    var method = "POST";
    var asynchronous = true;
    var id=game_id;

    $.ajax({
        type : method,
        url : url,
        data :{id: id},
        success : function(res){
            img.setAttribute("src",res.game_image_src);
        }
    });
  

}

getTournaments();