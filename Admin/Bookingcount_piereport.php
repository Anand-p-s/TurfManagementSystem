<?php
include_once('header.php');
include("../dboperation.php");
$obj = new dboperation();

$sql = "SELECT COUNT(*) as booking_count,turf 
FROM tbl_request R inner join tbl_turf T on R.turf_id=T.turf_id 
where R.status != 'rejected' and R.status!='notconfirmed' 
GROUP BY R.turf_id";

$result = $obj->query($sql);
?>
<br><br><br>
<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['turf', 'bookingcount'],
            <?php
                         while($display = mysqli_fetch_array($result)) {
                             echo "['".$display["turf"]."', ".$display["booking_count"]."],";
                         }
?>
        ]);
        var options = {
            title: 'Percentage ',
            //is3D:true,  
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div class="logo">
        <a href="./index.php">
            <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <img src="img/logo.png" alt="">&nbsp; &nbsp;</a>
    </div>
    <div style="width:900px; margin-top:6%">
        <h3 align="center">Pie chart showing the count of mostly booked Turf</h3>
        <br />
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
    </div>
</body>

</html>
</body>

</html>
<?php
include_once('footer.php');
?>