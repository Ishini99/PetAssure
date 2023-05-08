<?php
     include "db.php";
$userid = $_POST['empid'];
$name = $_POST['uname'];
$nic = $_POST['nic'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];

$sqlu = "UPDATE `employees` SET `emp_name`='$name',`nic`='$nic',`address`='$address',`mobile`='$mobile' WHERE `empid`='$userid'";
$resultu = mysqli_query($con, $sqlu);

if ($resultu) {

  header("Location: updateemployee.php");
  exit();
} else {
  echo "Error updating record: " . mysqli_error($con);
}

?>