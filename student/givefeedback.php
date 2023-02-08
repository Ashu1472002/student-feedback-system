<?php include "./header.php"; ?>
<?php
session_start();
if (isset($_SESSION['id'])) {
    include "../database.php";
    $query = "SELECT * FROM faculty";
    $faculty = [];
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            array_push($faculty, $row);
        }
    } else {
        echo "<script>alert('error to connect to database');</script>";
    }
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
    
    if (isset($_POST['faculty1'])) {
        extract($_POST);
        $query = "SELECT * FROM rating where faculty='$faculty1'";
        $rating = [];
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    array_push($rating, $row);
                }
                for ($i = 0; $i < sizeof($rating); $i++) {
                    $r = "rating" . $que[$i][0];
                    $re = $$r;
                    $rat = $rating[$i][2] + $re;
                    $nentry = $rating[$i][4] + 1;
                    $id = $rating[$i][0];
                    $query = "  UPDATE `rating` SET `rating`=$rat,`noentry`=$nentry WHERE `id`= $id";
                    
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        echo "<script>alert('Submited'); document.location='./givefeedback.php';</script>";
                    } else {
                        echo "<script>alert('error to connect to database'); </script>";
                    }
                }
            } else {
                for ($i = 0; $i < sizeof($que); $i++) {
                    $r = "rating" . $que[$i][0];
                    $re = $$r;
                    $q = $que[$i][1];
                    $query = "INSERT INTO `rating`(`que`,`rating`,`faculty`,`noentry`) VALUES('$q',$re,'$faculty1',1)";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        echo "<script>alert('Submited'); document.location='./givefeedback.php';</script>";
                    } else {
                        echo "<script>alert('error to connect to database'); </script>";
                    }
                }
            }
        } else {
            echo "<script>alert('error to connect to database');</script>";
        }
    }
}else{
    echo "<script>alert('You are not login');document.location='../student_login.php'; </script>";
}

?>
<!--Content section-->
<div id="container">
    <setion class="py-3">
        <center>
            <h2 class=" font-weight-bold text-dark mt-4 "> Feedback Form</h2>

    </setion>

    <form id="card_content" method="post" action="./givefeedback.php">
        <section>
            <div class="container">
                <div class="row mt-2 mb-4 justify-content-center">
                    <div class="card card-body col-sm-4 fontforform">
                        <h5 class="card-header text-dark p-3">**To give feedback, student first should select the respective faculty name from the given options: </h5>
                        <label for="sel1 text-dark">Select Faculty Name:</label>
                        <select class="form-control" name="faculty1" id="sel" onclick="visible_Feedback()" required>
                            <option>--</option>
                            <?php for ($i = 0; $i < sizeof($faculty); $i++) { ?>
                                <option value="<?php echo $faculty[$i][1] ?>"><?php echo $faculty[$i][1] ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
            </div>
            <div class="row mt-2 mb-4  justify-content-center" style="width:85%">
                <div class="card card-body col-sm fontforform" style="visibility: hidden;" id="feedback">
                    <!-- <form id="card_content "> -->
                    <h5 class="card-header text-dark p-3">**Here student should give appropriate feedback to selected faculty: </h5>
                    <table class="table table-light">
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
                                <div class="rating-css">
                                    <div class="star-icon">
                                        <input type="radio" value="1" name="rating<?php echo $que[$i][0] ?>" id="q<?php echo $que[$i][0] ?>1">
                                        <label for="q<?php echo $que[$i][0] ?>1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="rating<?php echo $que[$i][0] ?>" id="q<?php echo $que[$i][0] ?>2">
                                        <label for="q<?php echo $que[$i][0] ?>2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="rating<?php echo $que[$i][0] ?>" id="q<?php echo $que[$i][0] ?>3">
                                        <label for="q<?php echo $que[$i][0] ?>3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="rating<?php echo $que[$i][0] ?>" id="q<?php echo $que[$i][0] ?>4">
                                        <label for="q<?php echo $que[$i][0] ?>4" class="fa fa-star"></label>
                                        <input type="radio" value="5" checked name="rating<?php echo $que[$i][0] ?>" id="q<?php echo $que[$i][0] ?>5">
                                        <label for="q<?php echo $que[$i][0] ?>5" class="fa fa-star"></label>
                                    </div>
                                </div>
                                </td>
                                </tr>
                            <?php } ?>
                        
                        </tbody>
                    </table>
                    <center><button class="btn btn-danger justify-content-center py-3" style="width: 200px;">Submit</button></center>
                </div>
            </div>
        </section>
    </form>
</div>
<?php include "./footer.php"; ?>