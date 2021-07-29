<?PHP
$connect = mysqli_connect("localhost","root","","students");

if (isset($_POST['changeOfAddress'])) {
    if (isset($_POST['address']) && $_POST['address'] != "" &&isset($_POST['users']) && $_POST['users'] != "" ) {
        $address = $_POST['address'];
        $user = $_POST['users'];
        $updateUser = mysqli_query($connect,"UPDATE `users` SET `address` = '$address' WHERE `userId` = '$user'")
        if ($updateUser) {
            echo "user address updated";
        }else {
            echo "failed try again";
        }
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
                <textarea  name="address" placeholder="Enter new address"required></textarea>
                <select name="users">
                    <option selected value="">Select User</option>
                    <?PHP 
                        $selectUser = mysqli_query($connect,"SELECT * FROM `users`"); 
                        while ($selectUserRow = mysqli_fetch_array($selectUser)) { ?>
                            <option value="<?PHP echo $selectUserRow['userId']?>"><?PHP echo $selectUserRow['userName']?></option>
                    <?PHP } ?>
                </select>
                <input type="submit" name="changeOfAddress" value="Change"/>
        </form>
    </body>
</html>