<?php

include_once("../dboperation.php");
$obj = new dboperation();

$reqid = $_GET['request_id'];

$sql1="select * from tbl_request R inner join tbl_login L on R.cust_id=L.loginid inner join tbl_turf T on R.turf_id=T.turf_id inner join tbl_timeslot S on R.slot_id=S.slot_id inner join tbl_customer C on R.cust_id=C.login_id where R.request_id=$reqid";
$res1=$obj->query($sql1);
$row=mysqli_fetch_array($res1);

$sql = "update tbl_request set status='paid' where request_id=$reqid";
$res = $obj->query($sql);
//echo "<script>alert('All Payment completed for this user');  window.location='./index.php'; </script>";

if ($res==1) {
    $uname = $row['username'];
    $date=$row['required_date'];
    $turf=$row['turf'];
    $time=$row['slot_time'];
    $mailtoaddress = $row["email"];
    $bodyContent = "Dear $uname, Your payments for booking Date: $date  Time: $time  Turf: $turf is completed";
    include('paymentcompletemailer.php');
    // echo "<script> alert('Success'); window.location='bookingview.php'; </script>";
} else {
    echo "<script> alert('Failed'); window.location='bookingview.php'; </script>";
}
?>