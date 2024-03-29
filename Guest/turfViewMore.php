<?php
include('header.php');
require_once("../dboperation.php");
$obj = new dboperation();

$turf_id = $_GET['turf_id'];
$sql = "select * from tbl_turf inner join tbl_game on tbl_turf.game_id=tbl_game.game_id 
inner join tbl_district on tbl_turf.district_id=tbl_district.district_id 
inner join tbl_location on tbl_turf.location_id=tbl_location.location_id where turf_id=$turf_id";
$res = $obj->query($sql);
$display = mysqli_fetch_array($res);
?>



<section class="hero-section set-bg" data-setbg="../uploads/<?php echo $display['image']; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hs-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hs-text">
                                    <h2 style="text-shadow: 2px 2px 4px black;"><?php echo $display['turf']  ?></h2>
                                    <h4 style="text-shadow: 2px 2px 4px black;"><?php echo "(".$display['game'].")"  ?>
                                    </h4>
                                    <h4 style="text-shadow: 2px 2px 4px black;">
                                        <?php echo $display['district_name'].", ". $display['location'] ?></h4>
                                    <h4 style="text-shadow: 2px 2px 4px black;"><?php echo $display['description']  ?>
                                    </h4>
                                    <br><br>
                                    <h5 style="color: white; text-shadow: 2px 2px 4px black;"> PLease sign in or sign up
                                        to continue
                                        booking </h5>
                                    <a class="signin" href="login.php">Sign in</a>
                                    or
                                    <li><a class="signup" href="customerreg.php">Sign up</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<div>
    <form>
        <div class="container" id="turf_view">
            <div class="col-lg-6 p-0">
                <label class="section-title" for="bookdate">
                    <h3>Turf <span>Require Date</span></h3>
                </label>
                <input class="form-control" type="hidden" id="turf_id" name="turf_id" value="<?php echo $turf_id ?>">
                <input style="width: 40%" class="form-control" type="date" <?php echo 'min="' .date('Y-m-d').'"';?>
                    id="requiredate" name="requiredate">

            </div>
            <div id="timeslot" class="row">
                
            </div>

        </div>
    </form>
</div>
<script src="jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    //  alert('a');
    $("#requiredate").change(function() {

        var req_date = $(this).val();
        //  alert(req_date);
        var turfid = document.getElementById('turf_id').value;
        // alert(req_date);
        $.ajax({
            url: "getTimeslot.php",
            method: "POST",
            data: {
                req_date: req_date,
                turfid: turfid
            },
            success: function(response) {
                // alert("a");

                $("#timeslot").html(response);
            },
            error: function() {
                $("#timeslot").html("Error occurred while getting time!");
            }
        });
    });
});
</script>

<?php
include('footer.php');
?>