<?php
require_once("../dboperation.php");
$obj = new dboperation();

$slot_id=$_GET['slot_id'];

//if (isset($_POST['btn_delete'])) {
    $sql = "DELETE from `tbl_timeslot` where slot_id=$slot_id";
    $res = $obj->query($sql);

    if ($res==1) {
        echo "<script> window.location='timeslotview.php'; </script>";
    } else {
        echo "<script> alert('Deletion Not Possible'); </script>";
    }
//}

?>