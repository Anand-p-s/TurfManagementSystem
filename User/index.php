<?php
include('header.php');
?>
<link rel="stylesheet" href="css/locationSearch.css">

<!-- Soccer Section Begin -->
<section class="soccer-section">
    <?php
    require_once("../dboperation.php");
$obj = new dboperation();

?>
    <div class="container">
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
                                <select class="form-control" name="ddldistrict" id="ddldistrict" required>
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
                                <select class="form-control" name="ddllocation" id="ddllocation" required>
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
                                <select class="form-control" name="selGame" id="selGame" onchange="this.form.submit()" required>
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
if (isset($_POST['selGame'])) {
    $game_id1 = $_POST['selGame'];
    $location_id1 = $_POST['ddllocation'];
    // echo $game_id1;
    // echo $location_id1;
    ?>

    <div class="container">
        <?php
        $sql = "select * from tbl_turf T inner join tbl_game G on T.game_id=G.game_id inner join tbl_location L on T.location_id=L.location_id where T.game_id=$game_id1 and T.location_id=$location_id1";
    $res = $obj->query($sql);
    ?>
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="section-title">
                    <h3>Turf <span>List</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
while($display = mysqli_fetch_array($res)) {
    ?>
            <div class="col-lg-3 col-sm-6 p-0">
                <div class="soccer-item set-bg" data-setbg="../uploads/<?php echo $display['image']; ?>">
                    <div class="si-tag"><?php echo $display['game']; ?></div>
                    <div class="si-text">
                        <h5><a href="#"><?php echo $display['turf']; ?></a></h5>
                        <ul>
                            <a href="turfViewMore.php?turf_id=<?php echo $display["turf_id"]; ?>">
                                <button type="button" class="btn btn-primary">view more</button>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
}
    ?>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <?php
        $sql = "select * from tbl_turf T inner join tbl_game G on T.game_id=G.game_id inner join tbl_location L on T.location_id=L.location_id";
    $res = $obj->query($sql);
    ?>
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="section-title">
                    <h3>Turf <span>List</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
while($display = mysqli_fetch_array($res)) {
    ?>
            <div class="col-lg-3 col-sm-6 p-0">
                <div class="soccer-item set-bg" data-setbg="../uploads/<?php echo $display['image']; ?>">
                    <div class="si-tag"><?php echo $display['game']; ?></div>
                    <div class="si-text">
                        <h5><a href="#"><?php echo $display['turf']; ?></a></h5>
                        <ul>
                            <a href="turfViewMore.php?turf_id=<?php echo $display["turf_id"]; ?>">
                                <button type="button" class="btn btn-primary">view more</button>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
}
    ?>
        </div>
    </div>
    <?php
}
?>
</section>
<?php
include('footer.php');
?>