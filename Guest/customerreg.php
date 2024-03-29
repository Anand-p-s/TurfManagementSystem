<link rel="stylesheet" href="assets/css/style.css">


<div class="content-wrapper">
    <div style="text-align: center;">
        <h2>Sign Up Form</h2>
    </div>

    <br>
    <div style="height: 657px;
  width: 70%; margin: auto;">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <img style="opacity: 0.8;" src="img/signup" alt="img" srcset="">
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="customerregaction.php" method="post">
                            <?php
                      require_once('../dboperation.php');
                            $obj = new dboperation();
                            $sql = "select * from tbl_district";
                            $res = $obj->query($sql);
                            ?>
                            <div class="form-group">
                                <label for="txt_name">Full name</label>
                                <input type="text" class="form-control" id="txt_name" name="txt_name"
                                    pattern="^[A-Za_z][A-Za-z -]+$" required />
                            </div>
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
                                <select class="form-control" name="ddllocation" id="ddllocation"
                                    onchange="this.form.submit()" required>
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
                            <div class="form-group">
                                <label for="txt_username">Username</label>
                                <p style="opacity: 80%; font-size: x-small;">lower case only (min:5 max:15)</p>
                                <input type="text" class="form-control" id="txt_username" name="txt_username"
                                    pattern="[a-z]{5,15}" required />
                            </div>
                            <div class="form-group">
                                <label for="InputEmail1">Email address</label>
                                <input type="email" class="form-control" id="InputEmail1" name="email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                            </div>
                            <div class="form-group">
                                <label for="txt_phone">Contact</label>
                                <input type="text" class="form-control" id="txt_phone" maxlength="10" name="txt_phone"
                                    pattern="[0-9]{10}" required />
                            </div>

                            <div class="form-group">
                                <label for="InputPassword1">Password</label>
                                <p style="opacity: 80%;
    font-size: x-small;">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or
                                    more characters</p>
                                <input type="password" class="form-control" id="InputPassword1" name="password"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                            </div>

                            <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                            <!-- <button type="reset" class="btn btn-light">Cancel</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ajax code-->
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