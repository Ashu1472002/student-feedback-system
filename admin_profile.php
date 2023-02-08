<?php
session_start();
if (isset($_SESSION['id'])) {
    include "../database.php";
    $uid = $_SESSION['id'];
    $query = "SELECT * FROM fmsadmin where id=$uid";

    $admin = [];
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_row($result);
    } else {
        echo "<script>alert('error to connect to database');</script>";
    }
  $old_name=$admin[1];
    if (isset($_POST['fname']) && isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['pass'])) {
        extract($_POST);
        $query = "  UPDATE fmsadmin SET `name`='$fname',`uname`='$uname',`upassword`='$pass',`email`='$email' WHERE id= $uid";
        
        $result = mysqli_query($conn, $query);
        if ($result) {
            
        $query = "  UPDATE faculty SET `name`='$fname' WHERE  `name`= '$old_name'";
        
        $result = mysqli_query($conn, $query);
        if ($result) {
            $query = "  UPDATE rating SET `faculty`='$fname' WHERE  `faculty`= '$old_name'";
            $_SESSION['name']=$fname;
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Updated'); document.location='./admin_profile.php';</script>";
            } else {
                echo "<script>alert('error to connect to database'); </script>";
            }
        } else {
            echo "<script>alert('error to connect to database'); </script>";
        }
    } else {
        echo "<script>alert('error to connect to database'); </script>";
    }

    }
} else {
    echo "<script>alert('You are not login');document.location='../admin_login.php'; </script>";
}
?>

<?php include "./header.php"; ?>
<!--Content section-->
<center>
    <h2 class=" font-weight-bold text-dark mt-4 ">Admin Profile</h2>
    <div class="card card-body col-sm-6 w-75 fontforform">
        <form id="card_content" method="POST" action="./admin_profile.php">
            <label>Full Name:</label>
            <input type="text" class="form-control" placeholder="Enter Full Name" value="<?php echo $admin[1] ?>" id="fname" name="fname">
            <br>
            <label>Username:</label>
            <input type="text" class="form-control" value="<?php echo $admin[2] ?>" placeholder=" Enter Username " name="uname" id=" uname">
            <br>
            <label>E-mail:</label>
            <input type="email" class="form-control" value="<?php echo $admin[4] ?>" placeholder=" Enter email" name="email" id="email">
            <br>
            <label>Password:</label>
            <input type="password" class="form-control" name="pass" value="<?php echo $admin[3] ?>" placeholder=" Enter password" id="pwd">
            <br>
            <input type="checkbox" id="show" onclick="myFunction()">
            <label for="show"> Show Password </label><br>
            <center>
                <button type="submit" class="btn btn-danger justify-content-center">Update</button>
            </center>
        </form>
    </div>
</center>


<!--End of content section-->
<script>
    function myFunction() {
        var x = document.getElementById("pwd");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<!--Footer Section-->
<?php include "./footer.php"; ?>