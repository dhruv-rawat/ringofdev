<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
}
include("../conn/config.php");

if (!$_SESSION['login_user']){

    header("Location: ../login.php");
    die();
}
    $id=$_SESSION['login_id'];

if(isset($_GET["delete"])){        
    $delete=$_GET['delete'];
    $sql = "DELETE FROM users_content WHERE id=".$delete;

    if (@$conn->query($sql) === TRUE) {
        echo "<div class=\"alert alert-success fade in text-center\"\><a class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Successfully Deleted Blog :)</strong></div>";
    } else {
        echo "<div class=\"alert alert-success fade in text-center\"\><a class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Cannot Delete Blog :)</strong></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CSI Blog">
    <meta name="author" content="Dhruvraj Singh Rawat">
    <title>Dashboard</title>

    

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- StyleSheet for current page -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

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
                    <li  class="active"><a href="index.php">Home</a></li>
                    <li><a href="write_blog.php">Write Blog</a></li>
                </ul>
            </div>

            <div>
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="change_password.php">Change Password</a></li>

             
                    <li><a  href="../logout.php">Log Out</a></li>
                </ul>
            </div>        

        </div>
    </nav>


    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      
    <?php 

        if($result=$conn->query("SELECT * FROM `users_content` WHERE `userid`=".$id))
        {
            $count=$result->num_rows;
            if($count==0)
            {
                echo '<div class="col-md-12 col-sm-12 query-result-alt query-fail"><div  class="query-inside">&nbsp; No Blogs Available</div></div>';
            }
            else
            {
                while($query_row = $result->fetch_assoc())
                {
                    $title=$query_row["title"];
                    $id=$query_row["id"];
                    $content=$query_row["content"];
                    $time=$query_row["time"];
                    echo '<div class="col-md-12 col-sm-12 blogblock">';
                        echo '<div class="row">';
                            echo '<div class="col-md-12 col-sm-12">';
                                echo '<div class="blog-name">'.$title.'</div>';
                            echo '</div>';
                            echo '<div class="col-md-6 col-sm-6">';
                                echo '<div class="blog-date">on '.$time.'</div>';
                            echo '</div>';              
                            echo '<div class="col-md-12 col-sm-12 blog-content"><p>';
                                echo $content;
                            echo '</p></div>';
                            echo '<a class="btn btn-primary" href="index.php?delete='.$id.'">Delete</a>';
                        echo '</div>';
                    echo '</div>';
                }  
            }
        }
        else
        {
            echo '<div class="col-md-12 col-sm-12 query-result-alt query-fail"><div  class="query-inside">&nbsp; No Blogs Available</div></div>';
        }
    ?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>


  </body>
</html>