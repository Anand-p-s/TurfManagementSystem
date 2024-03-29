<?php

include_once("../dboperation.php");
$obj = new dboperation();

$turfid = $_POST['selturfid'];
$time = $_POST['txt_time'];

$sql1 = "select * from tbl_timeslot where slot_time='$time' and turf_id=$turfid";
$res1 = $obj->query($sql1);
$display = mysqli_fetch_array($res1);

if ($display) {
    echo "<script>alert('Slot already exists!');window.location='timeslotview.php';  </script>";
} else {
    $sql = "insert into tbl_timeslot(slot_time,turf_id) values('$time',$turfid)";
    $res = $obj->query($sql);
    if($res == 1) {
        echo "<script>alert('Slot added');window.location='timeslotview.php'; </script>";
    } else {
        echo "<script>alert('Failed');window.location='timeslotview.php'; </script>";
    }
}
?>
