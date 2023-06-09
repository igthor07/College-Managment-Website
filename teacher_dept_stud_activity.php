<!DOCTYPE html>

<?php 		
			include 'connection_db.php'; 
			session_start();
      $t_id = $_SESSION["t_id_session"];

      if($t_id == ""){
        header("Location:login_teacher.php");
      }
	  
	  if(isset($_SESSION['keyword'])){
	
}else{
	$_SESSION['keyword']="";
}

$fname = "";
$lname = "";
$email = "";
$profile = "";
$category = "";
 $sql = "SELECT * from teacher_tb where teacher_id = '$t_id'";
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
                           if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_assoc($result)){
                                 $fname = $row['first_name'];
                                 $lname = $row['last_name'];
                                 $email = $row['email'];
                                 $profile = $row['profile_img'];
                                 $category = $row['category'];
                                
                                }

                              }
							

      if($category != "Department"){
        header("Location:login_teacher.php");
      }
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


  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.php">
       <img src="assets/images/cwit_logo.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Teacher Login</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header"><h5>MAIN NAVIGATION (Department Staff) </h5></li>
    <li>
        <a href="teacher_dept_dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i>  <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="teacher_dept_profile.php">
         <i class="zmdi zmdi-face"></i> <span>Profile</span>
        </a>
      </li>

   
      <li>
        <a href="teacher_dept_stud.php">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Student info</span>
        </a>
      </li>

	  <li>
        <a href="teacher_dept_stud_activity.php">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Activity </span>
        </a>
      </li>
	  
      <li>
        <a href="teacher_dept_marks.php">
          <i class="zmdi zmdi-grid"></i> <span>Upload Marks</span>
        </a>
      </li>
      
      <li>
        <a href="teacher_dept_curriculum.php">
          <i class="zmdi zmdi-assignment-o"></i><span>Curriculum</span>
        </a>
      </li>
    
        
      <li>
        <a href="login_teacher.php">
          <i class="zmdi zmdi-lock"></i> <span>Logout</span>
        </a>
      </li>

       
     
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->


<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
   <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
	
    <li class="nav-item">
      <form class="search-bar" action="teacher_dept_stud_activity_search.php" method ="POST" >
        <input type="text" class="form-control" placeholder="Enter Enrollment Number/Student Name/Event Name/Event Venue Or Event Date" name="keyword">
     </li>
	&nbsp;&nbsp;&nbsp;
	<li class="nav-item">
       <button type="submit" value = "submit" name="submit" class="btn btn-light btn-block mt-0">
		 <i class="icon-magnifier"></i></a></button>
     </form>
    </li>
	<!-- <form class="search-bar" action="csv_export/index.php" method ="POST" target ="blank" >
	<li class="nav-item">
       <button type="submit" value = "submit" name="submit" class="btn btn-light btn-block mt-0">
		 <i class="icon-magnifier"></i> Export to csv</button>
     </li>
	 </form> -->
	
	
  </ul>
     
   <ul class="navbar-nav align-items-center right-nav-link">
  
   
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="assets\images\profile_img\teacher\<?php echo"$profile";?>" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets\images\profile_img\teacher\<?php echo"$profile";?>" alt="user avatar"></div>
            <div class="media-body">
             <h6 class="mt-2 user-title"><?php echo"$fname $lname";?></h6></a>
            <p class="user-subtitle"><?php echo"$email";?></p>
            </div>
           </div>
          </a>
        </li>
          <li class="dropdown-divider"></li>
        <a href="teacher_dept_profile.php"> <li class="dropdown-item"><i class="zmdi zmdi-account-circle"></i> Profile</li>
        <li class="dropdown-divider"></li>
    <a href="login_teacher.php">   
     <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
     <a>
      </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
     
     <!--Start Dashboard Content-->


        

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Student Activity</h5>
               
			  <div class="table-responsive">
			  <table class="table">
              <table class="table table-hover">
                <thead>
                  <tr>
						<th scope="col">#</th>
						
						
						<th scope="col"><center>Roll no</th>
						<th scope="col"><center>Name</th>
						<th scope="col"><center>Event Name</th>
						<th scope="col"><center>Event Description</th>
						<th scope="col"><center>Event Venue</th>
						<th scope="col"><center>Start Date</th>
						<th scope="col"><center>End Date</th>
						<th scope="col"><center>Certificate</th>
						
						 
                  </tr>
                </thead>
                <?php 
				// display all info
					
						 $keyword = $_SESSION['keyword'];
						 if ($keyword == ""){
							 $sql = "select * from activity_tb";
						 }else{
							  $sql = "select * from activity_tb where (roll_no like '%$keyword%' or event_name like '%$keyword%'  or name like '%$keyword%' or event_venue like '%$keyword%' or start_date like '%$keyword%' or end_date like '%$keyword%') order by roll_no asc ";
						 }
						
						
										
											$count = 1;
											
											$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
											while($row = mysqli_fetch_assoc($result)) {
												echo "<tr><td> <center>".$count." </td><td><center>".$row['roll_no']
												." </td><td><center>".$row['name']
												." </td><td><center>".$row['event_name']
												." </td><td><center>".$row['event_desc']
												." </td><td><center>".$row['event_venue']
												." </td><td><center>".$row['start_date']
												." </td><td><center>".$row['end_date']
												

												." </td><td><center>"."<form action = 'teacher_dept_stud_certificate.php' method = 'POST' target='blank'>
												<input type='hidden' value='$row[roll_no]' name = 'roll_no'>												
												<input type='hidden' value='certificate' name = 'column_name'>
												<button type ='submit' class='btn btn-primary' value='submit]'>View Certificate</button></form>"


												." </td>";
								
												$count++;
											
										} 
										$str = $conn->error;
										echo "$str";
										
										
							
										
					?>
				 
                </tbody>
              </table>
            </div>
          
    
    

		 
			 
				
			  

	
      <!--End Dashboard Content--> 
           
               
	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2021 The Base.
        </div>
      </div>
    </footer>
	<!--End footer-->
	
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
   
  </div><!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
	
</body>
</html>
