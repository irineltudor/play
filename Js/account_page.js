function getUserInfo(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../Php/api/getUserInfo.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var accountInfo = document.getElementsByClassName("accountinfo")[0];
            var user = JSON.parse(this.responseText);
           
            var username = document.createElement("p");
            username.innerHTML="Hi " + user.username;

            var firstname = document.createElement("p");
            firstname.innerHTML="First Name : " + user.firstname;

            var lastname = document.createElement("p");
            lastname.innerHTML="Last Name : " + user.lastname;

            var email = document.createElement("p");
            email.innerHTML="Email : " + user.emailaddress;

            var changePass = document.createElement("h1");
            changePass.innerHTML="Change Password";

            var form = document.createElement("form");
            form.setAttribute("action" , "../Php/api/changePass.php");
            form.setAttribute("method","post");
            form.classList.add("change-password");

            var label1=document.createElement("label");
            label1.setAttribute("for","pass");
            label1.innerHTML="Your Password : ";

            var yourPassword = document.createElement("input");
            yourPassword.setAttribute("name", "pass");
            yourPassword.setAttribute("id", "pass");
            yourPassword.setAttribute("type","password");
            yourPassword.setAttribute("placeholder","type your passowrd");
            yourPassword.required=true;

            var label2=document.createElement("label");
            label2.setAttribute("for","newpass");
            label2.innerHTML="Your New Password : ";

            var newPassword = document.createElement("input");
            newPassword.setAttribute("name", "newpass");
            newPassword.setAttribute("id", "newpass");
            newPassword.setAttribute("type","password");
            newPassword.setAttribute("placeholder","type your new passowrd");
            newPassword.required=true;

            var label3=document.createElement("label");
            label3.setAttribute("for","renewpass");
            label3.innerHTML="Retype your New Password : ";

            var reNewPassword = document.createElement("input");
            reNewPassword.setAttribute("name", "renewpass");
            reNewPassword.setAttribute("id", "renewpass");
            reNewPassword.setAttribute("type","password");
            reNewPassword.setAttribute("placeholder","type your new passowrd again");
            reNewPassword.required=true;

            var submit = document.createElement("button");
            submit.setAttribute("type","submit");
            submit.setAttribute("value","Submit");
            submit.innerHTML="Submit";

            accountInfo.appendChild(username);
            accountInfo.appendChild(firstname);
            accountInfo.appendChild(lastname);
            accountInfo.appendChild(email);

            var content = document.getElementsByClassName("content")[0];

            form.appendChild(label1);
            form.appendChild(yourPassword);

            form.appendChild(label2);
            form.appendChild(newPassword);

            form.appendChild(label3);
            form.appendChild(reNewPassword);

            form.appendChild(submit);

            content.appendChild(changePass);
            content.appendChild(form);


            $('form.change-password').on('submit',function(){


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
                yourPassword.value='';
                newPassword.value='';
                reNewPassword.value='';
                
                $.ajax({
                    url : url,
                    type : type,
                    data : data,
                    dataType: 'json',
                    success: function (response){
                        var text = document.getElementsByClassName("error")[0];
                        if(response['number'] == 0)
                        {
                            text.style.backgroundColor="red";
                            text.innerHTML=response['text'];
                        }
                        else{
                            text.style.backgroundColor="green";
                            text.innerHTML=response['text'];
                        }

                        text.style.display="block";
            
                    }
                });
                
            
                return false;
            });
            
        }
    }
    
    }



    getUserInfo();