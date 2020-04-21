<?php
session_start();
include'dbconnection.php';
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$add=$_POST['addr'];
	$msg=mysqli_query($con,"insert into user(first_name,last_name,user_city) values('$fname','$lname','$add');");

/*$regs = $msg -> save();

if ($res){
	echo "Sign Up Successful";
}
else {
	echo "Sign Up Unsuccessful";
}*/
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
						<div class="sign-up" style="margin-left:100px;">
								<input type="reset" class="btn btn-theme" value="Reset">
								<input type="submit" class="btn btn-theme" name="signup"  value="Sign Up" >
								<div class="clear"> </div>
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