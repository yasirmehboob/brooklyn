<?php
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

    <title>Configure</title>

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
    <style type="text/css">
        #config_form .col-md-12{
            margin-bottom: 1em;
        }
        .cont{
            background-color: #fff;
            border: 1px solid #e4e3e3;
            margin-top:4em;
            padding: 1em 2em;
        }
    </style>
</head>

<body style="background:#F7F7F7;">
    <div class="row" style="margin:0 1em;">
        <div class="col-md-8 col-md-offset-2 cont">
                <h1><i class="fa fa-cogs"></i> You are just a step away!</h1>
                <p>Below you should enter you database connection details. if you are not sure about these, contact your host.</p>
                <br><hr><br>
                    <!-- form -->
                     <form id="config_form" class="form-horizontal" action="#" method="POST">
                            
                         
                         
                         <div class="col-md-12">
                                <div class="col-md-2">
                                    <label class="control-label">Database Name</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" required placeholder="Database Name" class="form-control" name="db_name">
                                </div>
                                <div class="col-md-5">
                                    <p>The Name of the Database you want to run CMS in.
                                </div>
                            </div>
                         
                         
                         
                         
                         <div class="col-md-12">
                                <div class="col-md-2">
                                    <label class="control-label">User Name</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" required placeholder="Database User Name" class="form-control" name="db_username">
                                </div>
                                <div class="col-md-5">
                                    <p>Your MySql User Name.
                                </div>
                            </div>
                         
                         
                         
                         
                         <div class="col-md-12">
                                <div class="col-md-2">
                                    <label class="control-label">Password</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="password" required placeholder="Database Password" class="form-control" name="db_password">
                                </div>
                                <div class="col-md-5">
                                    <p>Your MySql Password.
                                </div>
                            </div>
                         
                         
                         
                         
                         

                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <label class="control-label">Database Host</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" required placeholder="Database Host" class="form-control" value="localhost" name="db_host">
                                </div>
                                <div class="col-md-5">
                                    <p>You should be able to get this information from your web host if localhost does not work.
                                </div>
                            </div>
                         
                         
                         
                         
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top:1em;">
                                <button type="submit" id="sv" class="btn btn-dark">Proceed <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
        </div>
    </div>
<script src="admin/ajax/js/configuration.js"></script>
</body>

</html>