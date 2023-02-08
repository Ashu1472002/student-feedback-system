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
 
} else {
    echo "<script>alert('You are not login');document.location='../student_login.php'; </script>";
}
?>
<?php include "./header.php"; ?>
            <!--content section-->
        <center>
            <div id="container">
                <center>
                <setion class=" container-fluid">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="font-weight-bold text-dark mt-4">Dashboard</h1>
                            <p class="text-muted lead "><span>It's only the overview for the <span class="font-weight-bold text-dark">Admin</span>!!!</span></p>
                        </div>
                    </div>
                    
                </setion>
                </center>
                <section>
                    <center>
                    <div class="container-fluid">
                        <div class="row ml-4 mt-2 mb-lg-5 ">
                            <div class="card card-body  card_cs col-lg-3 mr-4 stat bg-success"><center>
                                <h3 class="font-weight-bold text-center"><?php echo $student ?></h3>
                                <h5>Total number of students</h5>
                                </center>
                            </div>
                            <div class="card card-body card_cs col-lg-3 mr-4 bg-info"><center>
                                <h3 class="font-weight-bold text-center"><?php echo $faculty ?></h3>
                                <h4>Total number of Faculty members</h4></center>
                            </div>
                            <div class="card card-body card_cs col-lg-3 mr-4 bg-danger"><center>
                                <h3 class="font-weight-bold text-center"><?php  echo $rating; ?></h3>
                                <h4>Total Feedbacks</h4></center>
                            </div>  
                        </div>
                        <br>
                        <br>
                    </div>
                    </center>
                </section>  
            </div>
        </center>
            <!--end content section-->
            <!--Footer Section-->
            <div>
                <footer>
                    <div class=" p-3 mb-2 bg-light text-dark text-center border-top border-bottom">
                        <h3 class="text-dark"> Student Feedback System</h3>
                        <span>
                            <hr style="width:30%">
                        </span>
                        <p class="text-dark">Project By :<br> Khushboo,Ashwini,Mansi,Neha</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>  
</html>