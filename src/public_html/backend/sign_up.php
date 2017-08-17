<?php  include_once('../../includes/all_classes_and_functions.php');  ?>


<?php


require '../phpmailer/PHPMailerAutoload.php';

 



$user_input = '';

$password_input = '';

$email_input = '';




if(request_is_post()) {

    
if (isset($_POST['register']))  {
    
    

    $user_input = $_POST['username'];
    
    $password_input = password_hash(test_input($_POST['password1']), PASSWORD_DEFAULT);
    
    $email_input = $_POST['email']; 
    
    
  
    
    
         if (ctype_alnum($user_input)) {
        
        
         } else {

                  echo 4;
             
                  exit();
       
         }
    
    
    
    
    
    
        if (ctype_alnum($_POST['password1'])) {
        
        
         } else {

                  echo 4;
             
                  exit();
       
         }
    
    
    
    
    
    
    
         if ($_POST['password1'] != $_POST['password2']) {
        
        
                 echo 7;
             
                 exit();
        
         }
    
    
    
    
    
    if ( 
        
        (strlen(trim($_POST['username'])) > 16) || 
        
        (strlen(trim($_POST['username'])) < 6) ||
        
        (strlen(trim($_POST['password1'])) > 16) ||
        
        (strlen(trim($_POST['password1'])) < 6) ||
        
        (strlen(trim($_POST['email'])) > 345) )
        
        {
        
              echo 5;
            
              exit();
        
        }
    
    
        
        
        
        if (strlen(trim($_POST['email'])) == 0 ) {
    
        
        }  else {
        
        
               if (!filter_var($email_input, FILTER_VALIDATE_EMAIL) === false) {
        
               } else {
           
                    echo 6;
                   
                    exit();
        
               }
        
        }
        
        
        

  

    
    

        
  $newuser = $user->does_user_exist($user_input); 
    
    
    
  $newuser_result = $newuser->get_result();
    
    
    
 if($newuser_result->num_rows == 0) {
     
       $user->create_user($user_input, $password_input, $email_input);
     
       $last_id = $database->connection->insert_id;
     
       $_SESSION['admin_id'] = $last_id;
     
       $mail = new PHPMailer;

       $mail->ClearAddresses();

       $mail->addAddress($_POST['email'], $_POST['username']); 

       $mail->setFrom('noreply@fridaycamp.com', 'Friday Camp');

       $mail->Subject = 'Thanks for signing up.';

       $mail->AddEmbeddedImage('../assets/email_image.png', 'campfire');

       $mail->Body = "<div style='background: #ffd;  padding-top: 20px; border-radius: 25px; padding-bottom: 40px;'><img style='width: 150px; height: 150px; display: table; margin: 0 auto;' src='cid:campfire'/><p style='font-family: georgia;'>

       <h1 style='font-family: georgia; display: table; margin: 0 auto; margin-top: 30px;'>Hello " . $_POST['username'] .  ", </h1><br><br>

       <span style='color: black; font-family: georgia; padding-left: 10px; padding-right: 10px; width: 100%; max-width: 400px; display: table; margin: 0 auto; padding-bottom: 40px;'>Thanks for joining Friday Camp. We are the very first hub & directory for programmers here in Kenya. You can create, display and update your resume, find jobs, find a co-founder, message your hero, meet other techies, all here. It's as simple as that. <br><br>

       If you have any questions, you can email me at atsunewjoint@gmail.com <br><br>

       Thanks, <br><br>

       Atsu Davoh, Founder. <br><br></span>
       
       </p></div>";

       $mail->isHTML(true);
     
       $mail->send();
     
       $mail->ClearAddresses();
     

       $register_array = array("status"=> 1, "id"=> $last_id);     
    
       echo json_encode(array_values($register_array));
     
       exit();

}  else {
    
     
       echo 2;
     
       exit();
     
 } 
    
    
      
    

}}
    
 else  {
    
       echo 3;
       exit();
}    


?>