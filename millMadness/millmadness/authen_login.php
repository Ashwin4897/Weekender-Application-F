<?php  
session_start();
 require('db_connect.php');

if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Post to var
$username = $_POST['user_id'];
$password = $_POST['user_pass'];

// checking credentials in database
$query = "SELECT * FROM `rlogin` WHERE username='$username' and Password='$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

 
//header("Location:login.php");
    
$error = "username/password incorrect";



    
if ($count == 1){
//redirect to webform submission
    session_start();
$_SESSION['loggedin']= true;
$_SESSION["username"] = $username;     

echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
//echo $query;
header("Location:form.php", true, 301);

}else{
    //invalid login
 $_SESSION["error"] = $error;
    
header("Location:login.php");


   
}
    
    



}

?>