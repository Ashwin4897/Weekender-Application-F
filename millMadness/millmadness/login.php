<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: form.php");
    exit;
    
    
}
?>


<!DOCTYPE html >
<html>
<img id = "logo" src = "companylogo.png">
    <div id ="indexdiv">
        <a href = "Index.html">Home</a>
        <a href = "About.html">About</a>
        <a href = "Events.php">Events</a>
        <a href = "login.php">MLogin</a>
        <a href = "searchPage.php">Search</a>
        </div>
    <head>
    
<title>Mill Madness Manager Login</title>
<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body id="body_bg">
 <div align="center">

<h1 id = "titleheaders">Mill Madness Manager Login</h1>
    <form id="login-form" method="post" action="authen_login.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" id="user_pass"></input></td>
            </tr>
			
            <tr>
				
                <td><input type="submit" value="Login" />
                <td><input type="reset" value="Reset"/>
				
            </tr>
        </table>
    </form>
 <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span style =color:red;>$error</span>";
                    }
                ?> 
<!--<div id = "invalid" style= visibility: hidden>
    <p>Invalid Login</p>
</div>-->



		</div>

</body>

<body id="body_bg">
 <div align="center">

<h3> To request login, please contact Management@millmadness.com</h3>


		</div>

</body>








</html>
<?php
   
?>