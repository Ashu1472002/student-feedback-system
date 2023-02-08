<?php include "./header.php"; ?>
<?php 
session_start();
if (isset($_SESSION['id'])) {
    include "../database.php";
    $query = "SELECT * FROM student";
    $result = mysqli_query($conn, $query);
    $student =mysqli_num_rows($result);
    $query = "SELECT * FROM faculty";
    $result = mysqli_query($conn, $query);
    $faculty =mysqli_num_rows($result);
    $query = "SELECT * FROM question Where id=1";
    $result = mysqli_query($conn, $query);
    $rating=0;
    $temp=[];
    $que=[];
    if(mysqli_num_rows($result)>0){
        $que = mysqli_fetch_row($result);
    }
    $query = "SELECT noentry FROM rating where `que`= '$que[1]'";
    
    $result = mysqli_query($conn, $query);
    if($result){
        while ($row = mysqli_fetch_row($result)) {
            array_push($temp, $row);
        }
    }
    for ($i = 0; $i < sizeof($temp); $i++){
        $rating+= $temp[$i][0];
    }    
}else{
    echo "<script>alert('You are not login');document.location='../student_login.php'; </script>";
}
?>


<!--content section-->
<div id="container">
    <setion class="py-3">
        <div class="container-fluid">
                <div class="col-lg-9">
                    <div class="container-fluid mt-2">
                       <div>
                            <h2 class="dash font-weight-bold m-0 text-dark mt-4 ml-4 mb-4"><span style="margin-left: 60px;">Welcome to Student Feedback System.....!</span></h2>
                        </div>
                    </div>
                </div>
                <div class="card-deck mb-4 card_cs" style="height:50%">
                    <div class="card bg-info">
                        <div class="card-body text-center">
                            <h3 class="font-weight-bold text-center text-light p-3" style="font-size:40px"><?php echo $student ?> <img class="ml-4 text-light" src="../img/stu_1.png"/></h3>
                            <h5 style="font-size:25px">Total number of students</h5>
                        </div>
                    </div>
                    <div class="card bg-success">
                        <div class="card-body text-center">
                            <h3 class="font-weight-bold text-center text-light card-text p-3" style="font-size:40px"><?php  echo $rating; ?><img class="ml-4 text-light" src="../img/stu_2.png"/></h3>
                            <h4>Total Feedbacks</h4></center>
                        </div>
                    </div>
                </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </setion>
</div>
<!--end content section-->

<?php include "./footer.php"; ?>