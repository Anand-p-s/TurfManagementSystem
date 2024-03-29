<?php
include_once('dboperation.php');
$obj=new dboperation();

session_start();
// $audid=$post["txt_audid"];
// $amount = $_POST["txt_total"];
// $advance = $_POST["txt_advance"];
// $cuname = $_POST["txt_aname"];
// $event = $_POST["drpevent"];
// $rdate = $_POST["rdate"];
// $satime = $_POST["stime"];
// $entime = $_POST["etime"];

// $_SESSION["aid"]=$audid;
// $_SESSION["Total"] = $amount;
// $_SESSION["advamount"] = $advance;
// $_SESSION["auditoriumname"] = $cuname;
// $_SESSION["eventname"] = $event;
// $_SESSION["rd"] = $rdate;
// $_SESSION["startime"] = $satime;
// $_SESSION["endtime"] = $entime;
$cid = $_SESSION["loginid"];
$sql = "SELECT * FROM   tbl_customer WHERE login_id='$cid'";
$res = $obj->query($sql);
$row = mysqli_fetch_array($res);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Payment Form Widget Flat Responsive Widget Template :: w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Payment Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //for-mobile-apps -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>
    <div class="main">
        <h1>Advance Payment Form</h1>
        <div class="content">

            <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
            <script type="text/javascript">
            $(document).ready(function() {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true // 100% fit in a container
                });
            });
            </script>
            <div class="sap_tabs">
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                    <div class="pay-tabs">
                        <h2>Select Payment Method</h2>
                        <ul class="resp-tabs-list">
                            <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label
                                        class="pic1"></label>Credit Card</span></li>
                            <!-- <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label
                                        class="pic3"></label>Net Banking</span></li>
                            <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label
                                        class="pic4"></label>PayPal</span></li> -->
                            <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label
                                        class="pic2"></label>Debit Card</span></li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                    <div class="resp-tabs-container">
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                            <div class="payment-info">
                                <form action="advancePaymentsave.php" method="post">
                                    <div class="tab-for">
                                        <h5> Total Amount</h5>
                                        <input type="text" name="txt_total" value="1400" readonly>
                                        <h5>Advance</h5>
                                        <?php
                                                    //$advance=$amount*20/100;
                                                     // $_SESSION["advanced"]=$advance;
                                                     //  $_SESSION["adamt"]=$amount;
                                                    //$a= $_SESSION["netamount"];
?>
                                        <input type="text" name="txt_advance" value="500">
                                    </div>
                                    You have to pay the advance amount for the booking to be accepted!!!
                                    <h3>Personal Information</h3>

                                    <div class="tab-for">
                                        <h5>EMAIL ADDRESS</h5>
                                        <input type="text" name="txt_email" readonly
                                            value="<?php echo $row["email"]; ?>">
                                        <h5>FIRST NAME</h5>
                                        <input type="text" name="txt_name" readonly
                                            value="<?php echo $row["cust_name"] ?>">
                                    </div>
                                    <!-- onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" -->
                                    <h3 class="pay-title">Payment Info</h3>

                                    <div class="tab-for">
                                        <h5>from A/C No</h5>
                                        <input type="text" name="txt_from" required>
                                        <h5>to A/C No</h5>
                                        <input required type="text" name="txt_to" value="0112345678">
                                    </div>
                                    <!-- <div class="transaction">
                                        <div class="tab-form-left user-form">
                                            <h5>EXPIRATION</h5>
                                            <ul>
                                                <li>




                                                    <input type="number" class="text_box" type="text" value="6"
                                                        min="1" />
                                                </li>
                                                <li>
                                                    <input type="number" class="text_box" type="text" value="2021"
                                                        min="1" />
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="tab-form-right user-form-rt">
                                            <h5>CVV NUMBER</h5>
                                            <input type="text" value="xxxx" required pattern="[0-9]{4}"
                                                onfocus="this.value = '';"
                                                onblur="if (this.value == '') {this.value = 'xxxx';}">
                                        </div>
                                        <div class="clear"></div>
                                    </div> -->
									<input type="hidden" name="req_id" value="<?php echo $_GET['req_id']; ?>">
                                    <input type="submit" name="submit" value="SUBMIT">
                                </form>
                                <!-- <div class="single-bottom">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="brand" value="">
                                            <label for="brand"><span></span>By checking this box, I agree to the Terms &
                                                Conditions & Privacy Policy.</label>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
        <p class="footer">Copyright © 2016 Payment Form Widget. All Rights Reserved | Template by <a
                href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
    </div>
</body>

</html>