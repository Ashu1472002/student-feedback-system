
<?php
 if(isset($_POST['uname'])){
  extract($_POST);
  session_start();
  include "./database.php";
  $query = "SELECT * FROM student WHERE uname = '$uname' AND upassword='$password'";
  $result = mysqli_query($conn, $query);
  
  if($result){
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_row($result);
      $_SESSION['id']=$row[0];
      $_SESSION['uname']= $row[1];
      header('location:./student/student_home.php');
    }else{
      echo "<script>alert('invalid name or password');document.location='./student_login.php';</script>";
    }
    
  }else{
      echo "<script>alert('error for database connection');document.location='./';</script>";
  }
  exit;
}
?>
<?php include "./header.php"; ?>

<center>
    <section class="Login">
      <div class="container full-content-center col-md-5 col-xs-4">
        <div class="avatar mb-4" >
          <img src="./img/slogo.png" />
        </div>
        <div class="login-form">
          <h1 text-align="center" class="heading">STUDENT LOGIN</h1><br>
            <form id="form" action="./student_login.php" method="POST" class="register-form was-validated ">
              <div class="form-group">
                <img src="./img/user_login.png"></img>   
                <input type="text" id="icon" style="text-indent:19px" class="form-control form-control-lg"  placeholder="Enter username" name="uname" size="35%" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group">
                <img src="./img/pwd_icon.png"></img>
                <input type="password" id="icon2" style="text-indent:19px" class="form-control form-control-lg" placeholder="Enter password" name="password" size="35%" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div>
                <input type="submit" value="Login" class="btn btn-primary mb-5 btn_btn" id="btn">
              </div>
            </form>
        </div>
    </section>
</center>

<?php include "./footer.php"; ?>