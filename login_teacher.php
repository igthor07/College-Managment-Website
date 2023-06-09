<!DOCTYPE html>
<?php 		
			include 'connection_db.php'; 
			session_start();
			session_destroy();
?>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>The Base - Teacher</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/cwit_logo.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">
 

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="assets/images/cwit_logo.png"  height="250px" alt="college logo">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Teacher Sign In</div>


		    <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Teacher ID</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" class="form-control input-shadow" placeholder="Enter Teacher ID" name="t_id" maxlength="10" required>
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" class="form-control input-shadow" placeholder="Enter Password" name ="t_password" maxlength="25" required>
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>





        <button type="submit" name= "submit" class="btn btn-light btn-block" value="Submit">Sign In</a></button>


        <?php
               //query
			    if(isset($_POST['submit'])){
					
			   $id = $_POST['t_id'];
			   $password = $_POST['t_password'];
				
				$sql = "SELECT * FROM teacher_tb WHERE teacher_id = '{$id}' AND t_password= '{$password}' AND flag = 1" ;
						$result = mysqli_query($conn, $sql) or die("Query Failed.");
                              if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_assoc($result)){
                                  session_start();
                                  $_SESSION["t_id_session"] = $row['teacher_id'];
                                  $_SESSION["t_password_session"] = $row['t_password'];
                                  $_SESSION["t_category"] = $row['category'];
                                  if($_SESSION["t_category"] == "Department"){
                                  	header("Location:teacher_dept_dashboard.php");
                                  }
                                  if($_SESSION["t_category"] == "Library"){
                                  	header("Location:teacher_lib_dashboard.php");
                                  }
                                  if($_SESSION["t_category"] == "Office"){
                                  	header("Location:teacher_office_dashboard.php");
                                  }
                                }

                              }else{
								 
                              echo '<br><div class="alert alert-danger"><center>Username and Password are not matched.</div>';
                            }
						
						
				}
			   
               ?>
			 







			 </form>
		   </div>
		  </div>
		  <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Login As  <a href="login_admin.php">  Admin</a><a href="index.php">/Student</a></p>
		  
		   
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
</body>
</html>
