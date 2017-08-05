<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "message";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);



?>


<!doctype html>

<html>

<head>
    
    <title>  Messaging App </title>
    
</head>
    
    
    <body>
        
        
        <?php 
         
        $query = "SELECT * FROM messages WHERE (sender = 'cara' AND receiver = 'elle' ) OR (sender = 'elle' AND receiver = 'cara' ) ";
        $result = mysqli_query($connection, $query);
        
         while ($list = mysqli_fetch_assoc($result)) { ?>
        
        
        
        
        <p style="<?php  if ( $list['receiver'] == 'cara' ) { echo 'color: red;';}  else { echo 'color: blue;';} 
                  
                  
                  
                  ?>"><?php echo $list['message']; ?></p>
        
        
        <?php
        
         }
        
        
        ?>
        
        
        
        
         
        <?php 
         
        $queryy = "SELECT sender FROM messages WHERE receiver = 'elle' ";
        $resulty = mysqli_query($connection, $queryy);
        
         while ($listy = mysqli_fetch_assoc($resulty)) { ?>
        
        
        
        
        <p><?php  echo $listy['sender']; ?></p>
        
        
        <?php
        
         }
        
        
        ?>
        
        
        
        
        <?php
        $querty = "SELECT blogs.userid, follow.followee, blogs.content
FROM blogs
INNER JOIN follow
ON ( blogs.userid=follow.followee ) AND (follow.follower = 100)";
        
        $resultx = mysqli_query($connection, $querty);
        
        
        while ($listx = mysqli_fetch_assoc($resultx))  { ?>
            
            
        
        <p><?php echo $listx['content'];  ?></p>
        
        
            
       <?php     
        }
        
        ?>
        
        
        
           <?php
        $querty = "SELECT distinct messages.sender, messages.receiver
FROM messages
INNER JOIN messages
ON ( receiver = {$_SESSION['admin_id']} ) AND ( sender = {$_SESSION['admin_id']})";
        
        $resultx = mysqli_query($connection, $querty);
        
        
        while ($listx = mysqli_fetch_assoc($resultx))  { ?>
            
            
        
        <p><?php echo $listx['content'];  ?></p>
        
        
            
       <?php     
        }
        
        ?>
        
        
       <!-- 
    FOLLOWING.
        
        1. When you click the follow button, a record is inserted into the follow table.
        
        As. James follows Atsu.
            Kolama follows Atsu.
            Dennis follows Atsu.
        
        2. So to find the number of people who follow atsu, we select followers where following = atsu. and find the count of that result.
        
        3. On the timeline, however, we "SELECT from blogs WHERE user_id =  followers = me" 
        
        
        -->
        
    
    </body>
    
    
</html>
