function getComments(current_game_id)
{  
   
    var method = "POST";
    var url="../Php/api/getComments.php";
    $.ajax({
        url : url,
        type : method,
        data : {current_game_id : current_game_id},
        success: function (response){
            var comments = response;
            var number = 0;
            var list=document.getElementById("commentslist");
            for(var i=0;i<comments.length;i++)
            { 
                var comment_list=comments[i];
                var id_game = comment_list.game_id;
                var comment=comment_list.comment;
                 if(comment != null && id_game == current_game_id){
                        var li = document.createElement("li");
                        li.innerHTML=comment;

                        var p = document.createElement("p"); 
                        getUserName(comment_list.user_id,p);
                        
                        list.appendChild(p);
                        list.appendChild(li);
                        number = 1;
                         }
            }

            if(number == 0){
                var li = document.createElement("li");
                li.innerHTML="There are no comments yet";
                list.appendChild(li);
            }


        }
    });

}

function getRating(current_game_id)
{
    var method = "POST";
    var url="../Php/api/getRating.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
              
            var h2 = document.getElementById("game_rating");
            if(resp == null)
            {
                h2.innerHTML="No rating yet";
            }
            else{
                h2.innerHTML="Rating : " + resp + "&#9734;";
            }
            
        }
    });
}

function getPoza(current_game_id)
{  
   
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){

            var poza=document.getElementById("poza");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_image_src);
            poza.appendChild(imagine);
        }
    });

}
function getGameInfo(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var test = document.getElementById("test");
            var p = document.createElement("p");
            p.innerHTML=resp.game_info;
            var p2 = document.createElement("p");
            p2.innerHTML=resp.game_system_req;
            var p3 = document.createElement("h2");
            p3.classList.add("Rating");
            p3.style.marginTop="50px";
            console.log(resp.pegi_age);
            if(resp.pegi_age > 0)
                p3.innerHTML="Only "+ resp.pegi_age + "+ can play the game";
            else p3.innerHTML="Everyone can play the game";
            console.log(p3);
            var br0 = document.createElement("br");
            var br1 = document.createElement("br");
            var br2 = document.createElement("br");
            var br3 = document.createElement("br");
            var br4 = document.createElement("br");
            var br5 = document.createElement("br");
            var br6 = document.createElement("br");
            test.appendChild(br0);
            test.appendChild(p);
            test.appendChild(br1);
            test.appendChild(br2);
            test.appendChild(br3);
            test.appendChild(br4);
            test.appendChild(p2);
            test.appendChild(br5);
            test.appendChild(br6);
            test.appendChild(p3);
            
        }
    });

}
function getGameSlide1(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide1");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_screenshots_src[0]);
            poza.appendChild(imagine);

        }
    });

}

function getGameSlide2(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide2");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_screenshots_src[2]);
            poza.appendChild(imagine);

        }
    });

}

function getGameSlide3(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide3");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_screenshots_src[3]);
            poza.appendChild(imagine);

        }
    });

}
function getGameSlide4(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide4");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_screenshots_src[4]);
            poza.appendChild(imagine);

        }
    });

}

function getGameSlide5(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide5");
            var imagine = document.createElement("VIDEO");
            imagine.setAttribute("src",resp.game_video_src);
            imagine.setAttribute("controls","controls");
            poza.appendChild(imagine);

        }
    });

}

function getGameSlide5(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide5");
            var imagine = document.createElement("VIDEO");
            imagine.setAttribute("src",resp.game_video_src);
            imagine.setAttribute("controls","controls");
            poza.appendChild(imagine);

        }
    });
}

    
    function getUserName(user_id,p){
        var method = "POST";
        var url = "../Php/api/getUserFromReview.php";
        console.log(user_id);
        $.ajax({
            url : url,
            type : method,
            data : {user_id: user_id},
            success: function (res){
                var users = res;
                for(var i=0;i<users.length;i++){
                    var user = users[i];
                    if(user.id == user_id)
                        p.innerHTML= "&#128587; " + user.username;
                }
                
            }
        });
    }

    function alreadyRegistered(current_game_id)
{
    var method = "POST";
    var url="../Php/api/alreadyCommented.php";
    
    $.ajax({
        url : url,
        type : method,
        data : {id:current_game_id},
        success: function (response){
            if(response == 1)
            {  var container=document.getElementById("rating_container");
               var form = document.getElementById("rating_form");
               form.style.display="none";

               var h3=document.createElement("h3");
               h3.innerHTML="You already gave a review";

               container.appendChild(h3);

               var newForm=document.createElement("form");
               newForm.style.textAlign="center";
               newForm.setAttribute("method","post");
               newForm.setAttribute("action","../Php/api/deleteRating.php");

               var button=document.createElement("button");
               button.style.backgroundColor="transparent";
               button.style.cursor="pointer";
               button.style.fontSize="15px";
               button.setAttribute("type","submit");
               button.innerHTML="DELETE"; 

               newForm.appendChild(button);

               container.appendChild(newForm);


            }
            else
            {

            }

        }
        
    });

}