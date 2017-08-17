<?php  include_once('../../includes/all_classes_and_functions.php');  ?>



<?php



$user_input = '';



if(request_is_post()) {
   
if (isset($_POST['login']))  {
    
    

 $user_input = $_POST['username'];
    
    
    
  
         if (ctype_alnum($user_input)) {
        
        
         } else {

                  echo 4;
             
                  exit();
       
         }
    
    
    
    
    
    
        if (ctype_alnum($_POST['password'])) {
        
        
         } else {

                  echo 4;
             
                  exit();
       
         }
   
    

    
    
    
    
    
        if ( 
        
        (strlen(trim($_POST['username'])) > 16) || 
        
        (strlen(trim($_POST['username'])) < 6) ||
        
        (strlen(trim($_POST['password'])) > 16) ||
        
        (strlen(trim($_POST['password'])) < 6) )
        
        {
        
              echo 5;
            
              exit();
        
        }
    
    
    
    
    
    
     
 $founduser = $user->does_user_exist($user_input); 
    
 $founduser_result = $founduser->get_result();
    
    
    
 if($founduser_result->num_rows == 1) {
     
     
    
         while($row = $founduser_result->fetch_assoc()) {
             
    
               if (password_verify($_POST['password'], $row['password'])) { 
                   
                   
               $register_array = array("status"=> 1, "id"=> $row['id']);     
    
               echo json_encode(array_values($register_array));
             

               }
     
               else {
         
                      echo 2;
     
                      exit();
     
                 
               }
     
         }
    
    
     
}  else {
    
     
       echo 2;
     
       exit();
     
     
}
    

}
    
} else  {
    
    
       echo 3;
       exit();
    
}    




?>