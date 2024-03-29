<?php
include("header.php");
?>

<script language="JavaScript" type="text/javascript">
function deleteConfirm() {
    return confirm("Are You Sure?");
}
</script>

<div class="main-panel" style="margin-top: -22px;">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Choose district</h4>
                        <form class="forms-sample" action="" method="post">
                            <?php
                        include_once("../dboperation.php");
$obj = new dboperation();
$sql = "select * from tbl_district";
$res = $obj->query($sql);
?>
                            <div class="form-group">
                                <select class="form-control" name="seldistrictid" id="seldistrictid"
                                    onchange="this.form.submit()">
                                    <option>---Select District---</option>
                                    <?php
            while($display = mysqli_fetch_array($res)) {
                ?>
                                    <option value="<?php echo $display["district_id"]?>">
                                        <?php echo $display["district_name"]?>
                                    </option>
                                    <?php
            }
?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if(isset($_POST["seldistrictid"])) {
                $district_id1 = $_POST["seldistrictid"];
                ?>
        <script>
        document.getElementById("seldistrictid").value = <?php echo $district_id1; ?>;
        </script>
        <a href="locationreg.php?district_id=<?php echo $district_id1?>" class="btn btn-outline-primary"
            style="margin-left: 717px;">Add Location</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Location Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
                                  $district_id = $_POST["seldistrictid"];
                $sql = "SELECT * FROM `tbl_location` where district_id='$district_id' ";
                $res = $obj->query($sql);
                $s = 1;
                ?>
                <tbody>
                    <?php
                  while($display = mysqli_fetch_array($res)) {
                      ?>
                    <tr>
                        <td><?php echo $s++ ?></td>
                        <td><?php echo $display["location"] ; ?></td>
                        <td>
                            <a href="locationedit.php?location_id=<?php echo $display["location_id"]; ?>">
                                <button type="button" class="btn btn-primary">edit</button>
                            </a>
                            <a href="locationdelete.php?location_id=<?php echo $display["location_id"]; ?>">
                                <button type="button" class="btn btn-danger" onclick="return deleteConfirm()"
                                    name="btn_delete">delete</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                  }
                ?>
                </tbody>
            </table>
        </div>
        <br><br><br><br><br><br><br>
        <?php

            }

include("footer.php");
?>