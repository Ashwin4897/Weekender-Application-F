<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'millmad');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}



    $sql = "SELECT * FROM timeline ORDER BY time DESC;";
  $result = mysqli_query($connection, $sql);
    
    $comsql = "SELECT * FROM comments ORDER BY time DESC;";
    $comresult = mysqli_query($connection, $comsql);


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
    <h1 id= "titleheaders">Events</h1>
    
<link rel = "stylesheet" type="text/css" href = "Style.css">
    
   
  <?php
        
    while ($row = mysqli_fetch_array($result)) {
//**FIRST DIVISION*****
//Display events
//first division - detials
        echo "<div class = 'grid-container'>";
        
        echo "<div class = 'grid-item'>
           <h2 id='eventTitle'>".$row['business']."</h2>
           
           <h3 id = 'subheadTitle'>Event: ".$row['eventName']."</h3>
      	   <img style='border: 8px solid black;'' height ='300' width = '300' src='images/".$row['image']."' >
        
           <h3>Date: ".$row['time']."</h3>
      	   
           <h3>Description: ".$row['descrip']."</h3>
             </div>";
        
        
//**NEXT DIVISION **************
//COMMENT INSERT
//second division - insert comment
        echo "
        <div class = 'grid-item'>
         <h2 id = 'eventTitle'>Post Comment</h2>
         <form id = 'commentsubform' action = '' method = 'POST' enctype= 'multipart/form-data'>
        Name: <input type = 'text'' name = 'name'><br/><br>
        Comment: <textarea name = 'comment'></textarea><br/>
        <input type = 'submit' value = 'Post'><br/>
        </form>
        </div>";
        
        
        
        echo "<div class = 'grid-item'>
            <h2 id = 'eventTitle'>Recent Comments</h2>";
         while ($comrow = mysqli_fetch_array($comresult)) {
           
        echo "
            
           <h3 id='subheadTitle'>".$comrow['name']."</h2>
           <h3 id = 'commentBox'>".$comrow['message']."</h3>
           <p id = 'dateBox'>Date: ".$comrow['time']."</p>";
             
        }
      echo  "</div>";
        
        echo "</div>";
        echo "</br>";
        echo "</br>";
        
        
        
    } //end of while for DIV 1 and DIV 2
        
//Start while for Div 3 - Display comments
//**NEXT DIVISON***************
//COMMENT DISPLAY
//third division - posted comments
       
   
        
        
        
//Action to submit comment *** SUBMISSION FOR DIVISION 2****
        if(!empty($_POST)){
        $connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'millmad');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
        $Name = mysqli_real_escape_string($connection, $_REQUEST['name']);
        $Comment = mysqli_real_escape_string($connection, $_REQUEST['comment']);
        
        $sql = "INSERT INTO comments (`message`, `name`, `time`) VALUES ('$Comment', '$Name', now())" ;
        
         if(mysqli_query($connection, $sql)){
    echo "Comment Submitted.";
} 
            else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}   
        mysqli_close($connection);
        
        }
        
     
  ?>
   
   
    </body>
</html>