<?php

//****************
//ACTION TO USE SEARCH BAR
//****************


    if(!isset($_POST['search'])){
        header("Location:index.php");
    }

session_start();

$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'millmad');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}


$search_sql="SELECT business, eventName, time, image, descrip FROM timeline WHERE business LIKE '%".$_POST['search']."%' ORDER BY time DESC;";
$search_query = mysqli_query($connection, $search_sql);
       
 if(mysqli_num_rows($search_query) !=0 ){
     $search_rs = mysqli_fetch_array($search_query);
 }      

?>



<!DOCTYPE html>
<html> 
    
    <body>
    <img id = "logo" src = "companylogo.png"> 
    <div id ="indexdiv">
        <a href = "Index.html">Home</a>
        <a href = "About.html">About</a>
        <a href = "Events.php">Events</a>
        <a href = "login.php">MLogin</a>
        <a href = "searchPage.php">Search</a>
        
    </div>
    <h1 id= "titleheaders"> Search Events</h1>
    
<link rel = "stylesheet" type="text/css" href = "Style.css">
<div id = "content">
  <h3>Search Results</h3>
        
        <?php
        if(mysqli_num_rows($search_query) !=0 ){
        do {?>
        <h3></h3>
            
        <?php } 
            while ($row = mysqli_fetch_array($search_query));{
                  
            echo "<div id = 'biographydiv'>
           <h2 id='eventTitle'>".$search_rs['business']."</h2>
           
           <h3>Event: ".$search_rs['eventName']."</h3>
      	   <img style='border: 8px solid black;'' height ='300' width = '300' src='images/".$search_rs['image']."' >
        
           <h3>Date: ".$search_rs['time']."</h3>
      	   
           <h3>Description: ".$search_rs['descrip']."</h3>
             </div>";
            
            }
            
        }
            else {
                echo "No results found";
            }
       
       ?>
        
</div>
     
    </body>
</html>



        
      
        
        
        
        
 