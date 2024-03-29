<?php
include("header.php");
?>
<div class="main-panel" style="margin-top: -22px;">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Turf registration</h3>
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
                        <form class="forms-sample" action="turfregaction.php" method="post"
                            enctype="multipart/form-data">
                            <?php
                      require_once('../dboperation.php');
                      $obj = new dboperation();
                      $sql = "select * from tbl_district";
                      $res = $obj->query($sql);
                      
                      ?>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Turf</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="txt_turf"
                                   placeholder="turf name here..." pattern="^[A-Za_z][A-Za-z -]+$" required />
                            </div>
                            <div class="form-group" id="">
                                <label for="selGame">Game Category</label>
                                <select required class="form-control" name="selGame" id="selGame">
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
                                <label for="num_cost">Cost</label>
                                <input type="number" class="form-control" id="num_cost" required pattern="[0-9]{10}"
                                    name="num_cost" />
                            </div>
                            <div class="form-group">
                                <label for="ddldistrict">District</label>
                                <select class="form-control" name="ddldistrict" id="ddldistrict" required>
                                    <option>---</option>
                                    <?php
                                $sql = "select * from tbl_district";
                                $res = $obj->query($sql);
                                
                                while($display = mysqli_fetch_array($res))
                                {
                            ?>
                                    <option value="<?php echo $display["district_id"]?>" required>
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
                                    <option value="<?php echo $display["district_id"]?>" required>
                                        <?php echo $display["district_name"]?>
                                    </option>
                                    <?php
                            }
                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txt_description">Description</label>
                                <textarea class="form-control" id="txt_description" name="txt_description" required>
                        </textarea>
                            </div>
                            <div class="form-group">
                                <label for="turfpic">Picture</label>
                                <input class="form-control" type="file" id="turfpic" name="img_turf" required>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                            <!-- <button type="reset" class="btn btn-light">Cancel</button> -->
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