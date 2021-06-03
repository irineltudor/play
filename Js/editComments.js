function getGameInfo(current_game_id)
{
  
    var method = "POST";
    var url="../../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id:id},
        success: function (response){
            var content = document.getElementsByClassName("content")[0];
            var title=content.getElementsByClassName("title")[0];
            title.innerHTML=response.game_title;
            console.log(response.game_title);
        }
    });
    
}

function getComments(current_game_id)
{  
   
    var method = "POST";
    var url="../../Php/api/getComments.php";
    $.ajax({
        url : url,
        type : method,
        data : {current_game_id : current_game_id},
        success: function (response){
            var comments = response;
            
            for(var i=0;i<comments.length;i++)
            { 
                var comment_list=comments[i];
                var id = comment_list.id;
                var id_game = comment_list.game_id;
                var comment=comment_list.comment;
                 if(comment != null && id_game == current_game_id){
                    var list=document.getElementsByClassName("w3-ul","w3-card-4")[0];
                        var li = document.createElement("li");
                        li.classList.add("w3-display-container");
                        li.innerHTML=comment;
                        li.style.border="2px solid black";

                        var form=document.createElement("form");
                        form.setAttribute("action","../../Php/api/deleteComment.php");
                        form.setAttribute("method","post");
                        form.setAttribute("id" , "delete-form");

                        var button = document.createElement("button");
                        button.setAttribute("type","submit");
                        button.setAttribute("name","id");
                        button.setAttribute("value",id);
                        button.classList.add("w3-button","w3-transparent","w3-display-right");
                        button.innerHTML="&times;";

                        form.appendChild(button);
                        li.appendChild(form);
                        list.appendChild(li);
                         }
            }

        }
    });

}