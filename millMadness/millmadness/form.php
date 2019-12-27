<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
    
      
}
else{
     echo "<h3>you're logged in as </br>", $_SESSION['username'], "</h3>";
    echo "<br/><a href='logout.php'>logout</a>";
}



       $connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'millmad');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}


$sql_CompanyGet = "SELECT business_name from rlogin where username = '" . $_SESSION['username'] . "'";
    


    $companyName = mysqli_query($connection, $sql_CompanyGet);
  


?>



<!DOCTYPE HTML>




<html>  
    
    <link rel = "stylesheet" type="text/css" href = "Style.css">
    <body>
        <div id ="indexdiv">
        <a href = "Index.html">Home</a>
        <a href = "About.html">About</a>
        <a href = "Events.php">Events</a>
        <a href = "login.php">MLogin</a>
        <a href = "searchPage.php">Search</a>
        
        </div>
    
<body>

<form action="" method="post" enctype="multipart/form-data" id = biographydiv>

    <?php while ($row = mysqli_fetch_array($companyName)) 
{
    
    echo "<h3>Company: ".$row['business_name']."</h3>";
} 
    ?>
    <br>
Event: <input type="text" name="eName"><br><br>
Description: <input type="text" name="description"><br><br>
Select image to upload: <input type="file" name="image" id="fileToUpload"><br>
<!--<input type="submit" value="Upload Image" name="submit"><br>-->


<br>
<input type="submit" name="insert">
</form>

</body>
</html>
   

    

    
<?php
    
    
    
    
    
    //db connection
    if(!empty($_POST)){
        $connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'millmad');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
        	
$sql_CompanyGet = "SELECT business_name from rlogin where username = '" . $_SESSION['username'] . "'";

$result = mysqli_query($connection, $sql_CompanyGet);
        
        $resultarr = mysqli_fetch_assoc($result);
        $cName = $resultarr["business_name"];
//
//    $companyName = mysqli_query($connection, $sql_CompanyGet);
//  
//        while ($row = mysqli_fetch_array($companyName)) {
//            
//             $Company = mysqli_real_escape_string($connection, $_REQUEST[$row['business_name']]);
//        }
        
        
    $eName = mysqli_real_escape_string($connection, $_REQUEST['eName']);
    
    $description = mysqli_real_escape_string($connection, $_REQUEST['description']);
    //$file = addslashes(file_get_contents($_FILES["image"]));  
   
        
        
    $image = $_FILES['image']['name'];   
    $target = "images/".basename($image);
        
 
    $sql = "INSERT INTO timeline (`eventName`, `business`, `descrip`, `image`, `time`) VALUES ('$eName','$cName','$description', '$image', now())";
        
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
        
        
      if(mysqli_query($connection, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}   
    
        mysqli_close($connection);

    }
    
    ?>
    





