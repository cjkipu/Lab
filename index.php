<?php
  include_once 'dbconnection.php';
  include_once 'User.php';
  include_once 'FileUploader.php';
  $con = new DBConnector;

  if (isset($_POST['signup'])) {
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $city = $_POST['addr'];
    $username = $_POST['usrnam'];
    $password = $_POST['pass'];

    $user = new User($first_name, $last_name, $city, $username, $password);
    if (!$user->validateForm()) {
        $user->createFormErrorSessions();
        header("Refresh:0");
        die();
    } elseif ($user->isUserExist($con->conn)) {
        session_start();
        $_SESSION['username'] = "Username taken.";
        header("Refresh: 0");
        die();
    }

    $uploader = new FileUploader();
    $uploader->uploadFile();
    $target_file = $uploader->target_file;
    $res = $user->save($con->conn, $target_file);

    if ($res) {
      echo "Save operation successful!";
      if ($uploader->isUploadOk()){
          echo "Image uploaded";
      } else {
          echo "Not uploaded";
      }
    } else {
      echo "An error occurred!";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Create</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
  <?php
                        session_start();
                        if (!empty($_SESSION['form-errors'])) {
                            echo $_SESSION["form-errors"];
                            unset($_SESSION['form-errors']);
                        }

                        if (!empty($_SESSION['username'])) {
                            echo $_SESSION['username'];
                            unset($_SESSION['username']);
                        }
                    ?>
  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Create</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>

        </header>
       <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <h5 class="centered"></h5>
              	  	
                  <li class="mt">
                      <a href="manageusers.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="index.php" >
                          <i class="fa fa-users"></i>
                          <span>Create users</span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
     
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>New User</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg']=""; ?></p>
                           
							<form class="form-horizontal style-form" name="registration" method="post" action="" enctype="multipart/form-data">


                        <div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First Name </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" value=""  name="fname" required >
							</div>
						</div>	


						<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Last Name </label>
								<div class="col-sm-10">
								<input type="text" class="form-control" value="" name="lname"  required >
							</div>
						</div>	

						<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">User City </label>
								<div class="col-sm-10">
								<input type="text" class="form-control" value="" name="addr"  required>
							</div>
						</div>	
                        <div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Username </label>
								<div class="col-sm-10">
								<input type="text" class="form-control" value="" name="usrnam"  required>
							</div>
						</div>	
                        <div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Password </label>
								<div class="col-sm-10">
								<input type="password" class="form-control" value="" name="pass"  required>
							</div>
						</div>	
                        <div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Profile Picture </label>
								<div class="col-sm-10">
								<input type="file" class="form-control" value="" name="fileToUpload"  required>
							</div>
						</div>
						<div class="sign-up" style="margin-left:100px;">
								<input type="reset" class="btn btn-theme" value="Reset">
								<input type="submit" class="btn btn-theme" name="signup"  value="Sign Up" >
								<div class="clear"> </div>
						</div>
                        <br>
                        <div class="sign-up" style="margin-left:100px;">
                        <td><a href="login.php">Log In</a> </td>
						</div>
							</form>
                      
                  </div>
              </div>
		</section>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>