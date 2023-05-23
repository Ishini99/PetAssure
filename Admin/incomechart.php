<?php
include "db.php";

$dataPoint = array();
$count=0;
$sql = "SELECT DATE(`created_at`) AS date, SUM(`amount`) AS total_amount FROM `transactions` GROUP BY DATE(`created_at`);";
       $result = mysqli_query($con,$sql);
       while ($row = mysqli_fetch_array($result)){

        $dataPoint[$count]["label"]=$row["date"];
        $dataPoint[$count]["y"]=$row["total_amount"];
        $count=$count+1;

       }
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2",
     title:{
         text: "Total Earnings"
     },
     axisY: {
         title: "Earnings (In USD)"
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
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>