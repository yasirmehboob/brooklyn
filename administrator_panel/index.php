<?php 
$path  = 'admin/orna/';
include('admin/orna/db.php');
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
    <title>Welcome To <?php echo $company;?></title>
    <!-- Bootstrap core CSS -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bigshop.css">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="admin/plugin/rickshaw/css/rickshaw.min.css" rel="stylesheet">
    <link href="admin/plugin/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="admin/plugin/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
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
.green a, .green a:hover {
color:#1ABB9C !important;
text-decoration: none;
}
a{text-decoration: none !important;}    
</style>
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
                    <!--COntent area-->
                        <?php include('inc/dashboard_plugins.inc');?>
                    <!--COntent area-->
                
                    <div class="clearfix"></div>
                
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
    <!-- bootstrap progress js -->
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="admin/plugin/d3/js/d3.js"></script>
    <script src="admin/plugin/rickshaw/js/rickshaw.min.js"></script>
    <script src="admin/plugin/chart.js/js/Chart.js"></script>
    
    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</body>
</html>