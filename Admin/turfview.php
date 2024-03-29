<?php
include("header.php");
?>
<div class="main-panel" style="margin-top: -21px;">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Choose Preferences</h3>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Basic tables </li>
                </ol>
            </nav> -->
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="post">
                            <?php
                        require_once('../dboperation.php');
$obj = new dboperation();
$sql = "select * from tbl_district";
$res = $obj->query($sql);

?>
                            <div class="form-group">
                                <label for="seldistrictid">District</label>
                                <select class="form-control" name="ddldistrict" id="ddldistrict">
                                    <option>---</option>
                                    <?php
                                $sql = "select * from tbl_district";
$res = $obj->query($sql);

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
                            <div class="form-group" id="location">
                                <label for="ddllocation">Location</label>
                                <select class="form-control" name="ddllocation" id="ddllocation">
                                    <option>---</option>
                                    <?php
        $district_id = $_POST['seldistrict'];
$sql = "select * from tbl_location where location_id=$district_id";
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
                            <div class="form-group" id="">
                                <label for="selGame">Game Category</label>
                                <select class="form-control" name="selGame" id="selGame" onchange="this.form.submit()">
                                    <option>---</option>
                                    <?php
        $sql = "select * from tbl_game";
$res = $obj->query($sql);

while($display = mysqli_fetch_array($res)) {
    ?>
                                    <option value="<?php echo $display["game_id"]?>">
                                        <?php echo $display["game"]?>
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
if (isset($_POST['selGame'])) {
    $game_id1 = $_POST['selGame'];
    $location_id1 = $_POST['ddllocation'];
    ?>
        <div class="content-wraper">
            <a href="turfreg.php" class="btn btn-outline-primary" style="margin-left: 717px;">Add Turf</a>
            <div class="row">
                <div class="page-header">
                    <h3 class="page-title">Turf List</h3>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p> -->

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <?php
                        include_once("../dboperation.php");
    $obj = new dboperation();

    $sql = "select * from tbl_turf where location_id=$location_id1 and game_id=$game_id1 order by turf_id desc";
    $res = $obj->query($sql);
    ?>
                                    <thead>
                                        <tr>
                                            <th>Turf</th>
                                        </tr>
                                    </thead>
                                    <?php
while ($display = mysqli_fetch_array($res)) {
    ?>
                                    <tbody>
                                        <tr>
                                            <td class="py-1">
                                                <?php echo $display['turf'] ?>
                                            </td>
                                            <td>
                                                <img style="width: 267px; height: 134px;"
                                                    src="../uploads/<?php echo $display["image"]; ?>" alt="">
                                            </td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="turfviewmore.php?turfid=<?php echo $display['turf_id']; ?>">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
}
    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
}else {
    ?>
        <div class="content-wraper">
            <a href="turfreg.php" class="btn btn-outline-primary" style="margin-left: 717px;">Add Turf</a>
            <div class="row">
                <div class="page-header">
                    <h3 class="page-title">Turf List</h3>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p> -->

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <?php
                    include_once("../dboperation.php");
    $obj = new dboperation();

    $sql = "select * from tbl_turf order by turf_id desc";
    $res = $obj->query($sql);
    ?>
                                    <thead>
                                        <tr>
                                            <th>Turf</th>
                                        </tr>
                                    </thead>
                                    <?php
while ($display = mysqli_fetch_array($res)) {
    ?>
                                    <tbody>
                                        <tr>
                                            <td class="py-1">
                                                <?php echo $display['turf'] ?>
                                            </td>
                                            <td>
                                                <img style="width: 267px; height: 134px;"
                                                    src="../uploads/<?php echo $display["image"]; ?>" alt="">
                                            </td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="turfviewmore.php?turfid=<?php echo $display['turf_id']; ?>">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
}
    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
}
?>

    </div>

</div>

<!-- Ajax code -->
<script src="jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    //alert("a")
    $("#ddldistrict").change(function() {
        // alert("a")
        var district_id = $(this).val();
        //  alert(district_id)
        $.ajax({
            url: "getLocation.php",
            method: "POST",
            data: {
                district_id: district_id
            },
            success: function(response) {
                $("#location").html(response);
            },
            error: function() {
                $("#location").html("Error occurred while getting location!");
            }
        });
    });
});
</script>

<?php
include("footer.php");
?>