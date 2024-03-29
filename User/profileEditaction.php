<?php

session_start();
include_once("../dboperation.php");
$obj = new dboperation();

$loginid = $_SESSION['loginid'];
$name = $_POST['txt_name'];
$email = $_POST['email'];
$ph = $_POST['txt_phone'];

$sql = "update tbl_customer set cust_name='$name',email='$email',phone_no='$ph' where login_id=$loginid";
$res = $obj->query($sql);

if($res == 1) {
    echo "<script>alert('Updation successful...');  window.location='userprofile.php'; </script>";
} else {
    echo "<script>alert('Updation Failed'); window.location='userprofile.php';</script>";
}
