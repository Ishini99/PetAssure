<?php
include "connect.php";
$hotelname ="";
$rating ="";
$district ="";
$comments = "";
$mobile="";
$email= "";


if(isset($_POST['submit'])){

    $hotelname = $_POST['hotelname'];
    $rating = $_POST['rating'];
    $district = $_POST['districts'];
    $comments = $_POST['comments'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

$sql = "INSERT INTO `feedback`(`hotelname`, `rating`, `district`, `comments`, `mobile`, `email`) VALUES ('$hotelname','$rating','$district','$comments','$mobile','$email')";

$result = $conn->query($sql);


if($result == TRUE) {
    header("Location: viewhotel.php");
}
else {
    echo "Error:" . $sql . "<br>". $conn->error;
}
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/addpost.css" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <title>Hotel Recommondation</title>

    <script type="text/javascript">
        var nic = document.getElementById("mobile");
        nic.addEventListener('input',()=>
        {
            nic.setCustomValidity('');
            nic.checkValidity();
        });
       
   
    nic.addEventListener('invalid',()=>{
        if (nic.value ==''){
            nic.setCustomValidity('Enter  NIC');
        }
        else{
            nic.setCustomValidity('Enter NIC in123456789V or 200256789123 format')
        }
    });
    
    </script>
  </head>
  <style>
    body  {
      background-image:  url("assets/bg3.png");
      
    }
    </style>
  <body>
    
    <div class="page">

        <div class="nav" style="width: 100%;">
            <div class="left">
                <img src="assets/img4.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="#" class="font">HOME</a>
                <a href="#" class="font">PROFILE</a>
                <a href="#" class="font">SERVICES</a>

                <a href="#" class="font">LOG OUT </a>
            </div>
        </div>
        <div>
        <div class="page">
        <div class="wrapper">
    
      <form name="addpost" action="addpost.php" onsubmit="return validateForm()" method="post">
        <fieldset>
            <legend class="subtitle2"> HOTEL RECOMMONDATION </legend>
      <div>
          <div
            style="display: flex; flex-direction: column; margin: 10px 0px"
            class=""
          >
          <div style="display: flex; flex-direction: column; margin-top: 20px">
            <label  style="font-weight: bold" for="desc">Hotel Name</label></div>
            <br>
            <div class="input-box">
            <input class="textboxx1" type="text" name="hotelname">
             </div>
        </div>
            <label style="font-weight: bold" for="districts">Districts</label>
            <br>
            <select
              style="
                margin-left: 0px;
                margin-top: 10px;
                width: 200px;
                height: 30px;
                border: 1px dashed #000000;
                outline:0;
                background: #f2f2f2;
                color: #333;
              "
              name="districts"
              id="districts"
            >
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
          
          <div style="display: flex; flex-direction: row">
            <div
              style="
                display: flex;
                flex-direction: column;
              
                margin-top: 20px;
              "
            >
            <div style="display: flex; flex-direction: column">
                <div style="display: flex; flex-direction: column; margin-top: 20px">
                <label  style="font-weight: bold" for="desc">Rating</label></div>
                <br>
                <div class="input-box">
                <input class="textboxx1" type="text" name="rating" required>
                </div>
            </div>

            
              
            </div>
          </div>
          <div style="display: flex; flex-direction: column; margin-top: 20px">
            <label style="font-weight: bold" for="desc">Comments</label>
            <br>
            <div class="input-box">
            <input class="textboxx2" type="text" name="comments">
            </div>
          </div>

          <div style="margin-top: 20px">
            
          <fieldset>
            <legend class="subtitle3"> Contact Details</legend>  
            <h4 class="subtitle1">Email Adress</h4>
            <div class="input-box">
            <input class="textboxx1" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            </div>
            <h4 class="subtitle1">Mobile Number</h4>
            <div class="input-box">
            <input class="textboxx1" type="text" name="mobile" required>
            </div>  
          </fieldset>

              <div style="display: flex; flex-direction: row">
                <input class="button" type="submit" name="submit" value="Post">
              </div>
            </form>
  </div>
          </div>
        </div>
        <div class="footerr" style=" z-index: -1; width: 100%;">
            <p> Telephone No: +94 11 233 5632&nbsp;&nbsp;&nbsp;&nbsp;
                Fax: +94 11 233 5632 &nbsp;&nbsp;&nbsp;&nbsp;Email: petAssure@hotmail.com​</p>
        </div>
    </div>
    </div>
  </body>
</html>
