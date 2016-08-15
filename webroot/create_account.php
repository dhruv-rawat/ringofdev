<?php session_start();
include("../conn/config.php");



	if($_SERVER["REQUEST_METHOD"]=="POST"){

	$name=$conn->real_escape_string($_POST['name']);
    
    $password=$conn->real_escape_string($_POST['password']);

    $email=$conn->real_escape_string($_POST['email']);

    $Confirm_password=$conn->real_escape_string($_POST['confirmpassword']);


      if($password==$Confirm_password){

      	if($conn->query("INSERT INTO `users_list` (`id`, `name`,`password`, `email`) VALUES (NULL, '$name', '$password','$email')")){

 				echo "<div class=\"alert alert-success fade in text-center\"\>
                    <a href=\"create_account.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Successfully made an ID! Start Booking :)</strong></div>";



 			}
 			else{

 				echo "<div class=\"alert alert-danger fade in text-center\"\>
                        <a href=\"create_account.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>The account has not been created. Some Error has occured in DB </strong></div>";

 				


 			}


      }

      else{

      	echo "<div class=\"alert alert-alert fade in text-center\"\>
                        <a href=\"create_account.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>The Password Confirmation Didnot Matched!Try Again.. </strong></div>";

 			

     

		



	}
      }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lecture Hall Booking Portal">
    <meta name="author" content="Dhruvraj Singh Rawat">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    

	
	
    <!-- jQuery and Bootstrap JS -->
	<script src="../js/jquery.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
		
	

</head>
<body>
 

    <br>

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h3>Account Registration</h3></div>
			<br>
			<div class="panel-body">

				<form id="registration-form" method="POST" class="form-horizontal" action="#">


					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Name</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="name" name="name" placeholder="Account Name" required/>
						</div>
					</div>



					<div class="form-group">
						<label class="col-md-2 control-label" for="email">Email Address</label>
						<div class="col-md-4">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email address" required/>
						</div>
					</div>


					<div class="form-group">
						<label class="col-md-2 control-label" for="password">Password</label>
						<div class="col-md-4">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="confirmpassword">Confirm Password</label>
						<div class="col-md-4">
							<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm password" required />	
						</div>
					</div>	





					<div class="form-group">
						<div class="col-md-6 col-md-offset-2">
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>

					   

				</form>
				
				 <form action="../login.php">
      						<input type="submit" value="Go to Login Page" />
    					</form> 



			

			</div>
		</div>
	</div>
</body>


</html>