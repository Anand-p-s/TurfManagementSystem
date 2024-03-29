<?php

session_start();
include 'excel_controller.php';
$db_handle = new DBController();
$fromdate = $_SESSION['fdate'];
$todate = $_SESSION['tdate'];
$productResult = $db_handle->runQuery("SELECT count(*) as count,cust_name,turf,slot_time,game FROM tbl_request R inner join tbl_customer C on R.cust_id=C.login_id inner join tbl_turf T on R.turf_id=T.turf_id inner join tbl_timeslot S on R.slot_id=S.slot_id inner join tbl_game G on T.game_id=G.game_id where
R.required_date >='$fromdate' and R.required_date <='$todate' group by R.request_id");


$filename = "Booking_excel.xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
$isPrintHeader = false;
if (! empty($productResult)) {
    foreach ($productResult as $row) {
        if (! $isPrintHeader) {
            echo implode("\t", array_keys($row)) . "\n";
            $isPrintHeader = true;
        }
        echo implode("\t", array_values($row)) . "\n";
    }
}
exit();