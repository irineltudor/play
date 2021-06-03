function getUserInfo(user_id)
{
  
    var method = "POST";
    var url="../../Php/api/getUsers.php";
    
    $.ajax({
        url : url,
        type : method,
        data : {user_id:user_id},
        success: function (response){
            var users=response;
            for(var i=0;i< users.length;i++)
            {
                var user = users[i];
                var content = document.getElementsByClassName("content")[0];
                var title=content.getElementsByClassName("title")[0];
                if(user.id == user_id)
                title.innerHTML="Are you sure you want to make " + user.username + " admin ?";

            }
        }
    });
    
}

function updateUser(user_id)
{  
   
    var ajax = new XMLHttpRequest();
    var method = "UPDATE";
    var url="../../Php/api/updateUser.php";
    var asynchronous = true;
    console.log(user_id);
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var resp = JSON.parse(this.responseText);
            console.log(resp);
            var content = document.getElementsByClassName("content")[0];
            var title=content.getElementsByClassName("update")[0];
                title.innerHTML="Update done";
    }

}

}

