

<?php
require_once('../config/db.php');

session_start();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $districts   = $_POST['districts'];
  $pets        = $_POST['pets'];
  $address    = $_POST['address'];
  $price      = $_POST['price'];
  $description    = $_POST['description'];
  $photo  = $_POST['photo'];
  $email      = $_POST['email'];
  $phone      = $_POST['phone'];
  $name = $_POST['name'];





  
  $sql = "INSERT INTO pet_selling (name,district,pet_variety ,address,price,description,image,email,phone_number) values ('$name','$districts', '$pets', '$address', '$price', '$description', '$photo', '$email', '$phone')";
  if (mysqli_query($con, $sql))
  { 
      header('Location: ../post.php');
      die();
     echo '<script type="text/javascript"> alert("Successfully Posted")</script>';
 } else {
  print(mysqli_query($con, $sql));
     echo '<script type="text/javascript"> alert("Failed.")</script>';
    
         
 }
 
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/addpost.css" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <style>
    body  {
      background-image:  url("../images/bg2.png");
      
    }
    </style>
  <body>
    
    <div class="page">

        <div class="nav" style="width: 100%;">
            <div class="left">
                <img src="../images/logo.png" width="100px" height="100px">
                <p style="margin-left: 20px;">PetAssure</p>
            </div>

            <div class="right">
                <a href="#" class="font">HOME</a>
                <a href="#" class="font">PROFILE</a>
                <a href="#" class="font">SERVICES</a>

                <a href="#" class="font">LOG OUT </a>
            </div>
        </div>
        <div class="page">
            
    
      <form action="#" method="post">
      <h2><u>Register Here for pet sale</u></h2>
      <div>
        <form action="">

        <input type="hidden" name="image1" value="" />

          <div
            style="display: flex; flex-direction: column; margin: 10px 0px"
            class=""
          >
            <label style="font-weight: bold" for="districts">Where are you from</label>
            <select
              style="
                margin-left: 0px;
                margin-top: 10px;
                width: 100px;
                height: 30px;
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
<div>
            <!-- <div style="display: flex; flex-direction: column; margin-top: 10px">
                <label style="font-weight: bold" for="desc">Name</label></div>
              <input
                style="
                  margin-left:-0px;
                  width: 200px;
                  height: 30px;
                "
                type="text"
                name="address"
                id=""
              />
            </div>  -->
  </div>
            <div style="display: flex; flex-direction: column">
              <div style= margin-left:300px;margin-top:-88.5px>
              <label style="font-weight: bold"  for="animal">Pets</label></div>
              <select
                style="
                  margin-left: 300px;
                  margin-top: 10px;
                  width: 100px;
                  height: 30px;
                "
                name="pets"
                id=""
              >
              
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                </select>
                
                <div style="display: flex; flex-direction: column; margin-top: 20px">

                
                <label style="font-weight: bold" for="desc">Name</label></div>
              <input
                style="
                  margin-left:-0px;
                  margin-top: 10px;
                  width: 590px;
                  height: 30px;
                "
                type="text"
                name="name"
                id=""
              />
              <label style="font-weight: bold" for="desc">Address</label></div>
              <input
                style="
                  margin-left:-0px;
                  margin-top: 10px;
                  width: 590px;
                  height: 30px;
                "
                type="text"
                name="address"
                id=""
                required
            </div>

            
            
            
            <div style="display: flex; flex-direction: column; margin-top: 20px">
              <label style="font-weight: bold" for="desc">Price</label></div>
            <input
              style="
                margin-left:-0px;
                margin-top: 10px;
                width: 150px;
                height: 30px;
                border-radius:0%;
              "
              type="text"
              name="price"
              id=""
              required
            />
  </div>
            
              
            </div>
          </div>
          <div style="display: flex; flex-direction: column; margin-top: 20px">
            <label style="font-weight: bold" for="desc">Description</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
          </div>

          <div style="margin-top: 20px">
            <label style="font-weight: bold" for="desc">Add photos</label>
            <div style="display: flex; flex-direction: row">
              <!-- <div
                style="
                  width: 20%;
                  height: 90px;
                  background-color: gray;
                  margin: 10px;
                  border-radius: 10px;
                "
              >
                <i
                  style="font-size: 60px; text-align: center;margin: 20.5px "
                  class="material-icons"
                  >&#xe3b0;</i
                >
              </div>
              <div
                style="
                  width: 20%;
                  height: 90px;
                  background-color: gray;
                  margin: 10px;
                  border-radius: 10px;
                "
              > -->
                <!-- <i
                  style="font-size: 60px; text-align: center;margin: 20.5px; "
                  class="material-icons"
                  >&#xe3b0;</i
                >
              </div> -->
              
              <!-- <div
                style="
                  width: 20%;
                  height: 90px;
                  background-color: gray;
                  margin: 10px;
                  border-radius: 10px;
                " -->
              <!-- > -->
                <!-- <i
                  style="font-size: 60px; text-align: center;margin: 20.5px; "
                  class="material-icons"
                  >&#xe3b0;</i
                >
              </div><div
              style="
                width: 20%;
                height: 90px;
                background-color: gray;
                margin: 10px;
                border-radius: 10px;
              "
            >
              <i
                style="font-size: 60px; text-align: center;margin: 20.5px; "
                class="material-icons"
                >&#xe3b0;</i
              >
            </div><div
            style="
              width: 20%;
              height: 90px;
              background-color: gray;
              margin: 10px;
              border-radius: 10px; -->
            <!-- " -->
           <div>

              <div class="attachment">

                <label class="attachmentLabel">

                    <img id="attachmentImage" src="../images/attach_file_FILL0_wght400_GRAD0_opsz48.png">
                    <input id="inputImage" class="addpicbtn" type="file" name="photo" class="form-control" accept="image/*" multiple="multiple" onchange="uploadImage()">

                </label>

              </div>

              <div id="images">

                <div class="singleImage">

                  <img id="image1" class="singleImageFile" src="../images/0567c66917061177a7df6c35c0028444.jpg" alt="">

                </div>

                <div class="singleImage">

                  <img class="singleImageFile" src="../images/0567c66917061177a7df6c35c0028444.jpg" alt="">

                </div>

                <div class="singleImage">

                  <img class="singleImageFile" src="../images/0567c66917061177a7df6c35c0028444.jpg" alt="">

                </div>

                <div class="singleImage">

                  <img class="singleImageFile" src="../images/0567c66917061177a7df6c35c0028444.jpg" alt="">

                </div>

                <div class="singleImage">

                  <img class="singleImageFile" src="../images/0567c66917061177a7df6c35c0028444.jpg" alt="">

                </div>

              </div>
          
        
            <!-- <i
              style="font-size: 60px; text-align: center;margin: 20.5px; "
              class="material-icons"
              > -->
              
              
              <!-- </i > -->
            </div>
          
              <div class="contactDetails">
                <h2><u> Contact details </u></h2>
                
                  
                  
                    <div style="display: flex; flex-direction: column">
                      <label style="font-weight: bold" for="email">Email</label>
                      <input
                        style="width: 300px; height: 30px"
                        type="text"
                        name="email"
                        id="email"
                      />
                    </div>
                    <div style="display: flex; flex-direction: column">
                      <label style="font-weight: bold" for="phone"
                        >Phone Number</label
                      >
                      <input
                        style="width: 300px; height: 30px"
                        type="text"
                        name="phone"
                        id="phone"
                      />
                    </div>
                    <div style="display: flex; flex-direction: row">
                      <button
                        style="
                          width: 100px;
                          height: 30px;
                          background-color: #acacac;
                          color: rgb(0, 0, 0);
                          border-radius: 5px;
                          margin-top: 60px;
                          margin-left: 250px;
                        "
                        type="submit" name="submit"
                      >
                        Post
                      </button>
                    </div>
          </div>
            </div>
          </div>
          <div>
            <hr />
          </div>
        </form>
        <!-- <div style= margin-left:170px;margin-top:0px>
          <h2><u> Contact details </u></h2>
          
            
            
              <div style="display: flex; flex-direction: column">
                <label style="font-weight: bold" for="email">Email</label>
                <input
                  style="width: 300px; height: 30px"
                  type="text"
                  name=""
                  id="email"
                />
              </div>
              <div style="display: flex; flex-direction: column">
                <label style="font-weight: bold" for="phone"
                  >Phone Number</label
                >
                <input
                  style="width: 300px; height: 30px"
                  type="text"
                  name=""
                  id="phone"
                />
              </div> -->
              <div style="display: flex; flex-direction: row">
                <!-- <button
                  style="
                    width: 100px;
                    height: 30px;
                    background-color: #acacac;
                    color: rgb(0, 0, 0);
                    border-radius: 5px;
                    margin-top: 20px;
                    margin-left: 100px;
                  "
                  type="submit"
                >
                  Post
                </button> -->
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

    <script src="../js/Images.js"></script>
  </body>
</html>
