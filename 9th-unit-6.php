<?PHP
$connect = mysqli_connect("localhost","root","","students");

if (isset($_POST['login'])) {
    if (isset($_POST['username']) && $_POST['username'] != "" &&isset($_POST['password']) && $_POST['password'] != "" ) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userCheck = mysqli_query($connect,"SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' ");
        if (mysqli_num_rows($userCheck)) {
            echo "User is logged in";
           // header('location:success.php');
        }else {
            echo "Invalid username of password";
            //header('location:failed.php');
        }
    }else {
        echo "All fields must be filled!";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>8th Unit-6</title>
    </head>
    <body>
        <form method="post" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="username" placeholder="Enter your username" />
            <input type="password" name="password" placeholder="Enter your password"/>
            <input type="submit" name="login" value="Login"/>
        </form>
    </body>
</html>