<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ajax";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);



if (mysqli_connect_errno()) {
    echo "Your database probably has a syntax error!";
    
}





if(isset($_POST['done']))  {
    
    $name = $_POST['name'];
    
    $query = "INSERT INTO timeline (name) VALUES ( '{$name}')";
    
    $result = mysqli_query($connection, $query);
    
    exit();
    
    
    
    
    
    
    
    
}



if(isset($_POST['melted']))  {
    
    $laminate = $_POST['laminate'];
    
    $query1 = "select * from timeline where id > '{$laminate}' ";
    
    $result1 = mysqli_query($connection, $query1);
    
    $rows = array();
while($r = mysqli_fetch_assoc($result1)) {
    $rows[] = $r;
}



echo json_encode(array('allposts' => $rows));

    
  /*  while ($row = mysqli_fetch_assoc($result1)) {
        
        echo $row['name'] . "<br>";
        
        
    } */
    
    exit();
    
    
    
    
}










if(isset($_POST['felted']))  {
    
    $laminate = $_POST['laminate'];
    
      if ($laminate == 0) {
          
          $query2 = "select * from timeline order by id desc limit 3";
          
      } else {
          
          $query2 = "select * from timeline where id < '{$laminate}' order by id desc limit 3";
          
      }
    
    
    
    $result2 = mysqli_query($connection, $query2);
    
    $row2 = array();
while($r2 = mysqli_fetch_assoc($result2)) {
    $row2[] = $r2;
}



echo json_encode(array('allposts1' => $row2));

    
  /*  while ($row = mysqli_fetch_assoc($result1)) {
        
        echo $row['name'] . "<br>";
        
        
    } */
    
    exit();
    
    
    
    
}






















?>