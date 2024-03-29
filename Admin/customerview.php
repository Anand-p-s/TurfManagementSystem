<?php
include("header.php");

include_once('../dboperation.php');
$obj = new dboperation();
?>

<script language="JavaScript" type="text/javascript">
function userConfirm() {
    return confirm("Are You Sure?");
}
</script>

<div class="main-panel" style="margin-top: -37px;">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">User Status Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <form class="forms-sample" method="get">
                        <label for="userstatus">List</label>
                        <select class="form-control" name="userstatus" id="userstatus" onchange="this.form.submit()">
                            <option value="all">All</option>
                            <option value="confirm">confirmed</option>
                            <option value="Notconfirm">not confirmed</option>
                        </select>
                    </form>
                </ol>
            </nav>
        </div>
        <?php
if(isset($_GET['userstatus'])) {
    $status = $_GET['userstatus'];
    if($status == "Notconfirm") {
        ?>
        <script language="JavaScript" type="text/javascript">
        document.getElementById("userstatus").value = "Notconfirm";
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
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_customer C inner join tbl_login L on C.login_id=L.loginid inner join tbl_district D on C.district_id=D.district_id inner join tbl_location P on C.location_id=P.location_id where L.status='Notconfirm' ORDER BY loginid DESC";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
                                    <td>
                                        <a href="customerviewmore.php?login_id=<?php echo $display['login_id'] ?>">
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>District</th>
                                    <th>Location</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $sql = "select * from tbl_customer C inner join tbl_login L on C.login_id=L.loginid inner join tbl_district D on C.district_id=D.district_id inner join tbl_location P on C.location_id=P.location_id where L.status='confirm' ORDER BY loginid DESC";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
                                    <td><?php echo $display["email"] ; ?></td>
                                    <td><?php echo $display["phone_no"] ; ?></td>
                                    <td><?php echo $display["district_name"] ; ?></td>
                                    <td><?php echo $display["location"] ; ?></td>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>District</th>
                                    <th>Location</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                $sql = "select * from tbl_customer C inner join tbl_login L on C.login_id=L.loginid inner join tbl_district D on C.district_id=D.district_id inner join tbl_location P on C.location_id=P.location_id ORDER BY loginid DESC";
        $res = $obj->query($sql);
        $s = 1;
        while($display = mysqli_fetch_array($res)) {
            ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
                                    <td><?php echo $display["email"] ; ?></td>
                                    <td><?php echo $display["phone_no"] ; ?></td>
                                    <td><?php echo $display["district_name"] ; ?></td>
                                    <td><?php echo $display["location"] ; ?></td>
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
}else{
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>District</th>
                                    <th>Location</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    $sql = "select * from tbl_customer C inner join tbl_login L on C.login_id=L.loginid inner join tbl_district D on C.district_id=D.district_id inner join tbl_location P on C.location_id=P.location_id ORDER BY loginid DESC";
    $res = $obj->query($sql);
    $s = 1;
    while($display = mysqli_fetch_array($res)) {
        ?>
                                <tr>
                                    <td><?php echo $s++ ?></td>
                                    <td><?php echo $display["cust_name"] ; ?></td>
                                    <td><?php echo $display["email"] ; ?></td>
                                    <td><?php echo $display["phone_no"] ; ?></td>
                                    <td><?php echo $display["district_name"] ; ?></td>
                                    <td><?php echo $display["location"] ; ?></td>
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