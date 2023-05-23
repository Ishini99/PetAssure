<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>

const urlParams = new URLSearchParams(window.location.search);
		const deleteid = urlParams.get('deleteid');
        document.getElementById('deleteid').textContent = deleteid;
	</script>

<?php
     include "db.php";
$userid = $_GET['deleteid'];

$sqlu = "UPDATE  `serviceprovider` SET `status`='active' WHERE `userid`='$userid'";
$resultu = mysqli_query($con, $sqlu);

if ($resultu==1) {

  header("Location: AdminspDashboard.php");
  exit();
} else {
  echo "Error updating record: " . mysqli_error($con);
}

?>