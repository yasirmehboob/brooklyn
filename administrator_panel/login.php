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

    <title>Metafitnosis Login</title>

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
        *{
            color:black;
            text-shadow:none;
            text-decoration: none;
        }
        a{
            color: white;
        }
        
        .login_content h1:before{
    background: rgb(126, 126, 126);
    background: -moz-linear-gradient(right, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    background: -webkit-linear-gradient(right, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    background: -o-linear-gradient(right, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    background: -ms-linear-gradient(right, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    background: linear-gradient(right, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    left: 0;
}
        .login_content h1:after {
    background: rgb(126, 126, 126);
    background: -moz-linear-gradient(left, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    background: -webkit-linear-gradient(left, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    background: -o-linear-gradient(left, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    background: -ms-linear-gradient(left, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    background: linear-gradient(left, rgb(255, 255, 255) 0%, rgb(225, 87, 72) 100%);
    right: 0;
}
    </style>
</head>

<body style="background:#745d9a;">

    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <img src="images/logo-w.png" alt="Metafitnosis" width="90%"/>
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
                            <button type="submit" class="btn btn-dark submit login" href="#">Log in</button>
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
                                    <br> Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            <div id="register" class="animate form">
                <section class="login_content">
                    <img src="images/logo-w.png" alt="Metafitnosis" width="90%"/>
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
                            <a class="btn btn-dark submit" href="login.php">Submit</a>
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
                                    <br> Privacy and Terms</p>
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
</body>

</html>