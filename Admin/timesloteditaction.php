<?php
require_once("../dboperation.php");
$obj = new dboperation();

$slot_id=$_POST['slot_id'];
$slot=$_POST['slot'];

$sql = "UPDATE `tbl_timeslot` set slot_time='$slot' WHERE slot_id=$slot_id";
$res = $obj->query($sql);

if ($res==1) {
    echo "<script> alert('updated!'); window.location='timeslotview.php'; </script>";
} else {
    echo "<script> alert('Updation Failed'); window.location='timeslotview.php'; </script>";
}

?>