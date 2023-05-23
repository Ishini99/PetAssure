<html>

<head>
    <link rel="stylesheet" href="css/admindash.css">

    <title>Admin Dashboard</title>
   

    <style>
        body {
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        </style>
       
</head>
<body>
    
                <!-- <div class="form">
                  <i class="fa fa-search"></i>
                  <input type="text" class="form-control form-input" placeholder="Search anything...">
                  <span class="left-pan"><i class="fa fa-microphone"></i></span>
                </div> -->
                
                
    
<div class="flex">
<div class="brdr">
<?php include "vetDashboard.php"; ?>
</div>
    <div class="brdr">
        <div class="card">

                    <div class="upper">
                    <img src="images/cover.jpg" class="img-fluid">
                    </div>

                <div class="user text-center">
                    <div class="profile">
                     <img src="images/propic.png" class="rounded-circle" width="100">        
                    </div>
                 </div>

                <div class="mt-5 text-center">

                    <div class="title">
                    <br>
                    <h4 class="mb-0">Benjamin Tims</h4>
                    <span class="text-muted align-items-center d-block mb-2">Los Angles</span>
                    <br>
                    <button class="btn btn-primary btn-sm follow">Follow</button>
                    </div>

                    <div class="stats">
                    <h6 class="mb-0">Followers</h6>
                    <span>8,797</span>
                    </div>

                    <div class="stats">
                    <h6 class="mb-0">Projects</h6>
                    <span>142</span>
                    </div>

                    <div class="stats">
                    <h6 class="mb-0">Ranks</h6>
                    <span>129</span>
                    </div> 
     </div>   
    </div>
</div>

<div class="brdr">
<?php include "clienttable.php" ?>
    </div>
<!-- <div class="brdr">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                <h2 class="h3 mb-4 page-title">Notifications</h2>
                <div class="my-4">
                    <hr class="my-4" />
                    <strong class="mb-0">Security</strong>
                   <p> Hello there</p>
                    <div class="list-group mb-5 shadow">
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col">
                                    <strong class="mb-0">New User Approval</strong>
                                    <p class="text-muted mb-0">New clients have been added to your system</p>
                                </div>
                                <div class="col-auto">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="alert1" checked="" />
                                        <span class="custom-control-label"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col">
                                    <strong class="mb-0">Unauthorized Payment</strong>
                                    <p class="text-muted mb-0">Please approve the pending payment requests</p>
                                </div>
                                <div class="col-auto">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="alert2" />
                                        <span class="custom-control-label"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <strong class="mb-0">System</strong>
                    <p>Please enable system alert you will get.</p>
                    <div class="list-group mb-5 shadow">
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col">
                                    <strong class="mb-0">Notify me about new features and updates</strong>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                                <div class="col-auto">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="alert3" checked="" />
                                        <span class="custom-control-label"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col">
                                    <strong class="mb-0">Notify me by email for latest news</strong>
                                    <p class="text-muted mb-0">Nulla et tincidunt sapien. Sed eleifend volutpat elementum.</p>
                                </div>
                                <div class="col-auto">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="alert4" checked="" />
                                        <span class="custom-control-label"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col">
                                    <strong class="mb-0">Notify me about tips on using account</strong>
                                    <p class="text-muted mb-0">Donec in quam sed urna bibendum tincidunt quis mollis mauris.</p>
                                </div>
                                <div class="col-auto">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="alert5" />
                                        <span class="custom-control-label"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>

</div> -->
</div>
</body>
</html>