<?php
require_once("../dboperation.php");
$obj = new dboperation();

$location_id=$_GET['location_id'];

//if (isset($_POST['btn_delete'])) {
    $sql = "DELETE from `tbl_location` where location_id=$location_id";
    $res = $obj->query($sql);

    if ($res==1) {
        echo "<script> window.location='locationview.php'; </script>";
    } else {
        echo "<script> alert('Deletion Not Possible'); </script>";
    }
//}

?>