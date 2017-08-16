<html lang="en">
    
    
    
    
<head>
    
    
	<title>Friday Camp - connect with people, you already know.</title>
    
    <meta name="description" content="Create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here.">
    
    <?php include('../templates/head_info.php'); ?>
    
    
</head>
    
    
  
    
<body>
    
    
    
    <div class="centered" style="padding-bottom: 60px;">
    
    <p class="login-logo">friday camp.</p>
    
    
    <p class="login-sub-1">Talk to people (you already know)</p>
        
        
        
        <input id="username" class="login-field-1" type="text" placeholder="username">
        
        
        <input id="password1" class="login-field-1" type="password" placeholder="password">
        
        
        <input id="password2" class="login-field-1" type="password" style="display: none;" placeholder="repeat password"> 
        
        
        <input id="email" class="login-field-1" type="text" style="display: none;" placeholder="email (optional)">
        
        
        
        <p id="loginerror" class="login-error-1"></p>
        
        
        
        <div class="login-button-box-1">
        
        <button id="signup" class="btn login-button-1">sign up</button>
        
        <button id="login" class="btn login-button-1" style="margin-left: 10px;">login</button>
        
        </div>
    
    
    </div>
    
    
    
    
    
</body>
    
    
    
    
    
</html>    



<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    


<script type="text/javascript">
    
    

    
    
// Function to check letters and numbers  
function alphanumeric(inputtxt)  {  
    
    var letterNumber = /^[0-9a-zA-Z]+$/;  
    
    if(inputtxt.match(letterNumber))  {  
    
        return "true";  
    
    }  
    
    else  {   
    
        return false;   
    }  
    
} 



// Function to check email validation    
function ValidateEmail(mail)  { 
    
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  {  
      
    return true;
      
  }  else {
      
    return false;  
  }
    
       
} 
    
    


// When user clicks the login button...
$("#login").on("click", function(){
      
    
        
    var username = $("#username").val();
    
    var password1 = $("#password1").val();
    
    var password2 = $("#password2").val();  
    
    
    
    $("#password2").hide(200);
    
    $("#email").hide(200);
    
    
    
    if ((username.trim().length != 0) && (password1.trim().length != 0)) {
        
        var both_fields_filled = true;
        
    } else {
        
        $("#loginerror").hide(0);    
        
        $("#loginerror").show(300);
        
        $("#loginerror").html("None of the fields can be left blank.");
        
    }
    
    
    
    
    if (both_fields_filled) {

        if ((username.trim().length < 6) || (password1.trim().length < 6) || (username.trim().length > 16)  ||  (password1.trim().length > 16) ) {
        
            
        $("#loginerror").hide(0);    
             
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password cannot be shorter than 6 or bigger than 12 characters.");
            
        
        } else {
            
            var login_length_check = true;
            
        }
    
    }
    
    
    
    
    if (login_length_check) {
        
        
      var username_alphanum = alphanumeric(username);
        
      var password1_alphanum = alphanumeric(password1);
        
          
        if (username_alphanum && password1_alphanum) {

              var login_is_alphanum = true;
        
        } else {
            
            
        $("#loginerror").hide(0);    
             
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password must contain only letters and or numbers.");
            
        }
           
    }
    
    
    
    
    
    if (login_is_alphanum  && both_fields_filled && login_length_check) {
        
        
        login_function(username, password1);
        
    }
    
    
    
    
    
    
});
    
    
    
    
    
    
function login_function(username, password1) {
   
    $.ajax({
        
       data: {"login": 1, "username": username, "password1": password1},
       dataType: 'text',
       url: 'sign_in.php'
        
    }).done(function(data) {
        
       // If successful
       alert(data);
        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
       // If fail
       console.log(textStatus + ': ' + errorThrown);
        
    });
    
    
}







    
$("#signup").on("click", function() {



        
    var username = $("#username").val();
    
    var password1 = $("#password1").val();
    
    var password2 = $("#password2").val();  

    
    $("#password2").show(200);
    
    $("#email").show(200);
    
    
    
    
    
    if ((username.trim().length != 0) && (password1.trim().length != 0) && (password2.trim().length != 0)) {
        
        var both_fields_filled_register = true;
        
    } else {
        
        $("#loginerror").hide(0);    
        
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password fields cannot be left blank.");
        
    }
    
    
    
    
    if (both_fields_filled_register) {

        if ((username.trim().length < 6) || (password1.trim().length < 6) || (username.trim().length > 16)  ||  (password1.trim().length > 16) ) {
        
            
        $("#loginerror").hide(0);    
             
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password fields cannot be shorter than 6 or bigger than 16 characters.");
            
        
        } else {
            
            var login_length_check_register = true;
            
        }
    
    }
    
    
    
    
    
    if (login_length_check_register) {
        
        
      var username_alphanum_register = alphanumeric(username);
        
      var password1_alphanum_register = alphanumeric(password1);
        
          
        if (username_alphanum_register && password1_alphanum_register) {

              var login_is_alphanum_register = true;
        
        } else {
            
            
        $("#loginerror").hide(0);    
             
        $("#loginerror").show(300);
        
        $("#loginerror").html("Username and password must contain only letters and or numbers.");
            
        }
           
    }
    
    
    
    
    if (login_is_alphanum_register) {
        
        if ( $("#password1").val() == $("#password2").val() ) {
            
            var passwords_equal = true;
            
        } else {
            
            
            $("#loginerror").hide(0);    
             
            $("#loginerror").show(300);
        
            $("#loginerror").html("Passwords have to be identical.");
            
            
        }
            
    }
    
    
    
    
    
    if (login_is_alphanum_register  && both_fields_filled_register && login_length_check_register && passwords_equal) {
        
        var email = $("#email").val();
        
        
        if ( email.trim().length == 0 ) {
            
            sign_up_function(username, password1, null);
            
        } else {
            
                var real_email = ValidateEmail(email);
            
                if (real_email) {
        
                    sign_up_function(username, password1, email);
        
                 } else {
        
        
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Your email is not valid.");
        
                }
        }
          
      }
    
    
    

    
    
});




    
function sign_up_function(username, password1, email) {
   
    $.ajax({
        
        
       data: {"register": 1, "username": username, "password1": password1, "email": email},
       dataType: 'text',
       url: '../../../backend/sign_up.php',
       type: "POST"
        
        
    }).done(function(data) {
   
            if (data == 2) {
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Sorry, username already exists.");
                
                
            } else if (data == 3) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("The request has to be of type POST.");
                
                
            } else if (data == 5) {
                
                
                    $("#loginerror").hide(0);    
             
                    $("#loginerror").show(300);
        
                    $("#loginerror").html("Username and password fields cannot be shorter than 6 or bigger than 16 characters. Email cannot exceed 345 characters.");
                
                
            } else  {
                
                
                    var jsonRegister = JSON.parse( data );
            
                    var register_status =  jsonRegister[0];
            
                    var register_session_id =  jsonRegister[1];
                
                    if (register_status == 1) {
                        
                        alert("user created");
                        
                        window.location.replace("https://stackoverflow.com/questions/503093/how-to-redirect-to-another-webpage-in-javascript-jquery");
                    }
                
            }
               

        
    }).fail(function(jqXHR, textStatus, errorThrown) {
        
       // If fail
       console.log(textStatus + ': ' + errorThrown);
        
    });
    
    
}


</script>
    
    
    