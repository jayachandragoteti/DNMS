<?PHP
include "./databaseConnection.php";
session_start();
if (isset($_SESSION['faculty'])) {
	header('location:./faculty/index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<!--Favicon-->
	<link rel="icon" href="./assets/images/logo.gif" type="image/gif" sizes="16x16">
	<!-- Page title -->
	<title>Department Notifications</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Main CSS -->
	<link href="./assets/css/main.css" rel="stylesheet" /> 
</head>
	

<body>
	<!-- Header -->
	<header class="navbar navbar-dark bg-primary">
		<div class="container-fluid ">
			<div class="container d-flex align-items-center justify-content-between">
				<div class="d-flex align-items-center"> <i class="far fa-calendar-alt  text-white">&nbsp</i><span id="dateYear" class="text-white"></span> </div>
				<div class="d-flex align-items-center"> <i class="far fa-clock text-white">&nbsp</i> <span id="datetime" class="text-white"></span> </div>
			</div>
		</div>
	</header>
	<!-- End Header -->
	<!-- Navbar -->
	<nav>
		<div class="logo mx-auto"> <img src="./assets/images/logo.gif" height="150px" width="150px"> </div>
		<input type="checkbox" id="click">
		<label for="click" class="menu-btn" id="sidebarCollapse"> <i class="fas fa-bars"></i> </label>
		<ul class="mx-auto">
			<li><a href="index.php" class="text-decoration-none Home" > Home</a></li>
			<?PHP 
				if (isset($_SESSION['student'])) { ?>
				<li><a href="changePassword.php" class="text-decoration-none ChangePassword" >Change Password</a></li>
				<li><a href="profile.php" class="text-decoration-none Profile" >Profile</a></li>
				<li><a href="logout.php" class="text-decoration-none">Logout</a></li>
			<?PHP }else{ ?>
				<li><a href="register.php" class="text-decoration-none Register"  for="click">Register</a></li>
				<li><a href="login.php" class="text-decoration-none Login" >Login</a></li>
			<?PHP } ?>
			
		</ul>
	</nav>
	<!-- End Navbar -->
	
	<!-- Main -->
		<main class="ajax-main-content">
			<section>
				<div class="jumbotron jumbotron-fluid bg-primary " style="height: 350px;">
					<div class="container">
						<div class="row">
							<div class="col-sm mt-5">
								<h1 class="display-4 text-center text-white fw-bold">
									Department Notifications
									<i class="far fa-bell blink "></i>
								</h1>
								<p class="lead text-center text-white font-weight-bold mt-5">Withholding information is the essence of tyranny. Control of the flow of information is the tool of the dictatorship.</p>
								<p class="lead text-white font-weight-bold text-center mt-5 "> <a class="btn border-primary btn-light text-primary rounded-pill p-2" href="#SearchNotifications" role="button">Search</a> </p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="container mt-5" id="SearchNotifications">
					<div class="row justify-content-md-center">
						<div class="col col-lg-8 text-center text-primary mb-5">
							<h2 class="h1">Available Notifications</h2> </div>
					</div>
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
										</tr>
									</thead>
									<tbody>
										<?PHP 
											$SelectNotification = "SELECT * FROM `notifications` WHERE `facultyId`!=''";

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
												$SelectNotification .="ORDER BY `notifications`.`sno` DESC LIMIT $limit ";
											}
											
											$SelectNotificationSql = mysqli_query($connect,$SelectNotification);
											$num = mysqli_num_rows($SelectNotificationSql)or die(mysqli_error($connect));
											if ($num > 0) {
												while ($SelectNotificationRow = mysqli_fetch_array($SelectNotificationSql)) { ?>
												<tr class="p-2">
													<td scope="col"><?PHP echo $SelectNotificationRow['name'];?></td>
													<td scope="col"><?PHP if ($SelectNotificationRow['year'] == 0){echo "All";}else{ echo $SelectNotificationRow['year']; }?></td>											
													<td scope="col"><?PHP echo $SelectNotificationRow['branch'];?></td>											
													<td scope="col"><?PHP echo $SelectNotificationRow['section'];?></td>
													<td scope="col" class="d-flex justify-content-center">
														<a href="notificationView.php?NotificationId=<?PHP echo $SelectNotificationRow['sno'];?>" class="btn bg-primary text-white"><i class="far fa-eye"></i></a>
													</td>
												</tr>
										<?PHP } }else { ?>
											<tr class="p-2">
												<td scope="col" colspan="5" class="text-center">
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
                    <!-- img with Notifications -->
				<div class="container mt-5 border-1">
					<div class="row">
						<div class="col-lg-6 mt-5">
							<div class="text-center text-primary">
								<h2 class="h1">Maharaj Vijayaram Gajapathi Raj College of Engineering (Autonomous)</h2> 
							</div>
						</div>
						<div class="col-lg-6"> <img src="./assets/images/Graduation.svg" class="img-fluid" width="100%"> </div>
					</div>
				</div>
				<!-- end of img Notifications -->
				</div>
				
			</section>			
		</main>
	<!-- End Main -->

	<!-- Footer -->
	<div class="container-fluid pb-0 mb-0 justify-content-center text-white bg-primary ">
		<footer>
			<div class="row my-5 justify-content-center py-5">
				<div class="col-11">
					<div class="row ">
						<!-- Grid column -->
						<div class="col-md-8 mt-md-0 mt-3">
							<!-- Content -->
							<h3 class="text-uppercase text-left">Department Notifications</h3>
							<p>Never be so dependent on technology that a notification is the only thing that brings you hope.</p>
						</div>
						<div class="col-xl-2 col-md-4 col-sm-4 col-12">
							<h6 class="mb-3 mb-lg-4 bold-text "><b>MENU</b></h6>
							<ul class="list-unstyled">
							<li><a href="index.php" class="text-decoration-none text-white Home" ><i class="fas fa-angle-right"></i>  Home</a></li>
							<?PHP if (isset($_SESSION['student'])) { ?>
								<li><a href="changePassword.php" class="text-decoration-none text-white ChangePassword"><i class="fas fa-angle-right"></i>  Change Password</a></li>
								<li><a href="profile.php" class="text-decoration-none text-white Profile"><i class="fas fa-angle-right"></i>  Profile</a></li>
								<li><a href="logout.php" class="text-decoration-none text-white "><i class="fas fa-angle-right"></i> Logout</a></li>
							<?PHP } else{ ?>
								<li><a href="register.php" class="text-decoration-none text-white Register" ><i class="fas fa-angle-right"></i>  Register</a></li>
								<li><a href="login.php" class="text-decoration-none text-white Login" ><i class="fas fa-angle-right"></i>  Login</a></li>
							<?PHP } ?>								
							</ul>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<!-- Copyright -->
			<div class="footer-copyright text-center py-3">©
				<script>
				document.write(new Date().getFullYear())
				</script> Copyright: <a href="./index.php" class="text-white"></a>DNMS (MVGR)</div>W
			<!-- Copyright -->
		</footer>
	</div>
	<!-- Footer -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="./assets/js/script.js"></script>
	<script src="./script.js"></script>
</body>

</html>