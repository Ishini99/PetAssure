<html>

<head>


    <title>Forget Password</title>


    <style>
        .navigation-bar {
            width: 100%;
            height: 80px;
            background-color: #737373;
            opacity: 50%;
        }

        .logo {
            display: inline-block;
            vertical-align: top;
            width: 80px;
            height: 80px;
            margin-right: 20px;
            margin-top: 0px;
            margin-left: 30px;

        }


        .navigation-bar>a {
            vertical-align: top;
            line-height: 50px;
            float: right;
            color: white;
            text-align: center;
            padding: 15px 22px;
            text-decoration: none;
            list-style-type: none;
            overflow: hidden;
            background-color: #737373;
            font-size: large;
        }

        .navigation-bar>p {
            display: inline-block;
            vertical-align: top;
            width: 50px;
            height: 50px;
            margin-right: 20px;
            margin-top: 15px;
            margin-left: 30px;
            font-family: 'Lucida Sans';
            font-size: 36px;
            color: azure;
        }

        .navigation-bar>a:hover {
            background-color: #111;
        }

        body,
        html {
            height: 100%;
            margin: 0;

        }

        body {
            background-image: url("Images/bg2.png");

            height: 100%;


            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .center {
            margin: auto;
            width: 60%;
            border: 3px;
            padding: 10px;
        }

        .bodycontent {
            background-color: #737373;
            width: 60%;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            align-items: center;
            border-radius: 10px;
            margin-top: 100px;
            margin-left: 185px;
        }

        .bodycontent h2 {
            color: white;
            font-family: 'Roboto', sans-serif;
        }

        .formlabel {
            color: white;
            font-family: 'Roboto', sans-serif;
        }


        .input_box {
            width: 18rem;
            border-radius: 15px;
            height: 28px;
        }

        .formremember {
            font-size: small;
        }

        .button {
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
            background-color: #f8f0e8;
            border-radius: 25px;
            border: 2px solid#f8f0e8;
            padding: 8px;
            width: 200px;
            height: 35px;
        }

        .createlink {
            color: white;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            font-style: none;
        }

        a {
            text-decoration: none;
        }
    </style>

</head>

<body>

    <nav class="navigation-bar">
        <img class="logo" src="Images/logo.png">
        <p style="margin-left: 20px;">PetAssure</p>


    </nav>
    <div>
        <div class="center">
            <div class="bodycontent">
                <div class="form">
                    <form method="Post" action="">

                        <h2>RESET PASSWORD</h2>

                        <div class="formcontent">
                            <div class="formlabel"> Please enter your email below to reset the password </div>

                        </div>

                        <br>

                        <div class="formcontent">
                            <div class="formlabel"> Email: </div>
                            <div class="formin"><input class="input_box" type="password" name="pword" required></div>
                        </div>

                        <br>


                        <div class="formcontent">
                            <div class="formin">

                                <input class="button" type="submit" name="but_submit" id="but_submit"
                                    value="Reset Password" />

                            </div>
                        </div>

                        <br>

                        <br>


                        <div class="formlabel"><a class="createlink" href="loginnew.php">Back to login</a></div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</body>

</html>