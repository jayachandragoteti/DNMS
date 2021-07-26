<?PHP 

include "./databaseConnection.php";
session_start();
if (isset($_SESSION['faculty'])) {
	header('location:./faculty/index.php');
}

if (isset($_POST['FacultyRegistration'])) {
    if (isset($_POST['FacultyName']) && $_POST['FacultyName'] != "" && isset($_POST['FacultyId']) && $_POST['FacultyId'] != "" && isset($_POST['FacultyEmail']) && $_POST['FacultyEmail'] != "" && isset($_POST['FacultyContactNo']) && $_POST['FacultyContactNo'] != "" && isset($_POST['FacultyPassword']) && $_POST['FacultyPassword'] != "" && isset($_POST['FacultyConfirmPassword']) && $_POST['FacultyConfirmPassword'] != "") {
        $FacultyId = $connect -> real_escape_string($_POST['FacultyId']);
        $FacultyCheck = "SELECT * FROM `faculty` WHERE `id` = '$FacultyId'";
        $FacultyCheckSql = mysqli_query($connect,$FacultyCheck);
        if ( mysqli_num_rows($FacultyCheckSql) > 0) {
            echo "<script>alert('User already exist,Try to login')</script>";
            echo "<script>window.location='login.php';</script>";
        }else {
            $FacultyName = $connect -> real_escape_string($_POST['FacultyName']); 
            $FacultyEmail = $connect -> real_escape_string($_POST['FacultyEmail']);
            $FacultyContactNo = $connect -> real_escape_string($_POST['FacultyContactNo']);
            $FacultyDegree = $connect -> real_escape_string($_POST['FacultyDegree']);
            $FacultyPassword = $connect -> real_escape_string($_POST['FacultyPassword']);
            $FacultyConfirmPassword = $connect -> real_escape_string($_POST['FacultyConfirmPassword']);
            // Hash Password
            $hashed_password = password_hash($FacultyPassword, PASSWORD_DEFAULT);
            // Allow +, - and . in phone number
            $filtered_phone_number = filter_var($FacultyContactNo, FILTER_SANITIZE_NUMBER_INT);
            // Remove "-" from number
            $phone_to_check = str_replace("-", "", $filtered_phone_number);
            if ($FacultyPassword != $FacultyConfirmPassword) {
                echo "<script>alert('Password and confirm password should be same!')</script>";
                echo "<script>window.location='register.php';</script>";
            }else if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
                echo "<script>alert('Invalid phone number!')</script>";
                echo "<script>window.location='register.php';</script>";
            }elseif(!filter_var($FacultyEmail, FILTER_VALIDATE_EMAIL)){
                echo "<script>alert('Invalid email format!')</script>";
                echo "<script>window.location='register.php';</script>";
            } else {
                $FacultyRegisterQuery = "INSERT INTO `faculty`(`name`, `id`, `degree`, `email`, `contact`, `password`) VALUES ('$FacultyName','$FacultyId','$FacultyDegree','$FacultyEmail','$FacultyContactNo','$hashed_password')";
                $FacultyRegisterSql = mysqli_query($connect,$FacultyRegisterQuery);
                if ($FacultyRegisterSql) {
                    echo "<script>alert('Registered successfully.')</script>";
                    echo "<script>window.location='index.php';</script>";
                } else {
                    echo "<script>alert('Registration failed,try again!')</script>";
                    echo "<script>window.location='register.php';</script>";
                }
            }
        }
    }else {
        echo "<script>alert('All fields must be filled!')</script>";
        echo "<script>window.location='register.php';</script>";
    }
}
if (isset($_POST['StudentRegistration'])) {
    if (isset($_POST['StudentName']) && $_POST['StudentName'] != "" && isset($_POST['StudentEmail']) && $_POST['StudentEmail'] != "" && isset($_POST['contactNo']) && $_POST['contactNo'] != "" && isset($_POST['StudentDob']) && $_POST['StudentDob'] != "" && isset($_POST['StudentId']) && $_POST['StudentId'] != "" && isset($_POST['StudentConfirmPassword']) && $_POST['StudentConfirmPassword'] != "") {
        $StudentId = $connect -> real_escape_string($_POST['StudentId']);
        $StudentCheck = "SELECT * FROM `students` WHERE `id` = '$StudentId'";
        $StudentCheckSql = mysqli_query($connect,$StudentCheck);
        if (mysqli_num_rows($StudentCheckSql) > 0) {
            echo "<script>alert('User already exist,Try to login')</script>";
            echo "<script>window.location='login.php';</script>";
        }else {
            $StudentName = $connect -> real_escape_string($_POST['StudentName']); 
            $StudentEmail = $connect -> real_escape_string($_POST['StudentEmail']);
            $contactNo = $connect -> real_escape_string($_POST['contactNo']);
            $StudentDob = $connect -> real_escape_string($_POST['StudentDob']);
            $StudentYear = $connect -> real_escape_string($_POST['StudentYear']);
            $StudentBranch = $connect -> real_escape_string($_POST['StudentBranch']);
            $StudentSection = $connect -> real_escape_string($_POST['StudentSection']);
            $StudentPassword = $connect -> real_escape_string($_POST['StudentPassword']);
            $StudentConfirmPassword = $connect -> real_escape_string($_POST['StudentConfirmPassword']);
            // Hash Password
            $hashed_password = password_hash($StudentPassword, PASSWORD_DEFAULT);
            // Allow +, - and . in phone number
            $filtered_phone_number = filter_var($contactNo, FILTER_SANITIZE_NUMBER_INT);
            // Remove "-" from number
            $phone_to_check = str_replace("-", "", $filtered_phone_number);
            if ($StudentPassword != $StudentConfirmPassword) {
                echo "<script>alert('Password and confirm password should be same!')</script>";
                echo "<script>window.location='register.php';</script>";
            }else if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
                echo "<script>alert('Invalid phone number!')</script>";
                echo "<script>window.location='register.php';</script>";
            }elseif(!filter_var($StudentEmail, FILTER_VALIDATE_EMAIL)){
                echo "<script>alert('Invalid email format!')</script>";
                echo "<script>window.location='register.php';</script>";
            } else {
                $StudentRegisterQuery = "INSERT INTO `students`(`name`, `id`, `email`, `contactNo`, `dob`, `year`, `branch`, `section`, `password`) VALUES ('$StudentName','$StudentId','$StudentEmail','$contactNo','$StudentDob','$StudentYear','$StudentBranch','$StudentSection','[value-10]')";
                $StudentRegisterSql = mysqli_query($connect,$StudentRegisterQuery);
                if ($StudentRegisterSql) {
                    echo "<script>alert('Registered successfully.')</script>";
                    echo "<script>window.location='index.php';</script>";
                } else {
                    echo "<script>alert('Registration failed,try again!')</script>";
                    echo "<script>window.location='register.php';</script>";
                }
            }
        }
    } else {
        echo "<script>alert('All fields must be filled!')</script>";
       // echo "<script>window.location='register.php';</script>";
    }
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
	<title>Register | Department Notifications</title>
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
			<li><a href="changePassword.php" class="text-decoration-none ChangePassword" >Change Password</a></li>
            <li><a href="profile.php" class="text-decoration-none Profile" >Profile</a></li>
			<li><a href="logout.php" class="text-decoration-none">Logout</a></li>
			<li><a href="register.php" class="text-decoration-none Register"  for="click">Register</a></li>
			<li><a href="login.php" class="text-decoration-none Login" >Login</a></li>
		</ul>
	</nav>
	<!-- End Navbar -->
	
	<!-- Main -->
		<main class="ajax-main-content">
			<section>
                <div class="container mt-5">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-md-center shift-register">
                                    <div class="col-lg-4">
                                        <button class="btn btn-sm btn-primary rounded-pill fw-bold FacultyRegistrationButton">Faculty</button>
                                    </div>
                                    <div class="col-lg-4">
                                        <button class="btn btn-sm btn-primary rounded-pill fw-bold StudentRegistrationButton bg-light border-primary text-primary">Student</button>
                                    </div>
                                </div>
                                <!--======================Student registration================================-->
                                <div class="container mt-5 StudentRegistrationForm " style="display: none;">
                                    <div class="row mt-5 ">
                                        <div class="col-lg-12">
                                            <h1 class="text-center mb-5 text-primary">Student Registration</h1>
                                        </div>
                                        <div class="col-sm-6"> 
                                            <img src="./assets/images/student.svg" class="img-fluid mt-5 h-75 w-100" alt="...">
                                        </div>
                                        <div class="col-sm-6">
                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="md-5">
                                                
                                                <div class="mb-3">
                                                    <label for="StudentName" class="form-label">Name</label>
                                                    <input type="text" class="form-control border-primary shadow-none" name="StudentName" id="StudentName" required/> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="StudentEmail" class="form-label">Email</label>
                                                    <input type="email" class="form-control border-primary shadow-none" name="StudentEmail" id="StudentEmail" required/> 
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="contactNo" class="form-label"> Contact No</label>
                                                    <input type="tel" name="StudentContactNo" class="form-control border-primary shadow-none" id="contactNo" required/> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="StudentDob" class="form-label">DOB</label>
                                                    <input type="date" name="StudentDob" class="form-control border-primary shadow-none" id="StudentDob" required/> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="StudentId" class="form-label">Roll Number</label>
                                                    <input type="text" name="StudentId" class="form-control border-primary shadow-none" id="StudentId" required/> 
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="StudentYear" class="form-label">Year</label>
                                                    <select class="form-select shadow-none border-primary" aria-label="Default select example" name="StudentYear" id="StudentYear">
                                                        <option selected value="">Select Year</option>
                                                        <option value="1">1st Year</option>
                                                        <option value="2">2nd Year</option>
                                                        <option value="3">3rd Year</option>
                                                        <option value="4">4th Year</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="StudentBranch" class="form-label">Branch</label>
                                                    <select class="form-select shadow-none border-primary" aria-label="Default select example" name="StudentBranch" id="StudentBranch">
                                                        <option selected value="">Select Branch</option>
                                                        <option value="ECE">ECE</option>
                                                        <option value="CSE">CSE</option>
                                                        <option value="IT">IT</option>
                                                        <option value="MECH">MECH</option>
                                                        <option value="CIVIL">CIVIL</option>
                                                        <option value="EEE">EEE</option>
                                                        <option value="CHEMICAL">CHEMICAL</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="StudentSection" class="form-label">Section</label>
                                                    <select class="form-select shadow-none border-primary" aria-label="Default select example" name="StudentSection" id="StudentSection">
                                                        <option selected value="">Select Section</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="StudentPassword" class="form-label">Password</label>
                                                    <input type="password" name="StudentPassword" class="form-control border-primary shadow-none" id="StudentPassword" required/> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="StudentConfirm Password" class="form-label">Confirm Password</label>
                                                    <input type="password" name="StudentConfirmPassword" class="form-control border-primary shadow-none" id="StudentConfirmPassword" required/> 
                                                </div>
                                                <div class=" mb-3 text-center">
                                                    <input type="submit" class="btn btn-sm btn-primary fw-bold " name="StudentRegistration" style="font-size:20px;" value="Register" /> 
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--======================End Student registration================================-->
                                <div class="container mt-5 z-index">
                                    <div class="row mt-5 FacultyRegistrationForm">
                                        <div class="col-lg-12">
                                            <h1 class="text-center mb-5 text-primary">Faculty Registration</h1> </div>
                                        <div class="col-sm-6"> 
                                            <img src="./assets/images/teacher.svg" class="img-fluid mt-5 h-75 w-100" alt="..."> 
                                        </div>
                                        <div class="col-sm-6">
                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"" class="md-5">
                                                <div class="mb-3">
                                                    <label for="FacultyName" class="form-label">Faculty Name</label>
                                                    <input type="text" name="FacultyName" class="form-control border-primary shadow-none"  id="FacultyName" required/> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Id" class="form-label">Id </label>
                                                    <input type="text" name="FacultyId" class="form-control border-primary shadow-none" id="Id" required/> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="FacultyEmail" class="form-control border-primary shadow-none" id="email" required/> 
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="contactNo" class="form-label">Contact No</label>
                                                    <input type="phone" name="FacultyContactNo" class="form-control border-primary shadow-none" id="contactNo" required/> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Degree" class="form-label">Degree</label>
                                                    <input type="text" name="FacultyDegree" class="form-control border-primary shadow-none" id="Degree" required/> 
                                                </div>
                                                <div class="mb-3 ">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" name="FacultyPassword" class="form-control border-primary shadow-none" id="exampleCheck1" required/> 
                                                </div>
                                                <div class=" ">
                                                    <label for="cpassword" class="form-label">Confirm password</label>
                                                    <input type="password" name="FacultyConfirmPassword" class="form-control border-primary shadow-none" id="exampleCheck1" required/> 
                                                </div>
                                                <div class=" mb-3 text-center mt-5">
                                                    <input type="submit" class="btn btn-sm btn-primary fw-bold " name="FacultyRegistration" style="font-size:20px;" value="Register" /> 
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
							<h3 class="text-uppercase text-left">Department Notifications</h3>
							<p>Never be so dependent on technology that a notification is the only thing that brings you hope.</p>
						</div>
						<div class="col-xl-2 col-md-4 col-sm-4 col-12">
							<h6 class="mb-3 mb-lg-4 bold-text "><b>MENU</b></h6>
							<ul class="list-unstyled">
								<li><a href="index.php" class="text-decoration-none text-white Home" ><i class="fas fa-angle-right"></i>  Home</a></li>
								<li><a href="changePassword.php" class="text-decoration-none text-white ChangePassword"><i class="fas fa-angle-right"></i>  Change Password</a></li>
								<li><a href="profile.php" class="text-decoration-none text-white Profile"><i class="fas fa-angle-right"></i>  Profile</a></li>
								<li><a href="logout.php" class="text-decoration-none text-white "><i class="fas fa-angle-right"></i> Logout</a></li>
								<li><a href="register.php" class="text-decoration-none text-white Register" ><i class="fas fa-angle-right"></i>  Register</a></li>
								<li><a href="login.php" class="text-decoration-none text-white Login" ><i class="fas fa-angle-right"></i>  Login</a></li>
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
				</script> Copyright: <a href="https://jayachandragoteti.github.io/" class="text-white">Jayachandra Goteti</a> </div>
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