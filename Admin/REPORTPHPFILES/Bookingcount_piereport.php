<?php
include("header.php");
include("../dboperation.php");
$obj=new dboperation();

 $sql ="SELECT count(*) as bookingcount,doctor_name,department_name FROM tbl_department de inner join tbl_doctor d on de.department_id=d.department_id inner join tbl_booking b on d.doctor_id=b.doctorid  group by b.doctorid ";  
 $result = $obj->executequery($sql);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>    
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['district', 'Number'],  
                          <?php  
                          while($display = mysqli_fetch_array($result))  
                          { 
					echo "['".$display["doctor_name"]."', ".$display["bookingcount"]."],";  
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
                <h3 align="center">Pie Chart showing the Count of Patients in Each Doctor</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
          </div>
      </body>  
 </html>  
</body>
</html>
<?php
include("footer.php");
?>