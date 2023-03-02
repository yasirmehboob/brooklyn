<?php
$path  = 'admin/orna/';
include('admin/orna/db.php');
$where='';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Customer</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>
    <!--crop image-->
        <link rel="stylesheet" type="text/css" href="admin/plugin/crop/css/imgareaselect-animated.css" />
        <!--crop image-->
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    
</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <!-- /menu prile quick info -->
                    <?php include('inc/side-nav-header.inc');?>
                    <!-- /menu prile quick info -->
                    <br><br>
                    <!-- sidebar menu -->
                    <?php include('inc/side-nav.inc');?>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <?php include('inc/side-nav-footer.inc');?>
                    <!-- /menu footer buttons -->
                    
                </div>
            </div>

            <!-- top navigation -->
            <?php include('inc/top-nav.inc');?>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Enroll Customer</h2>
                                <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                        <a href="customer-list.php" style="float:right"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> View Customer List</button></a>                                            
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form id="form" class="form-horizontal form-label-left" action="admin/ajax/php/custumer_sv_img.php?t_name=users&count=1&row=single&file=true&flimit=1&aiu=n&log=n" method="POST" autocomplete="off">
                                    <div class="col-md-12" style="margin-bottom:0.5em;">

                                        <div class="col-md-6">
                                            <label class="control-label">First Name</label>
                                            <input type="text" required placeholder="First Name" class="form-control" name="f_name">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" required placeholder="Last Name" class="form-control" name="l_name">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label class="control-label">Gender</label>
                                            <select required class="form-control" name="gender">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label class="control-label">Date of Birth</label>
                                            <input type="date" required placeholder="" class="form-control" name="dob">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label class="control-label">CNIC</label>
                                            <input type="text" required placeholder="NIC Number" class="form-control" name="cnic">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="control-label">Email</label>
                                            <input type="email" required placeholder="Email Address" class="form-control" name="email">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="control-label">Address</label>
                                            <input type="text" required placeholder="Full Residential Address" class="form-control" name="address">
                                        </div>
                                        
                                        
                                        <div class="col-md-3">
                                            <label class="control-label">Mobile Number</label>
                                            <input type="text" required placeholder="Mobile Number" class="form-control" name="mobile_number">
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-3">
                                            <label class="control-label">Height</label>
                                            <input type="number" step="0.01" required placeholder="Height" class="form-control" name="height">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label class="control-label">Weight</label>
                                            <input type="number" step="0.01" required placeholder="Weight" class="form-control" name="weight">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label class="control-label">Profile Image</label>
                                            <input type="file" name="files_1" id="uploadImage" accept="image/*" required class="form-control">
                                            <!-- hidden inputs -->
                                            <input type="hidden" id="x" name="x" />
                                            <input type="hidden" id="y" name="y" />
                                            <input type="hidden" id="w" name="w" />
                                            <input type="hidden" id="h" name="h" />
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label class="control-label">Gym Location</label>
                                            <select required class="form-control" name="branch">
                                                <option>Islamabad</option>
                                                <option>Karachi</option>
                                            </select>
                                        </div>
                                        
										<div class="clear-fix"></div>
										<div class="row"></div><hr>
										<div class="col-md-3">
                                            <label class="control-label">Username : </label>
                                            <input  type="text" required placeholder="Login Username of customer" class="form-control" name="username" autocomplete="off">
                                        </div>
										
										<div class="col-md-3">
                                            <label class="control-label">Password: </label>
                                            <input  type="password" required placeholder="Login Password" class="form-control" name="password" autocomplete="off">
                                        </div>
                                        <!-- image preview area-->
                                        <div class="col-md-12">
                                            <center>
                                                <img id="uploadPreview" style="display:none;margin:1em auto;border:1px solid grey; box-shadow:1px 1px 10px silver;max-width:100%;height:auto;" />
                                            </center>
                                        </div>


                                    <div class="form-group">
                                        <div class="col-md-12" style="margin-top:1em;">
                                            <input type="hidden" value="../../../images/users/" name="dir"/>
                                            <input type="hidden" name="del" value="N">
                                            <input type="hidden" name="dt" value="<?php echo time();?>">
                                            <input type="hidden" name="user" value="<?php echo $_SESSION['myusername'];?>">
                                            
                                            <button type="clear" class="btn btn-primary back">Cancel</button>
                                            <button type="submit" id="sv" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer content -->
                <?php include('inc/footer.inc');?>
                <!-- /footer content -->
            </div>
            <!-- /page content -->

        </div>

    </div>
    
    

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>
        
    <script type="text/javascript" src="admin/plugin/crop/js/jquery_brower.js"></script>
    <script type="text/javascript" src="admin/plugin/crop/js/jquery.imgareaselect.pack.js"></script>
    <script type="text/javascript" src="admin/plugin/crop/js/script.js"></script>    
        
    
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
    
    <script src="js/custom.js"></script>

    <!-- pace -->
    <script src="js/pace/pace.min.js"></script>
    
    <!-- skycons -->
    <script src="js/skycons/skycons.min.js"></script>
    
    <script src="admin/ajax/js/sv_img.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>
        
</body>

</html>