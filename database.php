<?php
$conn = mysqli_connect('localhost','root','','fms_cpp');
if(!$conn){
    echo "<script>alert('error for database connection 11 ');document.location='./';</script>";
}