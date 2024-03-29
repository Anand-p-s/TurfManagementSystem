<?php
include("header.php");
?>
<div class="main-panel" style="margin-top: -21px;">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Edit Turf Details</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Form elements </li> -->
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="turfeditaction.php" method="post"
                            enctype="multipart/form-data">
                            <?php
                      require_once('../dboperation.php');
                      $obj = new dboperation();
                      $sql = "select * from tbl_district";
                      $res = $obj->query($sql);
                      
                      $turfid = $_GET['turfid'];
                      $sql1 = "select * from tbl_turf where turf_id=$turfid";
                      $res1 = $obj->query($sql1);
                      $row = mysqli_fetch_array($res1);
                      ?>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Turf</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="txt_turf"
                                    value="<?php echo $row['turf']; ?>" pattern="^[A-Za_z][A-Za-z -]+$" required />
                            </div>
                            <div class="form-group" id="">
                                <label for="selGame">Game Category</label>
                                <select class="form-control" name="selGame" id="selGame" required>
                                    <option>---</option>
                                    <?php
                                $sql = "select * from tbl_game";
                                $res = $obj->query($sql);
                    
                                while($display = mysqli_fetch_array($res))
                                {
                            ?>
                                    <option value="<?php echo $display["game_id"]?>">
                                        <?php echo $display["game"]?>
                                    </option>
                                    <?php
                            }
                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cost</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" required
                                    pattern="[0-9]{10}" value="<?php echo $row['cost']; ?>" name="num_cost" />
                            </div>
                            <div class="form-group">
                                <label for="seldistrictid">District</label>
                                <select class="form-control" name="ddldistrict" id="ddldistrict" required>
                                    <option>---</option>
                                    <?php
                                $sql = "select * from tbl_district";
                                $res = $obj->query($sql);
                                
                                while($display = mysqli_fetch_array($res))
                                {
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
                                <select class="form-control" name="ddllocation" id="ddllocation"
                                    onchange="this.form.submit()" required>
                                    <option>---</option>
                                    <?php
                                $district_id = $_POST['seldistrict'];
                                $sql = "select * from tbl_location where location_id=$district_id";
                                while($display = mysqli_fetch_array($res))
                                {
                            ?>
                                    <option value="<?php echo $display["district_id"]?>">
                                        <?php echo $display["district_name"]?>
                                    </option>
                                    <?php
                            }
                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="txt_description" pattern="^[A-Za_z][A-Za-z -]+$" required>
                                    <?php echo $row['description']; ?>
                        </textarea>
                            </div>
                            <div class="form-group">
                                <label for="turfpic">Picture</label>
                                <input class="form-control" type="file" id="turfpic" name="img_turf" required>
                            </div>
                            <input type="hidden" name="turfid" value="<?php echo $row['turf_id']; ?>">
                            <button type="submit" class="btn btn-primary mr-2"> Edit </button>
                            <!-- <a href="turfview.php" class="btn btn-light">Cancel</a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ajax code
 -->
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