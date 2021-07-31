<?PHP
include "./../databaseConnection.php";
session_start();
if (!isset($_SESSION['faculty'])) {
	header('location:./../logout.php');
}
$FacultyId = $_SESSION['faculty'];
if (isset($_POST['deleteSubmit'])) {
	if (isset($_POST['NotifSno']) && $_POST['NotifSno'] !="") {
		$NotifSno = $_POST['NotifSno'];
		$SelectNotification = mysqli_query($connect,"SELECT * FROM `notifications` WHERE `sno`= '$NotifSno' ");
		$SelectNotificationRow = mysqli_fetch_array($SelectNotification);
		if ($SelectNotificationRow['file'] != "") {
			$file = $SelectNotificationRow['file'];
			unlink("./../assets/NotificationFiles/$file") or die(mysqli_error());
		}
		$DeleteNotification = mysqli_query($connect,"DELETE FROM `notifications` WHERE `sno` = '$NotifSno'");
		if ($DeleteNotification) {
			echo "<script>alert('Deleted');</script>"; 
		}else {
			echo "<script>alert('Failed,try again!');</script>"; 
		}
	}else {
		echo "<script>alert('Failed,try again!');</script>"; 
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
							<div class="col-md-12">
								<div class="card text-center">
									<div class="card-header">
										<h2 class="text-primary fw-bold large">My Notification</h2>
									</div>
									<div class="card-body justify-content-md-center">
										<div class="container">
											<div class="row justify-content-md-center">
												<div class="col-md-12 mt-lg-5">
													<div class="row justify-content-md-center">
														<div class="col col-lg-12">
															<div class="container">
																<form method="POST" action="<?PHP echo $_SERVER['PHP_SELF'];?>">
																	<div class="row justify-content-md-center">
																		<div class="col-sm-2">
																			<select name="year" id="availableNotificationsYearFilter"  class="form-select bg-light mb-2" aria-label="Default select example">
																				<option selected value="">Year</option>
																				<option value="">All</option>
																				<option value="0">Open</option>
																				<option value="1">1st Year</option>
																				<option value="2">2nd Year</option>
																				<option value="3">3rd Year</option>
																				<option value="4">4th Year</option>
																			</select>
																		</div>
																		<div class="col-sm-2">
																			<select name="branch" id="availableNotificationsBranchFilter" class="form-select bg-light mb-2" aria-label="Default select example">
																				<option selected value="">Branch</option>
																				<option value="">All</option>
																				<option value="All">Open</option>
																				<option value="ECE">ECE</option>
																				<option value="CSE">CSE</option>
																				<option value="IT">IT</option>
																				<option value="MECH">MECH</option>
																				<option value="CIVIL">CIVIL</option>
																				<option value="EEE">EEE</option>
																				<option value="CHEMICAL">CHEMICAL</option>
																			</select>
																		</div>
																		<div class="col-sm-2">
																			<select name="section" id="availableNotificationsSectionFilter" class="form-select bg-light mb-2" aria-label="Default select example" >
																				<option selected value="">Section</option>
																				<option value="">All</option>
																				<option value="All">Open</option>
																				<option value="A">A</option>
																				<option value="B">B</option>
																				<option value="C">C</option>
																			</select>
																		</div>
																		<div class="col-sm-2">
																			<select name="ShowRows" class="form-select bg-light mb-2" aria-label="Default select example">
																				<option selected value="">Show Rows</option>
																				<option value="10">10</option>
																				<option value="20">20</option>
																				<option value="30">30</option>
																				<option value="40">40</option>
																				<option value="50">50</option>
																				<option value="60">60</option>
																				<option value="70">70</option>
																				<option value="80">80</option>
																				<option value="90">90</option>
																				<option value="100">100</option>
																				<option value="More">More</option>
																			</select>
																		</div>
																		<div class="col-sm-2 d-flex justify-content-center">
																			<input type="submit" class="btn bg-primary text-white mb-2" name="NotificationFilter" value="Search" />
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<div class="row justify-content-md-center mt-5 jumbotron jumbotron-fluid ">
														<div class="col col-sm-10">
															<!-- table -->
															<div class="table-responsive">
																<table  id="dtBasicExample" cellspacing="0" width="100%"class="table table-striped table-hover table-bordered border-primary ">
																	<thead>
																		<tr class="p-2 bg-primary text-white">
																			<th scope="col">Notification</th>
																			<th scope="col">year</th>											
																			<th scope="col">Branch</th>											
																			<th scope="col">Section</th>
																			<th scope="col">View</th>
																			<th scope="col">Delete</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?PHP 
																			$SelectNotification = "SELECT * FROM `notifications` WHERE `facultyId`= '$FacultyId'";
																			if (isset($_POST['NotificationFilter'])) {
																				if (isset($_POST['year']) && $_POST['year'] !="") {
																					$year  = $_POST['year'];
																					$SelectNotification .= "AND `year` = '$year'";
																				}
																				if (isset($_POST['branch']) && $_POST['branch'] !="") {
																					$branch  = $_POST['branch'];
																					$SelectNotification .= "AND `branch` = '$branch'";
																				}
																				if (isset($_POST['section']) && $_POST['section'] !="") {
																					$section  = $_POST['section'];
																					$SelectNotification .= "AND `section` = '$section'";
																				}
																				$limit = 10;
																				if (isset($_POST['ShowRows']) && $_POST['ShowRows'] !="") {
																					if ($_POST['ShowRows'] == "More") {
																						$limit = 10000000000000000000000000000000;
																					}else{
																						$limit = $_POST['ShowRows'];
																					}
																				}
																				$SelectNotification .="ORDER BY `sno` DESC LIMIT $limit ";
																			}
																			
																			$SelectNotificationSql = mysqli_query($connect,$SelectNotification);
																			if (mysqli_num_rows($SelectNotificationSql) > 0) {
																				while ($SelectNotificationRow = mysqli_fetch_array($SelectNotificationSql)) { ?>
																				<tr class="p-2">
																					<td scope="col"><?PHP echo $SelectNotificationRow['name'];?></td>
																					<td scope="col"><?PHP if ($SelectNotificationRow['year'] == 0){echo "All";}else{ echo $SelectNotificationRow['year']; }?></td>											
																					<td scope="col"><?PHP echo $SelectNotificationRow['branch'];?></td>											
																					<td scope="col"><?PHP echo $SelectNotificationRow['section'];?></td>
																					<td scope="col" class="d-flex justify-content-center">
																						<a href="myNotificationsView.php?NotificationId=<?PHP echo $SelectNotificationRow['sno'];?>" class="btn bg-primary text-white"><i class="far fa-eye"></i></a>
																					</td>
																					<td scope="col">
																					<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?PHP echo $SelectNotificationRow['sno'];?>"><i class="fas fa-trash-alt"></i></button>
																					</td>
																				</tr>
																				<!-- Modal -->
																				<div class="modal fade" id="Delete<?PHP echo $SelectNotificationRow['sno'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																				<div class="modal-dialog">
																					<div class="modal-content">
																					<div class="modal-header">
																						<h5 class="modal-title" id="exampleModalLabel">Delete</h5>
																						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																					</div>
																					<div class="modal-body">
																						
																					</div>
																					<div class="modal-footer">
																						<button type="button"  class="btn btn-secondary"  data-bs-dismiss="modal">NO</button>
																						<form method="POST"action="<?PHP echo $_SERVER['PHP_SELF']?>">
																							<input type="hidden" name="NotifSno" value="<?PHP echo $SelectNotificationRow['sno'];?>"/>
																							<input type="submit" name="deleteSubmit"  class="btn btn-danger" value="YES" />
																						</form>
																					</div>
																					</div>
																				</div>
																				</div>
																		<?PHP } }else { ?>
																			<tr class="p-2">
																				<td scope="col" colspan="6" class="text-center">
																					<p class="btn bg-primary text-white"> No Data Found!</p>
																				</td>
																			</tr>
																		<?PHP } ?>
																	</tbody>
																</table>
																<!-- end table -->
															</div>
														</div>
													</div>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></>
	<!-- Core theme JS-->
	<script src="./../assets/js/DashboardScript.js"></script>
    <script src="./script.js"></script>
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>