<?php include "./header.php"; ?>
<?php
 if(isset($_POST['uname'])){
  extract($_POST);
  session_start();
  include "./database.php";
  $query = "SELECT * FROM fmsadmin WHERE uname = '$uname' AND upassword='$password'";
  $result = mysqli_query($conn, $query);
  
  if($result){
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_row($result);
      $_SESSION['id']=$row[0];
      echo $_SESSION['id'];
      $_SESSION['name']= $row[1];
      header('location:./admin/view_feedback.php');
    }else{
      echo "<script>alert('invalid name or password');document.location='./admin_login.php';</script>";
    }
    
  }else{
      echo "<script>alert('error for database connection');document.location='./';</script>";
  }
  exit;
}
?>
<!--Body of the page-->
<section>
   <center>

      <div class="col-lg-6  col-md-6  col-12">
         <img class="avatar" src="./img/login_logo.png" width="60px" height="70px" alt="avatar"></img><br><br><br>
         <h1 class="heading">Admin Login</h1><br>
      </div>

      <form name="myform" method="post" action="./admin_login.php" class="was-validated w-50">
         <div class="form-group">
            <img src="./img/user_login.png"></img>
            <input type="text" class="form-control " placeholder="Enter username" name="uname" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
         </div>
         <div class="form-group">
            <img src="./img/pwd_icon.png"></img>
            <input type="password" class="form-control " placeholder="Enter password" name="password" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
         </div>
         <button type="submit" class="btn btn-primary btn_btn">Login</button>
      </form>
   </center>
</section>
<br>
<br>
<!--Ends Content of the page-->
<!--Footer-->
<?php include "./footer.php"; ?>