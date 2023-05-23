<?php
     include "db.php";
$userid = $_POST['userid'];
$name = $_POST['fname'];
$nic = $_POST['nic'];
$district = $_POST['district'];
$mobile = $_POST['mobile'];

$sqlu = "UPDATE  `user` SET `fname`='$name',`nic`='$nic',`district`='$district',`mobile`='$mobile' WHERE `userid`='$userid'";
$resultu = mysqli_query($con, $sqlu);

if ($resultu==1) {

  header("Location: AdminclientDash.php");
  exit();
} else {
  echo "Error updating record: " . mysqli_error($con);
}

?>