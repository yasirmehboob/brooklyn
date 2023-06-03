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
    <link rel="icon" type="image/png" href="images/favico.png" />
    <title>Arrange Products</title>

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
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <style type="text/css">
        .mb-4 {
            margin-bottom: 5px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgb(0 0 0 / 6%);
            margin-bottom: 1em;
            border-radius: 5px;

        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }

        .x_title {
            border-bottom: 0px !important;
        }

        .tree,
        .tree ul {
            margin: 0;
            padding: 0;
            list-style: none
        }

        .tree ul {
            margin-left: 1em;
            position: relative
        }

        .tree ul ul {
            margin-left: .5em
        }

        .tree ul:before {
            content: "";
            display: block;
            width: 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            border-left: 1px solid
        }

        .tree li {
            margin: 0;
            padding: 0 3em;
            line-height: 2em;
            color: #a3a3a3;
            font-weight: 700;
            position: relative
        }

        .tree ul li:before {
            content: "";
            display: block;
            width: 35px;
            height: 0;
            border-top: 1px solid;
            margin-top: -1px;
            position: absolute;
            top: 1em;
            left: 0
        }

        .tree ul li:last-child:before {
            background: #fff;
            height: auto;
            top: 1em;
            bottom: 0
        }

        .indicator {
            margin-right: 5px;
            color: mediumpurple;
        }

        .tree li a {
            text-decoration: none;
            color: #a3a3a3;
        }

        .tree li button,
        .tree li button:active,
        .tree li button:focus {
            text-decoration: none;
            color: #a3a3a3;
            border: none;
            background: transparent;
            margin: 0px 0px 0px 0px;
            padding: 0px 0px 0px 0px;
            outline: 0;
        }

    
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }

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
                <div class="row">

                    <!--
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Organize Products</h2>
                            <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                <a href="privilege-list.php" style="float:right">
                                    <button type="button" class="btn btn-primary">Edit</button></a>
                            </div>
                        </div>

                    </div>
                    -->

                    <div class="container">
                        <!-- Left side -->
                        <div class="col-lg-6">
                            <!-- Basic information -->

                            <div class="card mb-1 fullheight">
                                <div class="card-body">
                                    <div class="x_panel" style="border:0;">
                                        <div class="x_title">
                                            <h2>Structural Map</h2>
                                            <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                                <button class="btn btn-secondary" id="collapes_all" style="float:right"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                                <button class="btn btn-primary" id="expand_all" style="float:right"><i class="glyphicon glyphicon-plus-sign"></i></button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <!-- Tree -->

                                        <ul id="product_category">
                                            <li><a href="#">TECH</a>

                                                <ul>
                                                    <li>Company Maintenance</li>
                                                    <li>Employees
                                                        <ul>
                                                            <li>Reports
                                                                <ul>
                                                                    <li>Report1</li>
                                                                    <li>Report2</li>
                                                                    <li>Report3</li>
                                                                </ul>
                                                            </li>
                                                            <li>Employee Maint.</li>
                                                        </ul>
                                                    </li>
                                                    <li>Human Resources
                                                                <ul>
                                                                    <li>Report1</li>
                                                                    <li>Report2</li>
                                                                    <li>Report3
                                                                        <ul>
                                                                            <li>Report1
                                                                                <ul>
                                                                                    <li>Report1</li>
                                                                                    <li>Report2</li>
                                                                                    <li>Report3</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li>Report2</li>
                                                                            <li>Report3</li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>XRP
                                                <ul>
                                                    <li>Company Maintenance</li>
                                                    <li>Employees
                                                        <ul>
                                                            <li>Reports
                                                                <ul>
                                                                    <li>Report1</li>
                                                                    <li>Report2
                                                                        <label class="label label-info"><i class="fa fa-pencil"></i></label>
                                                                        <label class="label label-danger"><i class="fa fa-times"></i> </label>
                                                                    </li>
                                                                    <li>Report3</li>
                                                                </ul>
                                                            </li>
                                                            <li>Employee Maint.</li>
                                                        </ul>
                                                    </li>
                                                    <li>Human Resources</li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <!-- Tree -->
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- Right side -->
                        <div class="col-lg-6">

                            <div class="card mb-4 fullheight">
                                <div class="card-body">
                                    
                                    
                                    <div class="x_panel" style="border:0;">
                                        <div class="x_title">
                                            <h2>Add Category</h2>
                                            <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                                <button class="btn btn-success" style="float:right"><i class="fa fa-check"></i> Save</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <form id="form" class="form-horizontal form-label-left" action="" method="POST">
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 cap" for="">Type <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control"name="title">
                                                    <option value="parent">Parent</option>
                                                    <option value="child">Child</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 cap" for="">Category Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control" type="text" value="" placeholder="Category Title" name="title" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 cap" for="">Parent Mapping<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control"name="title">
                                                    <option value="">Choose Value</option>
                                                    <option value="parent">Parent</option>
                                                    <option value="child">Child</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 cap" for="">Sort
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control" type="number" min="0" value="" placeholder="Sorting Value" name="sort" />
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 cap" for="">Select Icon
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control"name="title">
                                                    <option value="">Choose Value</option>
                                                    <option value="parent">Parent</option>
                                                    <option value="child">Child</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 cap" for="">Status
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="checkbox" checked data-toggle="toggle" data-style="android" data-on="Enabled" data-off="Disabled">
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
    <script src="js/custom.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>

    <!-- worldmap -->
    <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
    <script type="text/javascript" src="js/maps/gdp-data.js"></script>
    <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
    <!-- pace -->
    <script src="js/pace/pace.min.js"></script>

    <!-- skycons -->
    <script src="js/skycons/skycons.min.js"></script>

    <script src="admin/ajax/js/sv.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>

    <script>
        $.fn.extend({
            treed: function(o) {

                var openedClass = 'glyphicon-minus-sign';
                var closedClass = 'glyphicon-plus-sign';

                if (typeof o != 'undefined') {
                    if (typeof o.openedClass != 'undefined') {
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined') {
                        closedClass = o.closedClass;
                    }
                };

                //initialize each of the top levels
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function() {
                    var branch = $(this); //li with children ul
                    branch.prepend("<i class='indicator glyphicon " + openedClass + "'></i>");
                    branch.addClass('branch');
                    branch.on('click', function(e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    })
                    //branch.children().children().toggle();
                    branch.children().children().show();
                });


                //fire event from the dynamically added icon
                tree.find('.branch .indicator').each(function() {
                    $(this).on('click', function() {
                        $(this).closest('li').click();
                    });
                });
                //fire event to open branch if the li contains an anchor instead of text
                tree.find('.branch>a').each(function() {
                    $(this).on('click', function(e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
                //fire event to open branch if the li contains a button instead of text
                tree.find('.branch>button').each(function() {
                    $(this).on('click', function(e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
            }
        });
        //Initialization of treeviews

        //if expand all button clicked
        $('#collapes_all').click(function() {

            var openedClass = 'glyphicon-minus-sign';
            var closedClass = 'glyphicon-plus-sign';
            //initialize each of the top levels
            var tree = $('#product_category');
            tree.addClass("tree");
            tree.find('li').has("ul").each(function() {
                var branch = $(this); //li with children ul
                $(".indicator").addClass(closedClass);
                $(".indicator").removeClass(openedClass);
                branch.children().children().hide();
            });
        });
        //if expand all button clicked


        //if expand all button clicked
        $('#expand_all').click(function() {

            var openedClass = 'glyphicon-minus-sign';
            var closedClass = 'glyphicon-plus-sign';
            //initialize each of the top levels
            var tree = $('#product_category');
            tree.addClass("tree");
            tree.find('li').has("ul").each(function() {
                var branch = $(this); //li with children ul
                $(".indicator").removeClass(closedClass);
                $(".indicator").addClass(openedClass);
                branch.children().children().show();
            });
        });
        //if expand all button clicked



        $('#product_category').treed();

    </script>

</body>

</html>
