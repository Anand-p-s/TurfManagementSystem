<?php

require_once("../dboperation.php");
$obj = new dboperation();
session_start();

$turf_id = $_POST['turf_id'];
$require_date = $_POST['requiredate'];
$request_date = date("Y/m/d");
$slotid = $_POST['ch_slot'];
$login_id = $_SESSION['loginid'];
$status = "notconfirmed";

// echo $turf_id;
// echo $require_date;
// echo $request_date;
// echo $slotid;
// echo $login_id;

$sql = "INSERT INTO `tbl_request`(`request_date`, `required_date`, `turf_id`, `slot_id`, `cust_id`, `status`) VALUES ('$request_date','$require_date',$turf_id,$slotid,$login_id,'$status')";
$res = $obj->query($sql);

if($res == 1) {
    echo "<script>alert('Slot selected.. Pay advance amount to confirm booking');  window.location='mybooking.php'; </script>";
} else {
    echo "<script>alert('Failed to send request!'); window.location='mybooking.php';</script>";
}
