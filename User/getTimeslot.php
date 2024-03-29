<?php
//echo "a";
if(isset($_POST["req_date"])) {
    $req_date = $_POST["req_date"];
    $turfid = $_POST["turfid"];
    //echo $req_date;
    //select slot_id,slot_time from tbl_timeslot where turf_id =8
    // You can replace this code with a database query to retrieve the states for the selected country
    include_once("../dboperation.php");
    $obj = new dboperation();
    $s = 1;
    $q = "select * from tbl_request  where required_date='$req_date' and turf_id=$turfid  ";
    $result = $obj->query($q);
    //print_r(mysqli_num_rows($result));
    ?>
<div id="timeslot" class="row" style="width: 100%;">
    <div class="col-lg-6 p-0">
        <br>
        <div class="section-title">
            <h3>Slots <span>Available</span></h3>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <?php
        // $sql = "select * from tbl_timeslot where turf_id=$turf_id";
        // $res = $obj->query($sql);

    ?>
                <tbody>
                    <?php
                if(mysqli_num_rows($result) > 0) {
                    $sql = "SELECT * FROM tbl_request r INNER join tbl_timeslot t on r.slot_id = t.slot_id where r.status='confirmed' and r.required_date ='$req_date' and t.turf_id=$turfid";

                    $result = $obj->query($sql);

                    ?>
                    <?php
if(mysqli_num_rows($result) > 0) {

    while($r = mysqli_fetch_array($result)) {
        // print_r($r);
        $q = "SELECT * FROM tbl_timeslot  where slot_id != $r[4] and turf_id=$turfid";
        $re = $obj->query($q);
        while($re1 = mysqli_fetch_array($re)) {
            ?>
                    <tr>
                        <td><?php echo $s++ ?></td>
                        <td><?php echo $re1[1] ; ?></td>
                        <td>
                            <input type="radio" name="ch_slot" value="<?php echo $re1[0];?>">
                        </td>
                    </tr>
                    <?php
        }
    }
} else {
    // echo "haii";
    $q = "SELECT * FROM tbl_timeslot  where turf_id=$turfid";
    $re = $obj->query($q);
    while($re1 = mysqli_fetch_array($re)) {
        ?>
                    <tr>
                        <td><?php echo $s++ ?></td>
                        <td><?php echo $re1[1] ; ?></td>
                        <td>
                            <input type="radio" name="ch_slot" value="<?php echo $re1[0];?>">
                        </td>
                    </tr>
                    <?php
    }
}
                } else {
                    // echo "haii";
                     $q = "SELECT * FROM tbl_timeslot  where turf_id=$turfid";
                    $re = $obj->query($q);
                    while($re1 = mysqli_fetch_array($re)) {
                        ?>
                    <tr>
                        <td><?php echo $s++ ?></td>
                        <td><?php echo $re1[1] ; ?></td>
                        <td>
                            <input type="radio" name="ch_slot" value="<?php echo $re1[0];?>">
                        </td>
                    </tr>
                    <?php
                    }
                }
    ?>
                    <tr>
                        <td colspan="3"><button type="submit" class="btn btn-primary" name="book">Book</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
}
?>