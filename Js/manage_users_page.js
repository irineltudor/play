function getUsers(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getUsers.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var listUsers=document.getElementsByClassName("w3-ul","w3-card-4")[0];
            var listAdmins=document.getElementsByClassName("w3-ul","w3-card-4")[1];
            var users = JSON.parse(this.responseText);
            for(var i=0;i< users.length;i++)
            { 
              var name = users[i].username;
              var id = users[i].id;
              var admin = users[i].admin;
              console.log(id);

              var li = document.createElement("li");
              li.classList.add("w3-display-container");
              li.innerHTML=name;
              li.style.border="2px solid black";


              var makeAdmin=document.createElement("form");
              makeAdmin.setAttribute("action","../../Html/admin/setAdmin.php");
              makeAdmin.setAttribute("method","post");

              var setButton=document.createElement("button");
              setButton.setAttribute("type","submit");
              setButton.setAttribute("name","id");
              setButton.setAttribute("value",id);
              setButton.classList.add("w3-button","w3-transparent","w3-display-right");
              setButton.style.marginRight="35px";
              setButton.innerHTML="Make Admin";

              makeAdmin.appendChild(setButton);

              var deleteForm=document.createElement("form");
              deleteForm.setAttribute("action","../../Php/api/deleteUser.php");
              deleteForm.setAttribute("method","post");
              deleteForm.setAttribute("id" , "delete-form");

              var deleteButton = document.createElement("button");
              deleteButton.setAttribute("type","submit");
              deleteButton.setAttribute("name","id");
              deleteButton.setAttribute("value",id);
              deleteButton.classList.add("w3-button","w3-transparent","w3-display-right");
              deleteButton.innerHTML="&times;";

              deleteForm.appendChild(deleteButton);

              
              if(admin == 1)
              {
                
                li.appendChild(deleteForm);
                listAdmins.appendChild(li);
              }
              else{
                li.appendChild(makeAdmin);
                li.appendChild(deleteForm);
                listUsers.appendChild(li);
                
              }
              

            }
        }
    }
}

getUsers();

$('form.addAdmin').on('submit',function(){
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
            if(response == 1){
                window.location.href = "../admin/manage_users_page.html";
            }
        }
    });
    

    return false;
});