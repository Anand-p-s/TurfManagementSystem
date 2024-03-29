<?php

session_start();
include 'excel_controller.php';
$db_handle = new DBController();
$productResult = $db_handle->runQuery("SELECT cust_name,reg_date FROM tbl_customer");


$filename = "Customer_excel.xls";
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