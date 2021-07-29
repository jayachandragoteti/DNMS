<?PHP
include "./../databaseConnection.php";
session_start();
if (!isset($_SESSION['faculty'])) {
	header('location:./../logout.php');
}
$facultyId = $_SESSION['faculty'];
$SelectFaculty = mysqli_query($connect,"SELECT * FROM `faculty` WHERE `id` = '$facultyId '");
$SelectFacultyRow = mysqli_fetch_array($SelectFaculty);
if (isset($_POST['Update'])) {
	if ($_POST['FacultyName'] != "" && $_POST['FacultyContactNo'] != "" && $_POST['FacultyEmail'] != "" && $_POST['FacultyDegree'] != "") {
		$FacultyName = $connect -> real_escape_string($_POST['FacultyName']);
		$FacultyContactNo = $connect -> real_escape_string($_POST['FacultyContactNo']);
		$FacultyEmail = $connect -> real_escape_string($_POST['FacultyEmail']);
		$FacultyDegree = $connect -> real_escape_string($_POST['FacultyDegree']);
		$updateUser = mysqli_query($connect,"UPDATE `faculty` SET `name`='$FacultyName',`degree`='$FacultyDegree',`email`='$FacultyEmail',`contact`='$FacultyContactNo' WHERE `id` = '$facultyId'");
		if ($updateUser) {
			echo "<script>alert('Updated Successfully.')</script>";
		}else {
			echo "<script>alert('Update failed,try again')</script>";
		}
	}else {
		echo "<script>alert('All fields must be filled!')</script>";
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
			<div class="sidebar-heading border-bottom bg-primary font-weight-bold text-white">Department&nbspNotifications</div>
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
										<h2 class="text-primary fw-bold large">My Profile</h2>
									</div>
									<div class="card-body justify-content-md-center">
										<div class="container">
											<div class="row justify-content-md-center">
												<div class="col-md-8 mt-lg-5">
													<form method="post">
														<div class="mb-3 text-primary ">
															<label for="FacultyId" class="form-label">Faculty Id</label>
															<input type="text" id="FacultyId" value="<?PHP echo $SelectFacultyRow['id'];?>" class="form-control border-primary border shadow-none"  disabled/> 
														</div>
														<div class="mb-3 text-primary">
															<label for="FacultyName" class="form-label">Name</label>
															<input type="text" name="FacultyName" id="FacultyName" value="<?PHP echo $SelectFacultyRow['name'];?>" class="form-control border-primary border shadow-none" required/> 
														</div>
														<div class="mb-3 text-primary ">
															<label for="FacultyContactNo" class="form-label">Contact No</label>
															<input type="phone" name="FacultyContactNo" id="FacultyContactNo" value="<?PHP echo $SelectFacultyRow['contact'];?>" class="form-control border-primary border shadow-none" required/> 
														</div>
														<div class="mb-3 text-primary">
															<label for="email" class="form-label">Email</label>
															<input type="email" name="FacultyEmail" id="email" value="<?PHP echo $SelectFacultyRow['email'];?>" class="form-control border-primary border shadow-none" required/> 
														</div>
														<div class="mb-3 text-primary ">
															<label for="Degree" class="form-label">Degree</label>
															<input type="text" name="FacultyDegree" id="Degree" value="<?PHP echo $SelectFacultyRow['degree'];?>" class="form-control border-primary  border shadow-none" required/> 
														</div>
														<div class=" mb-3 text-primary text-center mt-2">
															<input type="submit" class="btn btn-sm btn-primary fw-bold rounded-pill " name="Update" style="font-size:20px;" value="    Update   " /> 
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