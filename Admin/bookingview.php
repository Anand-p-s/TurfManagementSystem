<?php
include("header.php");

include_once('../dboperation.php');
$obj = new dboperation();
?>

<div class="main-panel" style="margin-top: -37px;">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Booking Status Table</h3>
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
                                    <th>User Name</th>
                                    <th>Turf</th>
                                    <th>Time</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_request R inner join tbl_customer C on R.cust_id=C.login_id inner join tbl_turf T on R.turf_id=T.turf_id
        inner join tbl_timeslot S on R.slot_id=S.slot_id inner join tbl_game G on T.game_id=G.game_id where R.status='advancepayment'";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td>
                                        <a href="bookingviewmore.php?request_id=<?php echo $display['request_id'] ?>">
                                            <button type="button" class="btn btn-primary">View</button>
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
        document.getElementById("userstatus").value = "confirm";
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
                                    <th>User Name</th>
                                    <th>Turf</th>
                                    <th>Time</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_request R inner join tbl_customer C on R.cust_id=C.login_id inner join tbl_turf T on R.turf_id=T.turf_id
        inner join tbl_timeslot S on R.slot_id=S.slot_id inner join tbl_game G on T.game_id=G.game_id where R.status='confirmed'";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td><?php echo $display["status"] ; ?></td>
                                    <td>
                                        <a href="paymentcomplete.php?request_id=<?php echo $display['request_id'] ?>">
                                            <button type="button" class="btn btn-primary">completed</button>
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
    } elseif ($status == "completed") {
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
                                    <th>User Name</th>
                                    <th>Turf</th>
                                    <th>Time</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_request R inner join tbl_customer C on R.cust_id=C.login_id inner join tbl_turf T on R.turf_id=T.turf_id
        inner join tbl_timeslot S on R.slot_id=S.slot_id inner join tbl_game G on T.game_id=G.game_id where R.status='paid'";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td><?php echo $display["status"] ; ?></td>
                                    <td>
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
        document.getElementById("userstatus").value = "completed";
        </script>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Rejected</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>User Name</th>
                                    <th>Turf</th>
                                    <th>Time</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_request R inner join tbl_customer C on R.cust_id=C.login_id inner join tbl_turf T on R.turf_id=T.turf_id
        inner join tbl_timeslot S on R.slot_id=S.slot_id inner join tbl_game G on T.game_id=G.game_id where R.status='rejected'";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
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
    }elseif($status == "all") {
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
                                    <th>User Name</th>
                                    <th>Turf</th>
                                    <th>Time</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                $sql = "select * from tbl_request R inner join tbl_customer C on R.cust_id=C.login_id inner join tbl_turf T on R.turf_id=T.turf_id
                inner join tbl_timeslot S on R.slot_id=S.slot_id inner join tbl_game G on T.game_id=G.game_id";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td><?php echo $display["status"] ; ?></td>

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
                    <h4 class="card-title">All</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>User Name</th>
                                    <th>Turf</th>
                                    <th>Time</th>
                                    <th>Required Date</th>
                                    <th>Request Date</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                   $sql = "select * from tbl_request R inner join tbl_customer C on R.cust_id=C.login_id inner join tbl_turf T on R.turf_id=T.turf_id
                   inner join tbl_timeslot S on R.slot_id=S.slot_id inner join tbl_game G on T.game_id=G.game_id";
    $res = $obj->query($sql);
    $s = 1;
    while($display = mysqli_fetch_array($res)) {
        ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
                                    <td><?php echo $display["turf"] ; ?></td>
                                    <td><?php echo $display["slot_time"] ; ?></td>
                                    <td><?php echo $display["required_date"] ; ?></td>
                                    <td><?php echo $display["request_date"] ; ?></td>
                                    <td><?php echo $display["status"] ; ?></td>
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
?>
    </div>
</div>
<?php
include("footer.php");
?>