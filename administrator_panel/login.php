<?php
$path  = 'admin/orna/';
if (file_exists($path."duf") AND file_exists($path."dpf") AND file_exists($path."dnf") AND file_exists($path."dhf")) {
    
    //user
    $user_enc = fread(fopen($path."duf", "r"), filesize($path."duf"));
    $MySQL_username = $user_enc;
    //pass
    $pass_enc = fread(fopen($path."dpf", "r"), filesize($path."dpf"));
    $MySQL_password = $pass_enc;
    //DB Name
    $dbn_enc = fread(fopen($path."dnf", "r"), filesize($path."dnf"));
    $MySQL_database = $dbn_enc;    
    //DB Host
    $dhf_enc = fread(fopen($path."dhf", "r"), filesize($path."dhf"));
    $MySQL_host = $dhf_enc;        
}else{
    echo "Files not found";
    return false;
}



if (!($connection = @mysql_connect($MySQL_host, $MySQL_username, $MySQL_password))){
        header("location:configure.php");
        exit();
    }else{
        if (!@mysql_select_db($MySQL_database, $connection)){
            header("location:configure.php");
            exit();
        }
}

session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favico.png" />
    <title>BigShop Login</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        * {
            color: #616161;
            text-shadow: none;
            text-decoration: none;
        }

        a {
            color: #767676;
        }

        .login_content h1:before {

            background: -webkit-linear-gradient(left, rgb(242 241 255) 0%, rgb(111 103 217) 100%);
            left: 0;
        }

        .login_content h1:after {
            background: -webkit-linear-gradient(right, rgb(242 241 255) 0%, rgb(111 103 217) 100%);
            right: 0;
        }



        /*color, position, internal time*/
        #ocean {
            z-index: 100;
        }

        .wave {
            position: absolute;
            bottom: 0;
            background: #6f67d9;
            opacity: 0.5;
            display: inline-block;
            height: 10%;
            width: 10px;
            position: absolute;
            z-index: 5 !important;
            animation-name: dostuff;
            animation-duration: 2.74159s;
            animation-iteration-count: infinite;
            transition-timing-function: ease-in-out;
        }

        .wave_middle {
            position: absolute;
            bottom: 0;
            background: #6e66d8;
            opacity: 0.3;
            display: inline-block;
            height: 4%;
            width: 10px;
            position: absolute;
            z-index: 5 !important;
            animation-name: dostuff_mid;
            animation-duration: 3.42s;
            animation-iteration-count: infinite;
            transition-timing-function: ease-in-out;
        }

        .wave_bottom {
            position: absolute;
            bottom: 0;
            background: #8166d8;
            opacity: 0.8;
            display: inline-block;
            height: 17%;
            width: 10px;
            position: absolute;
            z-index: 5 !important;
            animation-name: dostuff_bot;
            animation-duration: 2.54s;
            animation-iteration-count: infinite;
            transition-timing-function: ease-in-out;
        }

        .wave_light {
            position: absolute;
            bottom: 20%;
            background: #c8c4fc;
            opacity: 0.5;
            display: inline-block;
            height: 16%;
            width: 10px;
            position: absolute;
            z-index: 5 !important;
            animation-name: dostuff_light;
            animation-duration: 2s;
            animation-iteration-count: infinite;
            transition-timing-function: ease-in-out;
        }

        /* amplitude animation*/
        @keyframes dostuff {
            0% {
                height: 35%;
            }

            50% {
                height: 48%;
            }

            100% {
                height: 35%;
            }
        }

        @keyframes dostuff_mid {
            0% {
                height: 27%;
            }

            50% {
                height: 36%;
            }

            100% {
                height: 27%;
            }
        }

        @keyframes dostuff_bot {
            0% {
                height: 17%;
            }

            50% {
                height: 23%;
            }

            100% {
                height: 17%;
            }
        }

        @keyframes dostuff_light {
            0% {
                height: 1%;
                bottom: 31%;
            }

            50% {
                height: 4%;
                bottom: 35%;
            }

            100% {
                height: 1%;
                bottom: 31%;
            }
        }

    </style>
</head>

<body style="background:#ffffff;">
    <div id="ocean">

        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">

            <div id="login" class="animate form">
                <section class="login_content">
                    <img src="images/bigshop.png" alt="BigShop" width="90%" />
                    <form action="" method="post" id="login_form">
                        <h1><i class="fa fa-sign-in" aria-hidden="true"></i> Login</h1>
                        <div>
                            <input type="text" class="form-control" name="user" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="pass" placeholder="Password" required="" />
                            <p class="response" style="color:red"></p>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary submit login" href="#">Log in</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">New to Control Panel?
                                <a href="#toregister" class="to_register"> Create Account </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <p>©2017 All Rights Reserved.
                                    <br> Privacy and Terms
                                </p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            <div id="register" class="animate form">
                <section class="login_content">
                    <img src="images/bigshop.png" alt="BigShop" width="90%" />
                    <form>
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-primary submit" href="login.php">Submit</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">Already a member ?
                                <a href="#tologin" class="to_register"> Log in </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <p>©2015 All Rights Reserved.
                                    <br> Privacy and Terms
                                </p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>

    </div>
    <script src="admin/ajax/js/login_check.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // make some waves.
            var ocean = document.getElementById("ocean"),
                waveWidth = 5,
                waveCount = Math.floor(window.innerWidth / waveWidth),
                docFrag = document.createDocumentFragment();
            for (var i = 0; i < waveCount; i++) {
                var wave = document.createElement("div");
                wave.className += " wave";
                docFrag.appendChild(wave);
                wave.style.left = i * waveWidth + "px";
                wave.style.webkitAnimationDelay = (i / 100) + "s";

                var wave_middle = document.createElement("div");
                wave_middle.className += " wave_middle";
                docFrag.appendChild(wave_middle);
                wave_middle.style.left = i * waveWidth + "px";
                wave_middle.style.webkitAnimationDelay = (i / 91) + "s";

                var wave_bottom = document.createElement("div");
                wave_bottom.className += " wave_bottom";
                docFrag.appendChild(wave_bottom);
                wave_bottom.style.left = i * waveWidth + "px";
                wave_bottom.style.webkitAnimationDelay = (i / 97) + "s";

                var wave_light = document.createElement("div");
                wave_light.className += " wave_light";
                docFrag.appendChild(wave_light);
                wave_light.style.left = i * waveWidth + "px";
                wave_light.style.webkitAnimationDelay = 0 + "s";

            }
            ocean.appendChild(docFrag);
        });

    </script>
</body>

</html>
