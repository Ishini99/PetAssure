<?php
include "../config/db.php";

$dataPoint = array();
$count=0;
$sql = "SELECT COUNT(*) as total, district FROM  `user` WHERE `role`!='admin' && `role`='client' GROUP BY (district);";
$result = mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($result)){

        $dataPoint[$count]["label"]=$row["district"];
        $dataPoint[$count]["y"]=$row["total"];
        $count=$count+1;

       }
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: false,
     theme: "light2",
     title:{
         text: "Service Providers"
     },
     axisY: {
         title: "No of Service Providers"
     },
     data: [{
         type: "column",
         yValueFormatString: "#,##0.## USD",
         dataPoints: <?php echo json_encode($dataPoint, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
</script>
</head>
<body>
<div id="chartContainer" style="height: 270px; width: 100%;"></div>
<script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>
