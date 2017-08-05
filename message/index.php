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
    <a href="message.php">Message page</a> <br><br><br>
    
    
    <div style="width: 700px; margin: 0 auto;">
    
        <div style="width: 200px;">
            <p>Elle Fanning</p>
        <img width="200" src="elle.jpg">
        
        <a href="#">Message</a>
        </div>
        
        
        
        <br><br><br>
        
        
<div style="width: 200px;">
            <p>Cara Delevinge</p>
        <img width="200" src="cara.jpg">
        
        <a href="#">Message</a>
        </div>
        
        
          
        <br><br><br>
        
        
        <div style="width: 200px;">
            <p>Heath Ledger</p>
        <img width="200" src="Heath-Ledger.jpg">
        
        <a href="#">Message</a>
        </div>
        
        
    
    </div>
  
    
   <button onclick="setInterval(myFunction, 3000)">Try it</button>

<script>
function myFunction() {
    alert('Hello');
}
</script> 
    
</body>


</html>