<?php
session_start();
if (isset($_SESSION['id'])) {
    include "../database.php";
    $uid=$_SESSION['id'];
    $query = "SELECT * FROM student where id=$uid";
   
    $student = [];
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        $student = mysqli_fetch_row($result);
    } else {
        echo "<script>alert('error to connect to database');</script>";
    }

    if (isset($_POST['fname'] )&& isset($_POST['uname'] )&& isset($_POST['email'] )&& isset($_POST['pass'] )) {
        extract($_POST);
        $query = "  UPDATE student SET `name`='$fname',`uname`='$uname',`upassword`='$pass',`email`='$email' WHERE id= $uid";
       
        $result = mysqli_query($conn, $query);
        echo $result;
        
                if ($result) {
                    echo "<script>alert('Updated'); document.location='./student_profile.php';</script>";
                } else {
                    echo "<script>alert('error to connect to database'); </script>";
                }
    }
}else{
    echo "<script>alert('You are not login');document.location='../student_login.php'; </script>";
}
?>
<?php include "./header.php"; ?>
<!--content Section-->
<center>
    <div id="container">
        <setion class="py-3 container-fluid">
            <h2 class="dash font-weight-bold text-dark mt-4 "> Profile</h2>
        </setion>
        <section>
            <div class="container">
                <div class="row mt-2 mb-4 w-75">
                    <div class="card card-body col-sm fontforform">
                        <form id="card_content" method="POST">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" placeholder="Enter Full Name" id="fname"
                            value="<?php echo $student[2] ?>" name="fname">
                            <br>
                            <label>Username:</label>
                            <input type="text" class="form-control" placeholder="Enter Username "
                            value="<?php echo $student[1] ?>"name="uname" id="uname">
                            <br>
                            <label>E-mail:</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email" 
                            value="<?php echo $student[4] ?>" id="email">
                            <br>
                            <label>Password:</label>
                            <input type="password" value="<?php echo $student[3] ?>" class="form-control" placeholder="Enter password" name="pass" id="pwd">

                            <br>
                            <input type="checkbox" id="show" onclick="myFunction()">
                            <label for="show"> Show Password </label><br>
                            <center>
                                <button type="submit" class="btn btn-danger justify-content-center">Update</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</center>
<script>function myFunction() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php include "./footer.php"; ?>