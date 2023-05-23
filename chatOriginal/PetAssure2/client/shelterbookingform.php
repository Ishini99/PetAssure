<?php
require_once('../config/db.php');
session_start();


$sql = "SELECT * FROM serviceprovider";
$result = mysqli_query($con, $sql);
?> 


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/vetposts.css" />
  <link
    href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet"
  />
  <title>Document</title>
</head>
<style>
  body {
    background-image: url("images/bg2.png");
  }
</style>
<body>
    <div class="form-style-6">
        <h1>Booking Form</h1>
    <form method="post" enctype="multipart/form-data">
                                <div class="card-body card-block">
                  <div class="user-details">
                  
                                    
                    <div class="input-box">
                                        <label for="categories" class=" form-control-label">Pet Breed</label>
                                        <input type="text" name="qty" placeholder="Shitzu" class="form-control" required value=>
                                    </div>
                    
                      <div class="input-box">
                                        <label for="categories" class=" form-control-label">Description</label>
                                        <input type="text" name="description" placeholder="Tell us about your friend" class="form-control" required value=>
                      </div>
                      <div class="input-box">
                                        <label for="categories" class=" form-control-label">Size</label>
                      <div class="box">
    
    
    <select name='size'required value=>
      <option value="Large">Large</option>
      <option value="Medium">Medium</option>
      <option value="Small">Small</option>
      <option value="Extra Larage">Extra Larage</option>
      <option value="Other">Other</option>
          </select>
                      </div> </div>
    
                  
                    <!-- <div class="input-box">
                                
                                        <label for="categories" class=" form-control-label">Cage Price</label>
                                        <input type="text" name="price" placeholder="Enter product name" class="form-control" required value=>
                                    </div> -->
                    <div class="input-box">
                                        <!-- <label for="categories" class=" form-control-label">Provide Food</label> -->
                      <div class="box">
    
    
    <!-- <select name='provide_food'required value=>
      <option value="yes">Yes</option>
      <option value="no">No</option>
       -->
          </select>
    
                      </div> </div>
    
    <div class="user-details">
    <h><u> Details regarding food if you provide </u></h><br><br>
    <div class="input-box">
    <label for="categories" class=" form-control-label">Food categories</label>
     <div class="box">
    
    
    <select name='categories'required value=>
      <option value="readymade">Ready Made</option>
      <option value="homefood">Home food</option>
      <option value="both">Both</option>
          </select>
          <div class="input-box">
            <label for="categories" class=" form-control-label">Description</label>
            <input type="text" name="description" placeholder="Describe about your pet's food" class="form-control" required value=>
</div>
                      </div>
      
    
          </div>
          <div class="input-box">
                                
                                        <!-- <label for="categories" class=" form-control-label">Food price(per day)</label> -->
                                        <!-- <input type="text" name="food_price" placeholder="Enter food price" class="form-control" required value= -->
                                    </div>
    
          
                                   <button id="payment-button" name="submit" type="submit" class="form_btn">
                                   <span id="payment-button-amount">Submit</span>
                                   </button>

                                  
                                   <div class="field_error"></div>
                                </div>
                                <button id="payment-button"  class="form_btn">
                                  <a href="shelterbooking.html"><span id="payment-button-amount">cancel</span></a> 
                                   </button>
                            </form>
</body>
</html>