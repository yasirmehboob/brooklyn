<?php 
$path = 'admin/orna/';
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
    <link rel="icon" type="image/png" href="images/favico.png" />
    <title>Policy</title>
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
    
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
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
                                <h2>Edit Policy's Page Content</h2>
                                <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                        <a href="policy.php" style="float:right"><button type="button" class="btn btn-danger"><i class="fa fa-ban"></i> Cancle</button></a> 
                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form id="form" class="form-horizontal form-label-left" action="admin/ajax/php/up.php?t_name1=policy&count=1&row=single&file=false&flimit=0&aiu=n&log=n" method="POST">
                                    
                                    <textarea id="policy" name="policy" class="element textarea large">
                                        <?php 
                                            $sql ="select * from policy";
                                            $policy = mysql_fetch_array(mysql_query($sql));

                                            print html_entity_decode($policy['policy']);
                                        ?>
                                    </textarea>
                                    
                                     <button style="margin-top:1em;" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
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
    <script src="admin/ajax/js/policy.js"></script>
    
    <!-- PNotify -->
    <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>
    
    <script>
        CKEDITOR.replace( 'policy',{height:350} );
	</script>
</body>

</html>