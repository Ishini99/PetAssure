<!DOCTYPE html>
<html>
<head>
	<title>Display Username</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>

const urlParams = new URLSearchParams(window.location.search);
		const username = urlParams.get('username');
        document.getElementById('username').textContent = username;

		$.ajax({
  url: 'other_page.php',
  type: 'GET',
  data: { username: username }
});
	</script>
</head>
<body>
	<h1>Welcome, <span id="username"></span>!</h1>
<?php
	$usern = $_GET['username'];
	echo $usern;
	?>
</body>
</html>
