<?php
include_once("header.php");
?>
<br><br><br>

<div class="col-md-8" style="margin-top: 103px;">
    <?php
    include_once('../dboperation.php');
    $obj=new dboperation();

    $turfid=$_GET['turfid'];

    $sql = "select * from tbl_turf t inner join tbl_game g on t.game_id=g.game_id inner join tbl_location l on t.location_id=l.location_id where t.turf_id=$turfid";
    $res=$obj->query($sql);
    $row = mysqli_fetch_array($res);
    ?>
    <div>
        <img style="width: 496px;" src="../uploads/<?php echo $row['image'] ?>" alt="">
    </div>
    <br><br>
    <h3>Turf Details</h3>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Turf</h6>
                </div>
                <div class="col-sm-9">
                    <?php echo $row['turf']; ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">cost</h6>
                </div>
                <div class="col-sm-9">
                    <?php echo $row['cost']; ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Description</h6>
                </div>
                <div class="col-sm-9">
                    <?php echo $row['description']; ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Game</h6>
                </div>
                <div class="col-sm-9 ">
                    <?php echo $row['game']; ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Location</h6>
                </div>
                <div class="col-sm-9 ">
                    <?php echo $row['location']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="margin-bottom: 100px;">
            <a class="btn btn-info" href="turfedit.php?turfid=<?php echo $row['turf_id']; ?>">Edit Turf Details</a>
            <a class="btn btn-danger" href="turfdelete.php?turfid=<?php echo $row['turf_id']; ?>" onclick="return confirm('Do you want to remove?')">Remove Turf</a>
        </div>
    </div>
</div>
<br><br><br><br>
<?php
include_once("footer.php");
?>