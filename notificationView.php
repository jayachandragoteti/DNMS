<?PHP 
include "./databaseConnection.php";
session_start();
if (isset($_SESSION['faculty'])) {
	header('location:./faculty/index.php');
}
if (isset($_GET['NotificationId']) && $_GET['NotificationId'] !="") {
	$NotificationId = $_GET['NotificationId'];
	$SelectNotificationSql = mysqli_query($connect,"SELECT * FROM `notifications` WHERE `sno` = '$NotificationId'");
	$SelectNotificationRow = mysqli_fetch_array($SelectNotificationSql);
}else {
	header('location:./index.php');
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
	<title>Notification View | Department Notifications</title>
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
                <div class="container mt-5">
                    <div class="row justify-content-md-center">
                        <div class="col-sm-10">
                            <div class="card text-center">
								<div class="card-header bg-primary text-white">
									<h3 class="card-title"><?PHP echo $SelectNotificationRow['name'];?></h3>
								</div>
								<div class="card-body">
									<p class="card-text text-justify"><?PHP echo $SelectNotificationRow['subject'];?></p>
									<footer class="blockquote-footer">To 
										<cite title="Source Title">
											<?PHP 
											if ($SelectNotificationRow['year'] == 0) { echo "For All Years students -";}else{ echo $SelectNotificationRow['year'];}
											if ($SelectNotificationRow['branch'] == "All") { echo "For All Branch students -";}else{ echo $SelectNotificationRow['branch']."-";}  
											if ($SelectNotificationRow['section'] == "All") { echo "For All section students";}else{ echo $SelectNotificationRow['section'];}
											?>
										</cite>
									</footer>
									<?PHP if($SelectNotificationRow['link'] != "" || !empty($SelectNotificationRow['link'])){ ?>
									<a href="<?PHP echo $SelectNotificationRow['link'];?>" class="btn btn-primary"><i class="fas fa-link"></i></a>
									<?PHP } ?>
								</div>
								<?PHP if($SelectNotificationRow['file'] != "" || !empty($SelectNotificationRow['file'])){ ?>
								<div class="embed-responsive ">
									<iframe class="embed-responsive-item" src="./assets/NotificationFiles/<?PHP echo $SelectNotificationRow['file'];?>" width="100%" height="350"></iframe>
								</div>
								<?PHP } ?>
								<div class="card-footer text-muted">
									Psted Date & Time : <?PHP echo $SelectNotificationRow['datm'];?>
								</div>
							</div>
                        </div>
                    </div>
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
							<h3 class="text-uppercase text-left">Department Notification</h3>
							<p>Withholding information is the essence of tyranny. Control of the flow of information is the tool of the dictatorship.</p>
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
				</script> Copyright: <a href="./index.php" class="text-white"></a>DNMS (MVGR)</div>
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