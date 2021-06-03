function getTournamentInfo(tournament_id)
{
  
    var method = "POST";
    var url="../Php/api/getTournamentInfo.php";
    

    $.ajax({
        url : url,
        type : method,
        data : {tournament_id:tournament_id},
        success: function (response){


            var form1 = document.createElement("form");
            form1.setAttribute("action","../Html/TournamentScrapePage.php");
            form1.setAttribute("method","post");
            form1.setAttribute("name","form1");
            form1.style.display="none";

            var input1= document.createElement("input");
            input1.setAttribute("type","hidden");
            input1.setAttribute("name","tournament_id");
            input1.setAttribute("value",tournament_id);

            form1.appendChild(input1);
            document.getElementsByClassName("disk_opened_left")[0].appendChild(form1);

            var tournament=response;
            var content = document.getElementsByClassName("content")[0];
            var title=content.getElementsByClassName("title")[0];
            var tournament_info=content.getElementsByClassName("tournament_info")[0];

            var h1=document.createElement("h1");
            h1.innerHTML=tournament.name;

            title.appendChild(h1);
         
            var img=document.createElement("img");
            img.setAttribute("alt",tournament.name);
            getTournamentImage(tournament.game_id,img);

            var email=document.createElement("p");
            email.innerHTML="email : " + tournament.email;
            var phone=document.createElement("p");
            phone.innerHTML="phone : " + tournament.phone;
            var organizer=document.createElement("p");
            organizer.innerHTML="organizer : " + tournament.organizer;
            var begin_date=document.createElement("p");
            begin_date.innerHTML="begin : " + tournament.begin_date;
            var end_date=document.createElement("p");
            end_date.innerHTML="end : " + tournament.end_date;

            tournament_info.appendChild(img);
            tournament_info.appendChild(email);
            tournament_info.appendChild(phone);
            tournament_info.appendChild(organizer);
            tournament_info.appendChild(begin_date);
            tournament_info.appendChild(end_date);
        }
    });
    
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

function getTournamentTeams(tournament_id)
{  
   
    var method = "POST";
    var url="../Php/api/getTournamentTeams.php";
    
    $.ajax({
        url : url,
        type : method,
        data : {tournament_id:tournament_id},
        success: function (response){
            var teams = response;
            var list=document.getElementById("teams_list");
            for(var i=0;i<teams.length;i++)
            { 
              var team=teams[i];
              var score=team.score;
              var team_name=team.user_team_name;
              var li = document.createElement("li");
              li.innerHTML=team_name;

              var p = document.createElement("p");
              p.innerHTML="score : " + score;
                if(i == 0)
                { 
                   li.classList.add("place1");
                }
                if(i == 1 )
                {
                    li.classList.add("place2");
                }
                 
                if(i == 2)
                {
                    li.classList.add("place3");
                }
                    
                li.appendChild(p);
                list.appendChild(li);
            }
              
            }
        
    });

}

function alreadyRegistered(tournament_id)
{
    var method = "POST";
    var url="../Php/api/alreadyRegistered.php";
    
    $.ajax({
        url : url,
        type : method,
        data : {tournament_id:tournament_id},
        success: function (response){
            var tournament = document.getElementsByClassName("content")[0];
            var button = document.createElement("button");
            button.style.width="auto";
            if(response==1)
            {
              button.style.backgroundColor="grey";
              button.style.color="black";
              button.innerHTML="Already Registered";
            }
            else
            { button.setAttribute("onclick","document.getElementById('id01').style.display='block'");
              button.innerHTML="Register";

            }
            tournament.appendChild(button);
            
              
            }
        
    });

}

$('form.register').on('submit',function(){
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
                if(response==1)
                {
                 document.form1.submit();
                }
                else{
                    
                }
            

        }
    });
    

    return false;
});


