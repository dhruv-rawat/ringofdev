<?php
if (session_status() == PHP_SESSION_NONE) {
      session_start();
}
include("../conn/config.php");

if (!$_SESSION['login_user']){

    header("Location: ../login.php");
    die();
}
else{

    if(@isset($_POST["title"]) && @isset($_POST["content"])){     
    
    $id=$_SESSION['login_id'];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $sql = "INSERT INTO users_content (`id`, `title`, `content`, `time`, `userid` ) VALUES (null, '$title', '$content', null, '$id')";
    

    if (@$conn->query($sql) === TRUE) {
        echo "<div class=\"alert alert-success fade in text-center\"\>
                      <a href=\"create_account.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Successfully added the Blog :)</strong></div>";
    } else {
        echo "<div class=\"alert alert-success fade in text-center\"\>
                      <a href=\"create_account.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Cannot add the Blog :)</strong></div>";
    }

}
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- BootstrapValidator CSS -->
    <link href="../css/bootstrapValidator.min.css" rel="stylesheet"/>
  
      <!-- jQuery and Bootstrap JS -->

    <script src="../js/jquery.js"></script>
 
    <script src="../js/bootstrap.min.js"></script>
      
    <!-- BootstrapValidator -->
    <script src="../js/bootstrapValidator.min.js" type="text/javascript"></script>


  </head>

  <body>

  <nav class="navbar navbar-default">
        <div class="container-fluid">

            <!-- Logo -->
            <div class="navbar-header">
                <a href="#" class="navbar-brand">BLOG</a>
            </div>

            <!-- Menu Items -->
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a   class="active" href="write_blog.php">Write Blog</a></li>
                    
                </ul>
            </div>

            <div>
                <ul class="nav navbar-nav navbar-right">
                    
                    <li ><a href="change_password.php">Change Password</a></li>
             
                    <li><a  href="../logout.php">Log Out</a></li>
                </ul>
            </div>        

        </div>
    </nav>
    <br>
    
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading text-center"><h3>Add Blog</h3></div>
      <br>
      <div class="panel-body">

        <form method="POST" class="form-horizontal" action="#" align="center">
          <input type="text" name="title" class="col-md-12 col-sm-12" placeholder="Title">
          <textarea name="content" class="col-md-12 col-sm-12" placeholder="Content"></textarea><br><br>
          <div class="col-md-6 col-md-6">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>


      </div>
    </div>
  </div>
</body>

</html>