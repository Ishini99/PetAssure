<?php
require_once('../config/db.php');

session_start();

$sql = "SELECT * FROM pet_selling";

$district = '';
$search = '';



if (!empty($_GET['district'])) {
  $district = $_GET['district'];
}
//for search
if (!empty($_GET['search'])) {
  $search = $_GET['search'];
}

$sql = "SELECT * FROM pet_selling";

if (!empty($district)) {
  $sql .= " WHERE district LIKE '$district' ";

  //for search
} else if (!empty($search)) {
  $sql .= " WHERE name LIKE '%$search%'";
} else {
  $sql .= "";
}

$result = mysqli_query($con, $sql);

?>

<?php
if (isset($_GET['district'])) {
  $district = $_GET['district'];
} else {
  // Default value if no option is selected
  $district = "All";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/posts.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <title>Pet Sale</title>
</head>
<style>
  body {
    background-image: url("../images/bg2.png");
  }
</style>

<body>
  <div class="page">
    <div class="nav" style="width: 100%">
      <div class="left">
        <img src="../images/logo.png" width="100px" height="100px" />
        <p style="margin-left: 20px">PetAssure </p>
      </div>

      <div class="right">
        <a href="homepage.html" class="font">HOME</a>
        <a href="userProfile.php" class="font">PROFILE</a>
        <a href="services1.php" class="font">SERVICES</a>
        <a href="../login.php" class="font">LOG OUT</a>
      </div>
    </div>
  </div>
  <div class="content" style="margin-top: 70px">
    <div class="filter" style="margin-left: 10px">
      <div>
        <select onchange="districtChanged(this.value)" style="
              margin-left: 10px;
              margin-top: 20px;
              width: 200px;
              height: 35px;
            " name="district" id="district">
          <option value="All" disabled selected>All</option>
          <option value="Colombo">Colombo</option>
          <option value="Gampaha">Gampaha</option>
          <option value="Kalutara">Kalutara</option>
          <option value="Kandy">Kandy</option>
          <option value="Matale">Matale</option>
          <option value="NuwaraEliya">Nuwara Eliya</option>
          <option value="Galle">Galle</option>
          <option value="Matara">Matara</option>
          <option value="Hambantota">Hambantota</option>
          <option value="Jaffna">Jaffna</option>
          <option value="Kilinochchi">Kilinochchi</option>
          <option value="Mannar">Mannar</option>
          <option value="Vavuniya">Vavuniya</option>
          <option value="Mullaitivu">Mullaitivu</option>
          <option value="Batticaloa">Batticaloa</option>
          <option value="Ampara">Ampara</option>
          <option value="Trincomalee">Trincomalee</option>
          <option value="Kurunegala">Kurunegala</option>
          <option value="Puttalam">Puttalam</option>
          <option value="Anuradhapura">Anuradhapura</option>
          <option value="Polonnaruwa">Polonnaruwa</option>
          <option value="Badulla">Badulla</option>
          <option value="Moneragala">Moneragala</option>
          <option value="Ratnapura">Ratnapura</option>
          <option value="Kegalle">Kegalle</option>
        </select>
      </div>


      <div>
        <div>
          <input id="searchtext" style="
              margin-left: 10px;
              margin-top: 20px;
              width: 800px;
              height: 30px;
            " type="text" placeholder="Search Here" />
          <button class="sbtn" onclick="Seachingbytext()">Search</button>

          <!-- <button class="sbtn" onclick="location.href='saleposts.php?district=<?php echo $district; ?>&search=<?php echo $search; ?>'">Search</button> -->
        </div>
      </div>
    </div>
    <div style="display: flex; justify-content: center">
      <h1>Sale</h1>
    </div>
    <div style="display: flex; justify-content: center">
      <div style="display: flex; justify-content: space-around">
        <a href="adoptposts.php"><button class="btn">Adoption
            <?php $district ?>
          </button></a>
        <a href="saleposts.php"><button class="btn">Sale</button></a>
        <a href="crossposts.php"> <button class="btn">Crossing</button></a>
      </div>
    </div>
    <div style="
          display: flex;
          flex-direction: column;
          margin: 10px;
          justify-content: center;
          align-items: center;
        ">


      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="card">
          <div
            style="
              display: flex;
              justify-content: center;
              align-items: center;
              margin: 10px;
            "
          >
          <a href="salepostview2.php?variety=' . $row['name'] . '&image=' . $row['image'] . '&district=' . $row['district'] . '&description=' . $row['description'] . '&phone_number=' . $row['phone_number'] . '&name=' . $row['name'] . '">
            <img
              src="../images/' . $row['image'] . '"
              width="150px"
              height="150px"
              style="border-radius: 8%"
              
            />
            </a>
          </div>
          <div style="margin: 10px">
            <h3>' . $row['name'] . '</h3>
            
            <p>
            ' . $row['district'] . '
            </p>
            <p>
            ' . $row['description'] . '
            </p>
            <p style="font-weight: 800">Rs. ' . $row['price'] . '</p>
          </div> 
        </div> 
        ';
      }
      ; ?>

    </div>

    <div>
      <div style="display: flex; justify-content: right">
        <button onclick="location.href='addpost.php'" class="addbtn"><span>&#43;</span><b> Add your post</b></button>
      </div>
    </div>
  </div>
  <div class="footerr" style="z-index: -1; width: 100%; position: relative">
    <p>
      Telephone No: +94 11 233 5632&nbsp;&nbsp;&nbsp;&nbsp; Fax: +94 11 233
      5632 &nbsp;&nbsp;&nbsp;&nbsp;Email: petAssure@hotmail.com​
    </p>
  </div>

  <script>
    function districtChanged(value) {
      if (value === "All") {
        location.href = 'saleposts.php'
      } else {
        location.href = 'saleposts.php?district=' + value
      }
    }
    //for search
    function Seachingbytext() {
      let value = document.getElementById("searchtext").value
      location.href = 'saleposts.php?search=' + value
    }
  </script>

</body>

</html>