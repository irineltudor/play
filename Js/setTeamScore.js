function getTournamentInfo(tournament_id)
{
  
    var method = "POST";
    var url="../../Php/api/getTournamentInfo.php";
    

    $.ajax({
        url : url,
        type : method,
        data : {tournament_id:tournament_id},
        success: function (response){
            var tournament=response;
            var content = document.getElementsByClassName("content")[0];
            var title=content.getElementsByClassName("title")[0];
            title.innerHTML=tournament.name + "'s Teams";
        }
    });
    
}

function getTournamentTeams(tournament_id)
{  
   
    var method = "POST";
    var url="../../Php/api/getTournamentTeams.php";
    
    $.ajax({
        url : url,
        type : method,
        data : {tournament_id:tournament_id},
        success: function (response){
            var form1 = document.createElement("form");
            form1.setAttribute("action","../admin/setTeamScore.php");
            form1.setAttribute("method","post");
            form1.setAttribute("name","form1");
            form1.style.display="none";

            var input1= document.createElement("input");
            input1.setAttribute("type","hidden");
            input1.setAttribute("name","id");
            input1.setAttribute("value",tournament_id);

            form1.appendChild(input1);

            document.getElementsByClassName("everything-score")[0].appendChild(form1);

            var teams = response;
            var list=document.getElementsByClassName("w3-ul","w3-card-4")[0];
            for(var i=0;i<teams.length;i++)
            { 
              var team=teams[i];
              var score=team.score;
              var team_name=team.user_team_name;
              var team_id=team.id;
              var li = document.createElement("li");
              li.innerHTML=team_name;

              var form = document.createElement("form");
              form.setAttribute("action","../../Php/api/updateTeamScore.php");
              form.setAttribute("method","post");
              form.classList.add("update");
              form.style.alignContent="right";

              var label = document.createElement("label");
              label.setAttribute("for","score");
              label.innerHTML="score : ";

              var scoreInput = document.createElement("input");
              scoreInput.setAttribute("type","text");
              scoreInput.setAttribute("id","score");
              scoreInput.setAttribute("name","score");
              scoreInput.setAttribute("placeholder",score);

              var teamInput = document.createElement("input");
              teamInput.setAttribute("type","text");
              teamInput.setAttribute("name","team_id");
              teamInput.setAttribute("value",team_id);
              teamInput.style.display="none";

              var submit = document.createElement("input");
              submit.setAttribute("type","submit");
              submit.style.marginLeft="20px";
              submit.setAttribute("value","Submit");

              form.appendChild(teamInput);
              form.appendChild(label);
              form.appendChild(scoreInput);
              form.appendChild(submit);

              li.appendChild(form);

              list.appendChild(li);

              $('form.update').on('submit',function(){
                var that = $(this),
                url = that.attr('action'),
                type = that.attr('method'),
                data = {};
            
                that.find('[name]').each(function(index,value){
                    var that = $(this),
                    name = that.attr('name'),
                    value=that.val();
                    
                    data[name]=value;
                });
            
                $.ajax({
                    url : url,
                    type : type,
                    data : data,
                    success: function (response){
                        
                        
                            document.form1.submit();
                        
                    }
                });
                
            
                return false;
            });
              
            }
        }
    });

}



