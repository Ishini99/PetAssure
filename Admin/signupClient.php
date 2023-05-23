<?php
require_once('connect.php');
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $fname = $_POST['fname'];
  $nic = $_POST['nic'];
  $mobileno = $_POST['mobile'];
 $email = $_POST['email'];
  $address= $_POST['address'];
  $district= $_POST['district'];
  $username = $_POST['uname'];
  $pword = $_POST['pword'];
  $stype = $_POST['stype'];
        //escapes special characters in a string


        $sql= "INSERT INTO `client`(`fname`, `nic`, `uname`, `email`, `mobile`, `address`, `pword`, `role`) VALUES ('$fname','$nic','$username','$email','$mobileno','$address','$pword','$stype')";

        if (mysqli_query($conn, $sql))
        {
           echo '<script type="text/javascript"> alert("Congragulations. your account was created.")</script>';
           header("Location:loginnew.php");
           exit();
        }
 else
  {
     echo '<script type="text/javascript"> alert(" your account was  not created password is not correct.")</script>';
         
 }
 
 mysqli_close($conn);
}
  
   

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/signup2.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div class ="input-box" >
    <div style=margin-top:-280px;margin-left:-500px>

<img src="images/logo.png" height="160">
</div>
</div>
<div class ="input-box" >
    <div style=margin-top:-220px;margin-left:-360px>
    <img src="images/PetAssure.png" height="35">

</div>
</div>
<div class ="input-box" >
    <div style=margin-top:135px;margin-left:-690px>

<img src="images/g3.png" height="400">
</div>
</div>
<div class ="input-box" >
    <div style=margin-top:195px;margin-left:-390px>

<img src="images/g4.png" height="160">
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
  <style>
  
</style>  


  
<div class="content">
    <form action="signupClient.php" method="post">
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

<select name='districts'>
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
    <textarea name="description" id="" cols="55" rows="4" placeholder="Enter Some details about your self"></textarea>
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
      <!-- <div class="input-box">
      <span class="details">&nbsp;
      Any verification proofs<br></span>
      <form action="">
    <input type="file" id="myfile" name="myfile"><br><br>
      </div>         -->
      



      <div class="input-box">
        <span class="details">User name</span>
        <input type="text" name="uname"placeholder="Enter your username" required>
        </div>
</div>
<div class="user-details"> 
        <div class="input-box">
        <span class="details">Password*</span>
        <input type="password" name="pword" placeholder="Enter your password"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}"required>
        </div>
        <!-- <div class="input-box">
        <span class="details">Confirm password</span>
        <input type="password"name="confirm_password" placeholder="Re-Enter your password" required>
        </div> -->
     
        <input type="submit" class="button" value="Register"name="submit">

           
        </div>
        <p><br>Already have an account? Sign in</p>
    </div>
</div>


</div>

<div class="footerr" style=" z-index: -1; width: 100%;">
    <p> Telephone No: +94 11 233 5632&nbsp;&nbsp;&nbsp;&nbsp;
        Fax: +94 11 233 5632 &nbsp;&nbsp;&nbsp;&nbsp;Email: petAssure@hotmail.com​</p>
</div>
</body>
</html>
