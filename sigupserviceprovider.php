<?php
require_once('config/db.php');
session_start();
$fname= "";
$nic = "";
$mobile="";
$email ="";
$address="";
$district="";
$uname =" ";
$password = "";
$stype ="";
$details ="";
$myfile="";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$fname = $_POST['fname'];
$nic = $_POST['nic'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address= $_POST['address'];
$district= $_POST['district'];
$uname = $_POST['uname'];
$password = $_POST['password'];
$stype = $_POST['stype'];
$myfile=$_POST['myfile'];
$details =trim($_POST['details']);
$confirm_password = $_POST['confirm_password'];


    // Insert data into user table
    $sql_user = "INSERT INTO user (fname,nic, mobile, role,email, address,uname,password,district) VALUES ('$fname' ,'$nic','$mobile','$stype','$email','$address','$uname','$password','$district')";
    
   
    if (mysqli_query($con, $sql_user)) {
        if ($password !== $confirm_password) {
            echo '<script type="text/javascript"> alert("Password do not match,Resubmit.")</script>';
        } else {
            // Get the id of the newly inserted record in the user table
            $userid = mysqli_insert_id($con);
    
            // Insert data into serviceprovider table
            $sql_serviceprovider = "INSERT INTO serviceprovider (userid, proofs,details) VALUES ('$userid', '$myfile','$details')";
    
            if (mysqli_query($con, $sql_serviceprovider)) {
                echo '<script type="text/javascript"> alert("Congratulations. Your account was created.")</script>';
                header("Location: login.php");
                exit();
            } else {
                echo '<script type="text/javascript"> alert("Your account was not created. Please try again.")</script>';
            }
        }
    } else {
        echo '<script type="text/javascript"> alert("Your account was not created. Please try again.")</script>';
    }
    
    mysqli_close($con);
}



?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/signup2.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- JavaScript code -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function checkUsername() {
	
	jQuery.ajax({
	url: "check_availability.php",
	data:'uname='+$("#uname").val(),
	type: "POST",
	success:function(data){
		$("#check-username").html(data);
	},
	error:function (){}
	});
}
</script>

</head>
<div class ="input-box" >
    <div style=margin-top:-440px;margin-left:-620px>

<img src="Images/logo.png" height="160">
</div>
</div>
<div class ="input-box" >
    <div style=margin-top:-380px;margin-left:-480px>
    <img src="Images/PetAssure.png" height="35">

</div>
</div>
<div class ="input-box" >
    <div style=margin-top:25px;margin-left:-690px>

<img src="Images/g3.png" height="400">
</div>
</div>
<div class ="input-box" >
    <div style=margin-top:85px;margin-left:-390px>

<img src="Images/g4.png" height="160">
</div>
</div>
<body>
  <script type="text/javascript">
        var nic = document.getElementById("nic");
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
<div class="footerr" style=" z-index: -1; width: 100%;">
    <p> Telephone No: +94 11 233 5632&nbsp;&nbsp;&nbsp;&nbsp;
        Fax: +94 11 233 5632 &nbsp;&nbsp;&nbsp;&nbsp;Email: petAssure@hotmail.com​</p>
</div>


  
<div class="content">
    <form action="" method="post">
        <h2>Sign Up</h2>
        
<div class="user-details">
<div class="input-box">
<span class="details">Full Name</span>
<input type="text" name="fname" placeholder="Enter your name" required>
</div>
<div class="input-box">
<span class="details">NIC</span>
<input type="text" name="nic" placeholder="Enter your NIC number" required>
</div>
<div class="input-box">
<span class="details">Mobile Number*</span>
<input type="text" name="mobile"  placeholder="Enter your Mobile Number" required>
</div>
<div class="input-box">
<span class="details">Email Address*</span>
<input type="email" name="email" placeholder="Enter your E-mail Address" required>
</div>
<div class="input-box">
<span class="details">Address</span>
<input type="text" name="address"  placeholder="Enter your Address" required>

</div>
<div class="input-box">
    <span class="details">Districts</span>
<div class="box">

<select name='district'>
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
</div>
</div>
<div class="user-details"> 
<div class ="input-box">
    <span class="details">Description</span>
    <br><br>
    <textarea name="details" id="" cols="55" rows="4" placeholder="Enter Some details about your self"></textarea>
  </div>
  
  <div class ="input-box" >
    <div style=margin-top:135px;margin-left:-290px>
    <span class="details">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div style=margin-left:50px>

    Service Type you providing </span></div>
  </div>
  </div>
  <div>
    <label class="container">Pet sitter 
        <input type="radio" checked="checked" name="stype" value="petsitter">
        <span class="checkmark"></span>
      </label>
      <label class="container">Pet boarding 
        <input type="radio" name="stype" value="petboarding">
        <span class="checkmark"></span>
      </label>
      <label class="container">Veterinarian  
        <input type="radio" name="stype"value="veterinarian ">
        <span class="checkmark"></span>
      </label>
      <label class="container">Pet grooming
        <input type="radio" name="stype" value="petgrooming">
        <span class="checkmark"></span>
      </label>
      <br><br>
<div class="user-details">       
      <div class="input-box">
      <span class="details">&nbsp;
      Any verification proofs<br></span>
      <form action="">
    <input type="file" id="myfile" name="myfile"><br><br>
      </div>        
      



      <div class="input-box">
    
        <span class="details">User name</span>
        <input type="text" name="uname" id="uname"placeholder="Enter your user name" onInput="checkUsername()" required >
        <br><br><span id="check-username"></span>
        </div>


        <div class="input-box">
        <span class="details">Password*</span>
        <input type="password" name="password" placeholder="Enter your password"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}"required>
        </div>
        <div class="input-box">
        <span class="details">Confirm password</span>
        <input type="password"name="confirm_password" placeholder="Re-enter your password" required>
        </div>
        <div>
            
            <p style="font-size: 12px;"><b>Password must contain:</b>
            A <b>lowercase</b> letter ,a <b>capital (uppercase)</b> letter ,a  <b>number</b> and minimum <b>8 characters</b></p>
       
        <input type="submit" class="button" value="Register"name="submit" id="submit">

           
        </div>
        <p><br>Already have an account? <a href=login.php>Sign in</a></p>
    </div>
</div>


</div>


</body>
</html>
