<?php
include_once('../dboperation.php');
$obj = new dboperation();

$review = $_POST['remark'];
$req_id = $_POST['req_id'];
echo $sql = "update tbl_request set review='$review' where request_id=$req_id";
$res = $obj->query($sql);

if ($res==1) {
    $sql = "update tbl_request set status='rejected' where request_id=$req_id";
    $obj->query($sql);
    echo "<script> alert('rejection successful!'); window.location='bookingview.php' </script>";
}else{
    echo "<script> alert('Failed!'); window.location='bookingview.php' </script>";
}
?>