<?PHP
include "./../databaseConnection.php";
session_start();
if (!isset($_SESSION['faculty'])) {
	header('location:./../logout.php');
}
$FacultyId = $_SESSION['faculty'];

if (isset($_POST['AddNotification'])) {
	if (condition) {
		$event_banner= $_FILES['event_banner']['name'];
		$event_banner_file = $_FILES['event_banner']['tmp_name'];
		$event_banner_size = $_FILES['event_banner']['size'];
	} else {
		# code...
	}
	
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<!--Favicon-->
	<link rel="icon" href="./../assets/images/logo.gif" type="image/gif" sizes="16x16">
	<!-- Page title -->
	<title>Department Notifications</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="./../assets/css/styles.css" rel="stylesheet" /> 
</head>

<body>
	<div class="d-flex" id="wrapper">
		<!-- Sidebar-->
		<div class="border-end bg-white" id="sidebar-wrapper">
			<div class="sidebar-heading border-bottom bg-primary font-weight-bold text-white">
				Department&nbspNotifications
			</div>
			<div class="list-group list-group-flush"> 
                <a href="index.php" class="list-group-item list-group-item-action list-group-item-light p-3 text-primary sidebarToggle Profile " ><i class="fas fa-user-alt"></i> Profile</a> 
                <a href="addNotifications.php" class="list-group-item list-group-item-action list-group-item-light p-3 text-primary sidebarToggle  AddNotification"><i class="fas fa-bell"></i> Add Notification</a> 				
                <a href="changePassword.php" class="list-group-item list-group-item-action list-group-item-light p-3 text-primary sidebarToggle  ChangePassword"><i class="fa fa-key mr-3"></i> Change Password</a> 
                <a href="myNotifications.php" class="list-group-item list-group-item-action list-group-item-light p-3 text-primary sidebarToggle  MyNotifications"><i class="fas fa-bell"></i> My Notifications</a> 
			</div>
		</div>
		<!-- Page content wrapper-->
		<div id="page-content-wrapper">
			<!-- Top navigation-->
			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<div class="container-fluid"> 
					<a href="#"><i class="fas fa-bars text-primary sidebarToggle" ></i></a>
                    <a href="#" class="navbar-toggler">
						<i class="fas fa-power-off"></i>
                    </a>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto mt-2 mt-lg-0">
							<li class="nav-item active"><a class="nav-link text-primary" href="./../logout.php"><i class="fas fa-power-off"></i></a></li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- Page content-->
			<div class="container-fluid">
				<!-- Main -->
				<main class="ajax-main-content">
				<div class="container mt-5">
						<div class="row justify-content-md-center">
							<div class="col-md-8 ">
								<div class="card text-center">
									<div class="card-header">
										<h2 class="text-primary fw-bold large">Add Notification</h2>
									</div>
									<div class="card-body justify-content-md-center">
										<div class="container">
											<div class="row justify-content-md-center">
												<div class="col-md-8 mt-lg-5">
													<form method="post" action="<?PHP echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
														<div class="mb-3 text-primary">
															<label for="NotificationName" class="form-label">Notification Name *</label>
															<input type="text" name="NotificationName" id="NotificationName" class="form-control border-primary border shadow-none" required/> 
														</div>
														<div class="mb-3 text-primary ">
															<label for="NotificationDescription" class="form-label">Subject - Description *</label>
															<textarea  name="NotificationDescription" id="NotificationDescription" rows="3" class="form-control border-primary border shadow-none" required></textarea>
														</div>
														<div class="mb-3 text-primary">
															<label for="NotificationYear" class="form-label">year</label>
															<select name="NotificationYear" id="NotificationYear"  class="form-select bg-light mb-2" aria-label="Default select example">
																<option selected value="">Year</option>
																<option value="1">1st Year</option>
																<option value="2">2nd Year</option>
																<option value="3">3rd Year</option>
																<option value="4">4th Year</option>
															</select>
														</div>
														<div class="mb-3 text-primary ">
															<label for="NotificationYearBranch" class="form-label">Branch</label>
															<select name="NotificationYearBranch" id="NotificationYearBranch" class="form-select bg-light mb-2" aria-label="Default select example">
																<option selected value="">Branch</option>
																<option value="ECE">ECE</option>
																<option value="CSE">CSE</option>
																<option value="IT">IT</option>
																<option value="MECH">MECH</option>
																<option value="CIVIL">CIVIL</option>
																<option value="EEE">EEE</option>
																<option value="CHEMICAL">CHEMICAL</option>
															</select>
														</div>
														<div class="mb-3 text-primary ">
															<label for="NotificationYearSection" class="form-label">Section</label>
															<select name="NotificationYearSection" id="NotificationYearSection" class="form-select bg-light mb-2" aria-label="Default select example" >
																<option selected value="">Section</option>
																<option value="A">A</option>
																<option value="B">B</option>
																<option value="C">C</option>
															</select>
														</div>
														<div class="mb-3 text-primary ">
															<label for="NotificationFile" class="form-label">File</label>
															<input type="text" name="NotificationFile" id="NotificationFile" class="form-control border-primary border shadow-none" /> 
														</div>
														<div class="mb-3 text-primary ">
															<label for="NotificationLink" class="form-label">Link</label>
															<input type="file" name="NotificationLink" id="NotificationLink" class="form-control border-primary border shadow-none" /> 
														</div>
														<div class=" mb-3 text-primary text-center mt-2">
															<input type="submit" class="btn btn-sm btn-primary fw-bold rounded-pill " name="AddNotification" style="font-size:20px;" value="Add" /> 
														</div>
													</form>
												</div>
											</div>
										</div> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
				<!-- End Main -->
			</div>
		</div>
	</div>
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Core theme JS-->
	<script src="./../assets/js/DashboardScript.js"></script>
    <script src="./script.js"></script>
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>