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
    <title>Attributes</title>

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


                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Manage Attributes</h2>
                            <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                <a href="content-list.php?t=attribute_type" style="float:right">
                                    <button type="button" class="btn btn-primary"> <i class="fa fa-th-large"></i> Attribute Category</button>
                                </a>
                            </div>
                        </div>
                    </div>



                    <div class="container">
                        <!-- Left side -->
                        <div class="col-lg-7 fullheight">
                            <!-- Basic information -->
                            <div class="card mb-1 fullheight">

                                <div class="card-body">
                                    
                                    <form id="form" action="admin/ajax/php/sv.php?t_name1=attribute&t_name2=attribute_value&count=2&row=multi&file=true&flimit=0&aiu=n&log=n" method="POST">
                                    
                                    
                                    <div class="x_panel" style="border:0;">
                                        <div class="x_title">
                                            <h2>Create Attribute</h2>
                                            <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                                <button class="btn btn-success" style="float:right" type="submit" id="sv"><i class="fa fa-check"></i> Save</button>
                                                <input type="hidden" name="dt[]"  value="<?php echo time();?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row" style="padding:0em 1.5em;">
                                        <div class="col-lg-6 mb-4">
                                            <div class="mb-3">
                                                <label class="form-label">Attribute Name (Required)</label>
                                                <input type="text" class="form-control" name="titile[]" placeholder="Attribute Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="mb-3">
                                                <label class="form-label">Select Category (Required)</label>
                                                <select class="form-control" name="type[]" required>
                                                    <option value=""> Select Option </option>
                                                    <?php
                                                        $query_type = mysql_query("select * from attribute_type where del='n' order by type ASC");
                                                        while($type = mysql_fetch_array($query_type)){
                                                            print "<option value=\"".$type['id']."\"> ".ucfirst($type['type'])." </option>";
                                                        };

                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div style="margin-top:1em !important;">
                                            <div class="x_title">
                                                <h2>Attribute Values</h2>
                                                <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                                    <button class="btn btn-primary" style="float:right" id="add_row" type="button"><i class="glyphicon glyphicon-plus-sign"></i> Row</button>
                                                </div>
                                            </div>

                                            
                                                
                                                <!--Default Row with Default ID=001 -->
                                                <div class="col-md-12" style="margin-bottom:4px !important;" id="001">
                                                    <div class="col-md-3"><input type="text" name="value[]" placeholder="Attribute Value" class="form-control" id="attribute001" required></div>
                                                    <div class="col-md-2"><input type="text" name="color_code[]" placeholder="Color Code" class="form-control"></div>
                                                    <div class="col-md-3"><input type="text" name="tooltip[]" placeholder="Tool Tips" class="form-control"></div>
                                                    <div class="col-md-3"><input type="file" name="files_1[]" class="form-control">
                                                        
                                                        <!--Default Parameters -->
                                                        <input type="hidden" id="row_count" value="001">
                                                        <input type="hidden" name="user[]" value="<?php echo $_SESSION['myusername'];?>" />
                                                        <input type="hidden" name="mul[]" value="" />
                                                        <!--Default Parameters -->
                                                        
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                </div>
                                                <!--Default Row -->
                                                
                                                
                                                <!--Append New Row -->
                                                <div id="row_append" class="col-md-12"></div>
                                                <!--Append New Row -->
                                                
                                            
                                        </div>

                                    </div>
                                    </form>    
                                </div>

                            </div>
                        </div>


                        <!-- Right side -->
                        <div class="col-lg-5">
                            <div class="card mb-4 fullheight">
                                <div class="card-body">
                                    <div class="x_panel" style="border:0;">
                                        <div class="x_title">
                                            <h2>List of Available Attributes</h2>
                                        </div>
                                    </div>



                                    <ul class="list-group list-group-flush mx-n2">
                                        <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                                            <button class="btn btn-info btn-sm"  style="float:right"> Edit </button>
                                            <button class="btn btn-danger btn-sm"  style="float:right" disabled> Delete </button>
                                            <label class="label label-info">Polo Shirts embroided color</label>
                                            <h2>Colors: </h2>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="color" value="1">  Black</button>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="color" value="2">  Red</button>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="color" value="3">  White</button>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="color" value="3">  Orange</button>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="color" value="3">  Green</button>
                                            
                                            <div class="clearfix"></div>
                                            <small>Linked with 5 Products </small>
                                        </li>
                                        
                                        
                                        
                                        <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                                            <button class="btn btn-info btn-sm"  style="float:right"> Edit </button>
                                            <button class="btn btn-danger btn-sm"  style="float:right" disabled> Delete </button>
                                            <label class="label label-info">Polo Shirts embroided color</label>
                                            <h2>Sizes :</h2>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="size" value="1">  Small</button>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="size" value="2">  Medium</button>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="size" value="3">  Large</button>
                                            
                                            <div class="clearfix"></div>
                                            <small>Linked with 5 Products </small>
                                        </li>
                                        
                                        
                                        
                                        <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                                            <button class="btn btn-info btn-sm"  style="float:right"> Edit </button>
                                            <button class="btn btn-danger btn-sm"  style="float:right" disabled> Delete </button>
                                            <label class="label label-info">Polo Shirts embroided color</label>
                                            <h2>Size: 6-12 Months</h2>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="size" value="1">  6-12 MONTHS</button>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="size" value="2">  12-18 MONTHS</button>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="size" value="3">  18-24 MONTHS</button>
                                            <button class="btn btn-default"> <input class="form-check-input" type="radio" name="size" value="3">  2-3 YEARS</button>
                                            
                                            <div class="clearfix"></div>
                                            <small>Linked with 5 Products </small>
                                        </li>

                                    </ul>
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

    <!-- <script src="admin/ajax/js/sv.js"></script> -->
    <!-- PNotify -->
    <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>
    <script src="admin/ajax/js/s_attribuites.js"></script>
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
