		const urlParams = new URLSearchParams(window.location.search);
		const username = urlParams.get('username');
        document.getElementById('username').textContent = username;

		$.ajax({
  url: 'profilesingle.php',
  type: 'POST',
  data: { username: username },
  success: function(response) {
    console.log(response);
  },
  error: function(xhr, status, error) {
    console.error(xhr.responseText);
  }
});
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>