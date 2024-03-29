<?php
include_once('../dboperation.php');
$obj=new dboperation();

$request_id=$_GET['request_id'];
$sql1="select * from tbl_request R inner join tbl_login L on R.cust_id=L.loginid inner join tbl_turf T on R.turf_id=T.turf_id inner join tbl_timeslot S on R.slot_id=S.slot_id inner join tbl_customer C on R.cust_id=C.login_id where R.request_id=$request_id";
$res1=$obj->query($sql1);
$row=mysqli_fetch_array($res1);

$sql="update tbl_request set status='confirmed' where request_id=$request_id";
$res=$obj->query($sql);

if ($res==1) {
    $uname = $row['username'];
    $date=$row['required_date'];
    $turf=$row['turf'];
    $time=$row['slot_time'];
    $mailtoaddress = $row["email"];
    $bodyContent = "Dear $uname, Your booking is confirmed Date: $date  Time: $time  Turf: $turf";
    include('bookingacceptmailer.php');
    // echo "<script> alert('Success'); window.location='bookingview.php'; </script>";
} else {
    echo "<script> alert('Failed'); window.location='bookingview.php'; </script>";
}
?>