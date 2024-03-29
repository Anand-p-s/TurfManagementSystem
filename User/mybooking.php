<?php
include("header.php");

include_once('../dboperation.php');
$obj = new dboperation();
$loginid = $_SESSION['loginid'];
?>

<div class="main-panel" style="padding-top: 0px;">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title" style="margin-left: 45%;
    font-size: xx-large;">My Booking</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <form class="forms-sample" method="get">
                        <label for="userstatus">List</label>
                        <select class="form-control" name="reqstatus" id="reqstatus" onchange="this.form.submit()">
                            <option value="all">All</option>
                            <option value="confirm">confirmed</option>
                            <option value="Notconfirm">not confirmed</option>
                            <option value="completed">completed</option>
                            <option value="rejected">rejected</option>
                        </select>
                    </form>
                </ol>
            </nav>
        </div>
        <?php
if(isset($_GET['reqstatus'])) {
    $status = $_GET['reqstatus'];
    if($status == "Notconfirm") {
        ?>
        <script language="JavaScript" type="text/javascript">
        document.getElementById("reqstatus").value = "Notconfirm";
        </script>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Not Confirmed</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>Turf</th>
                                    <th>Time Slot</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_request R inner join tbl_turf T on R.turf_id=T.turf_id inner join tbl_game G on T.game_id=G.game_id inner join tbl_timeslot S on R.slot_id=S.slot_id where R.cust_id=$loginid and R.status='notconfirmed' order by request_id desc";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td>
                                        <a
                                            href="Payment/advancePayment.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">Advance Pay</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } elseif($status == "confirm") {
        ?>
        <script language="JavaScript" type="text/javascript">
        document.getElementById("userstatus").value = "confirmed";
        </script>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Confirmed</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>Turf</th>
                                    <th>Time Slot</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_request R inner join tbl_turf T on R.turf_id=T.turf_id inner join tbl_game G on T.game_id=G.game_id inner join tbl_timeslot S on R.slot_id=S.slot_id where R.cust_id=$loginid and R.status='confirmed' order by request_id desc";

        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <!-- <td>
                                        <a href="Payment/payment.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">Pay</button>
                                        </a>
                                    </td> -->
                                </tr>
                                <?php
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } elseif($status == "all") {
        ?>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>Turf</th>
                                    <th>Time Slot</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                $sql = "select * from tbl_request R inner join tbl_turf T on R.turf_id=T.turf_id inner join tbl_game G on T.game_id=G.game_id inner join tbl_timeslot S on R.slot_id=S.slot_id where R.cust_id=$loginid order by request_id desc";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td><?php echo $display["status"] ; ?></td>
                                    <?php
                                    switch ($display['status']) {
                                        case 'confirmed':
                                            ?>
                                    <!-- <td>
                                        <a href="Payment/payment.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">Pay</button>
                                        </a>
                                    </td> -->
                                    <?php
                                            break;
                                        case 'notconfirmed':
                                            ?>
                                    <td>
                                        <a
                                            href="Payment/advancePayment.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">Advance Pay</button>
                                        </a>
                                    </td>
                                    <?php
                                            break;
                                        case 'rejected':
                                            ?>
                                    <td>
                                        <a href="rejectionview.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">View</button>
                                        </a>
                                    </td>
                                    <?php
                                    break;
                                        default:
                                            # code...
                                            break;
                                    }
            ?>
                                </tr>
                                <?php
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }elseif ($status == "completed") {
        ?>
        <script language="JavaScript" type="text/javascript">
        document.getElementById("userstatus").value = "completed";
        </script>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">completed</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>Turf</th>
                                    <th>Time Slot</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_request R inner join tbl_turf T on R.turf_id=T.turf_id inner join tbl_game G on T.game_id=G.game_id inner join tbl_timeslot S on R.slot_id=S.slot_id where R.cust_id=$loginid and R.status='paid'";

        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td><?php echo $display["status"] ; ?></td>
                                    <!-- <td>
                                        <a href="Payment/payment.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">Pay</button>
                                        </a>
                                    </td> -->
                                </tr>
                                <?php
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php
    } elseif ($status == "rejected") {
        ?>
        <script language="JavaScript" type="text/javascript">
        document.getElementById("userstatus").value = "rejected";
        </script>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">rejected</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>Turf</th>
                                    <th>Time Slot</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_request R inner join tbl_turf T on R.turf_id=T.turf_id inner join tbl_game G on T.game_id=G.game_id inner join tbl_timeslot S on R.slot_id=S.slot_id where R.cust_id=$loginid and R.status='rejected' order by request_id desc";

        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td><?php echo $display["status"] ; ?></td>
                                    <td>
                                        <a href="rejectionview.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">View</button>
                                        </a>
                                    </td>
                                    <!-- <td>
                                        <a href="Payment/payment.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">Pay</button>
                                        </a>
                                    </td> -->
                                </tr>
                                <?php
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
} else {
    ?>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>Turf</th>
                                    <th>Time Slot</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                   $sql = "select * from tbl_request R inner join tbl_turf T on R.turf_id=T.turf_id inner join tbl_game G on T.game_id=G.game_id inner join tbl_timeslot S on R.slot_id=S.slot_id where R.cust_id=$loginid order by request_id desc";
    $res = $obj->query($sql);
    $s = 1;
    while($display = mysqli_fetch_array($res)) {
        ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td><?php echo $display["status"] ; ?></td>

                                    <?php
                                    switch ($display['status']) {
                                        case 'confirmed':
                                            ?>
                                    <!-- <td>
                                        <a href="Payment/payment.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">Pay</button>
                                        </a>
                                    </td> -->
                                    <?php
                                            break;
                                        case 'notconfirmed':
                                            ?>
                                    <td>
                                        <a
                                            href="Payment/advancePayment.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">Advance Pay</button>
                                        </a>
                                    </td>
                                    <?php
                                            break;
                                        case 'rejected':
                                            ?>
                                    <td>
                                        <a href="rejectionview.php?req_id=<?php echo $display["request_id"] ?>">
                                            <button type="button" class="btn btn-primary">View</button>
                                        </a>
                                    </td>
                                    <?php
                                    break;
                                        default:
                                            # code...
                                            break;
                                    }
        ?>
                                    <?php
    }
    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
}
?>
    </div>
</div>
<?php
include("footer.php");
?>