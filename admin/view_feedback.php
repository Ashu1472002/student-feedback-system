<?php
session_start();

if (isset($_SESSION['id'])) {
    $rating = [];
    include "../database.php";
    $faculty1 = $_SESSION['name'];
    $query = "SELECT * FROM question";
    $que = [];
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            array_push($que, $row);
        }
    } else {
        echo "<script>alert('error to connect to database');</script>";
    }
    $query = "SELECT * FROM rating where faculty='$faculty1'";
  
    $result = mysqli_query($conn, $query);
    if ($result) {

        while ($row = mysqli_fetch_row($result)) {
            array_push($rating, $row);
        }
    } else {
        echo "<script>alert('error to connect to database'); </script>";
    }
} else {
    echo "<script>alert('You are not login');document.location='../student_login.php'; </script>";
}
?>


<?php include "./header.php"; ?>
<!--content section-->
<div id="container">
    <center>
    <setion class="py-3 container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1 class="font-weight-bold m-0 text-dark mt-4 ml-4">
                    <span style="margin-left: 60px;">Feedback</span>
                </h1>
            </div>
        </div>
    </setion>
    </center>
    <section>
        <center>
        <div class="container">
          <div class="card card-body w-75 fontforform ">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Sr.No.</th>
                        <th>Feedback Questions</th>
                        <th>Average Feedbacks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < sizeof($que); $i++) { ?>
                        <tr>
                            <td><?php echo $que[$i][0] ?></td>
                            <td>
                                <label for="Q<?php echo $que[$i][0] ?>"><?php echo $que[$i][1] ?></label>
                            </td>
                            <td>
                                <?php $r = (int)($rating[$i][2] / $rating[$i][4]) ?>
                                <?php for ($j = 0; $j < $r; $j++) {
                                ?>
                                    <span class="fa fa-star checked"></span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
          </div>
        </div>
    </center>
    </section>
</div>
<!--end content section-->

<!--Footer Section-->
<?php include "./footer.php"; ?>



</html>