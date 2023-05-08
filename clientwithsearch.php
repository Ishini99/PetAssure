<!DOCTYPE html>
<html>
<head>
  <title>PHP Table with Search Bar</title>
</head>
<body>
  <h1>PHP Table with Search Bar</h1>
  
  <form action="" method="POST">
    <input type="text" name="search" placeholder="Search...">
    <button type="submit" name="submit">Search</button>
  </form>
  
  <?php
    include "db.php";
    
    // Check if search form has been submitted and if the search query is not empty
    if (isset($_POST['submit'])) {
      $search = $_POST['search'];
      if (!empty($search)) {
        // Perform search query
        $sql = "SELECT `fname`, `nic`, `email`, `mobile`, `address`,`userid` FROM `user` WHERE `fname` LIKE '%$search%'";
      } else {
        // If search query is empty, show all records
        $sql = "SELECT `fname`, `nic`, `email`, `mobile`, `address`,`userid` FROM `user`;";
      }
    } else {
      // If search form has not been submitted, show all records
      $sql = "SELECT `fname`, `nic`, `email`, `mobile`, `address`,`userid` FROM `user`;";
    }
    
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr>";
      echo "<th>Column 1</th>";
      echo "<th>Column 2</th>";
      echo "<th>Column 3</th>";
      echo "<th>Column 1</th>";
      echo "<th>Column 2</th>";
      echo "<th>Column 3</th>";
      echo "</tr>";
      
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['fname'] . "</td>";
        echo "<td>" . $row['nic'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
        echo "</tr>";
      }
      
      echo "</table>";
    } else {
      echo "No records found.";
    }
    
    mysqli_close($con);
  ?>
  
  <script>
    document.querySelector('input[name="search"]').addEventListener('input', function() {
      search();
    });
    
    function search() {
      var searchQuery = document.querySelector('input[name="search"]').value;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("table-container").innerHTML = this.responseText;
        }
      };
      xhttp.open("POST", "search.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("search=" + searchQuery);
    }
  </script>
</body>
</html>
