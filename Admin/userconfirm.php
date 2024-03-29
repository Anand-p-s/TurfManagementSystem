<?php

include_once('../dboperation.php');
$obj = new dboperation();

$login_id = $_GET['login_id'];

$sql = "select * from tbl_customer C inner join tbl_login L on C.login_id=L.loginid where C.login_id=$login_id";
$res = $obj->query($sql);
$row = mysqli_fetch_array($res);

$sql1 = "update tbl_login set status='confirm' where loginid=$login_id";
$res1 = $obj->query($sql1);
if ($res1 == 1) {
    $uname = $row["username"];
    $bodyContent = "Dear $uname, You have been verified. You can now login.";
    $mailtoaddress = $row["email"];
    require('userconfirmmailer.php');
} else {
    echo "<script> alert('confirmation failed'); window.location='customerview.php';</script>";
}
