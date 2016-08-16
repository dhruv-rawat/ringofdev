<?php
session_start();
include("conn/config.php");



if($_SERVER["REQUEST_METHOD"]=="POST"){

  
	$email=stripslashes($conn->real_escape_string($_POST['email']));
	$password=stripslashes($conn->real_escape_string($_POST['password']));
  


	$result=$conn->query("SELECT name,email,password FROM `users_list` WHERE email='$email' AND password='$password'");

  $count=$result->num_rows;
  

	if($count == 1){

    while($row = $result->fetch_assoc()) {

          $_SESSION['login_user']=$row["name"];
          $_SESSION['login_password']= $row["password"];  
          $_SESSION['login_email']= $row["email"];

        
    }

    
		header("location: webroot/index.php");

	}
	else{
		
    echo "<div class=\"alert alert-danger fade in text-center\"\>
      <a href=\"login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Invalid Username or password</strong></div>";
      


	}
}
?>

   


<!--<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lecture Hall Booking Portal">
    <meta name="author" content="Dhruvraj Singh Rawat">
  

    <title>Signin</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

   
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    
    <link href="css/signin.css" rel="stylesheet">


  </head>

  <body id ="back_1" background="">

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required> 

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>

    <form action="webroot/create_account.php">
      <input type="submit" value="Go to Registration" />
    </form> 


  </body>
</html>-->


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login Page">
    <meta name="author" content="Saket Kumar">
  

    <title>Signin</title>

    
    <link href="css/style.css" rel="stylesheet">


<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
     <label for="inputPassword" class="sr-only">Password</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required> 
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
   
    <form class="form-signin" method="post">
      <label for="inputEmail" class="sr-only"></label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
       <label for="inputPassword" class="sr-only"></label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required> 
      
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <form action="webroot/create_account.php">
      <p class="message">Not registered? <a href="webroot/create_account.php">Create an account</a></p></form>
    </form>
  </div>
</div>

