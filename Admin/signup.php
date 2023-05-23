<?php

include_once("connect.php");
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
    
   



    $sql= "INSERT INTO `client`(`fname`, `nic`, `uname`, `email`, `mobile`, `address`, `pword`, `role`) VALUES ('$fname','$nic','$username','$email','$mobileno','$address','$pword','$stype')";

    if (mysqli_query($conn, $sql))
     {
        echo '<script type="text/javascript"> alert("Congragulations. your account was created.")</script>';
        header("Location:loginnew.php");
        exit();
     }
    else
     {
        echo '<script type="text/javascript"> alert(" your account was  not created.")</script>';
            
    }  
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles_signUp.css" />
    <title>Sign Up</title>


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

</head>

<body style="background-color: #F6F4F1 ;overflow-x:hidden ;overflow-y: auto;">
    <div class="page">

        <div class="left">
            <img src="Images/logo.png" width="86px" height="80px" />
            <p style="margin-left: 20px">PetAssure</p>

            <div class="right">

                <p style="margin-left: 300px; font-size: 40px;">Sign up as a service provider</p>
            </div>
        </div>
    </div>


    <div>
        <div class="left_body_signup">
          
            <img src="Images/fe436bc67fd6315ac0deebf8b78194ab.jpg" width="80%" height="250px">
            
            <p class="tst">Verification Proofs <br>
                    (The proofs and job experience you have are included in a PDF document that you should upload.)</p>
           
                <input class="form_file" type="file" name="file" class="form-control">
                

<!-- <div>
            
                    <p><b>**Password must contain:</b></p>
                    <p style="font-size: 12px;" >A <b>lowercase</b> letter ,a <b>capital (uppercase)</b> letter ,a  <b>number</b> and minimum <b>8 characters</b></p>
                </div> -->
          
            <form action="signup.php" method="post">
        </div>
        <div class="right_body_signup">


            <div class="form_left">
                <p>Fullname</p>
                <p>NIC</p>
                <p>Mobile Number</p>
                <p>Email Address</p>
                <p>Address</p>
                <p>District</p>
                <p>Role</p>
                <p>UserName</p>
                <p>Password*</p><h4>(Password must contain (@/#/$),(A-Z),(a-z),(1-9))</h4
                >
                <!-- <p>Confirm Password</p> -->
                <!-- <p>Service type you providing</p> -->
                <!-- <p>Description</p> -->
               <br><br>
                <button class="form_btn">Submit</button>
            </div>
            <div class="form_right">
                <form name="signUpForm" action="signup.php" method="post">
                    <input type="text" name="fname" placeholder="Enter Name" required />
                    <input type="text" name="nic" id="nic" placeholder="Enter NIC"  pattern = "[0-9]{9}[Vv0-9]{1,3}"required/>

                    
                    <input type="text" name="mobile" placeholder="Enter Mobile No" pattern="[0-9]{10}" required />
                    <input type="email" name="email" placeholder="abc@gmail.com"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
                    <input type=" text" name="address" placeholder="Enter Address"required  />
                    <input type="text" name="district" placeholder="Enter District" required />
                    <select name="stype" id="role">
                        <option value="client">Client</option>
                        <option value="serviceprovider">Service Provider</option>                       
                    </select>
                    <input type="text" name="uname" placeholder="Enter UserName" required />
                    <input type="password" name="pword" placeholder="Enter Password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}" required />
                    <!-- <input type="password" name="pword2" placeholder="Re-enter Password "required  /> -->
                    <!-- <select name="stype" id="">
                        <option value="vet">Veterinarian</option>
                        <option value="groom">Grooming Service Supplier</option>
                        <option value="petSitter">Pet Sitter</option>
                        <option value="petShelter">Pet Shelter Service Supplier</option>
                    </select> -->
                    <!-- <textarea id="details" name="details" rows="5" cols="30">
                    
                    </textarea> -->


<br /><br />



                   

                </form>
            </div>
        </div>
        <!-- <div style="height: 570px"></div> -->
    </div>


    <!--footer -->
    <!-- <div class="footerr">
        <div class="footer" style="width: 100%">
        <p>
            Telephone No: +94 11 233 5632
            Fax: +94 11 233 5632
            Email: petAssure@hotmail.com
        </p>
        </div>
    </div> -->
</div>
   
</body>

  </html>