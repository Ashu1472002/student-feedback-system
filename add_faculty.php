<?php
session_start();
if (isset($_SESSION['id'])) {
    include "../database.php";
    $uid = $_SESSION['id'];
    if (isset($_POST['fname']) && isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['pass'])) {
        extract($_POST);
        $query = "  INSERT INTO `fmsadmin`( `name`, `uname`, `email`, `upassword`) VALUES ('$fname','$uname','$email','$pass')";
       
        $result = mysqli_query($conn, $query);
        if ($result) {
            
        
        $query = "  INSERT INTO `faculty`( `name`) VALUES ('$fname')";
        
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('submited'); document.location='./admin_profile.php';</script>";
        } else {
            echo "<script>alert('error to connect to '); </script>";
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
<!--content section-->
            <div id="container">
                <setion class="py-3 container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <h1 class="font-weight-bold m-0 text-dark mt-4 ml-4 ">
                                <span style="margin-left: 60px;">Add Faculty</span>
                            </h1>
                        </div>
                    </div>  
                </setion>
                <section>
                    <div class="container w-75 ">
                        <div class="row mt-2 mb-4 justify-content-center">
                            <div class="card card-body col-sm-6 fontforform ">
                                <form id="card_content" method="post" action="./add_faculty.php">
                                    <label>Full Name:</label>
                                    <input type="text" class="form-control" placeholder="Enter Full Name" id="fname" name="fname" required> 
                                    <br>
                                    <label>Username:</label>
                                    <input type="text" class="form-control" placeholder="Enter Username " name="uname" id="uname" required>
                                    <br>
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
                                    <br>
                                    <label>Password:</label>
                                    <input type="password" name="pass" class="form-control" placeholder="Enter password" id="pwd" required>
                                    <br>
                                    <label>Subject:</label>
                                    <input type="text" class="form-control" placeholder="Enter Subject" id="sub" required>
                                    <br><center>
                                    <button class="btn btn-danger justify-content-center">Add</button></center>
                                </form>
                            </div>
                        </div>
                    </div> 
                </section>
            </div>
            <!--end content section-->

<!--Footer Section-->
<?php include "./footer.php"; ?>


