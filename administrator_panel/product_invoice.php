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
    <link href="css/bigshop.css" rel="stylesheet" type="text/css" />
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



                    <div class="col-md-8 col-md-offset-2">

                        <div class="card card-invoice">
                            <div class="card-body">
                                <div class="invoice-header">
                                    <h1 class="invoice-title">Invoice</h1>
                                    <div class="billed-from">
                                        <h6>ThemePixels, Inc.</h6>
                                        <p>201 Something St., Something Town, YT 242, Country 6546<br>
                                            Tel No: 324 445-4544<br>
                                            Email: youremail@companyname.com</p>
                                    </div><!-- billed-from -->
                                </div><!-- invoice-header -->

                                <div class="row mg-t-20">
                                    <div class="col-md">
                                        <label class="section-label-sm tx-gray-500">Billed To</label>
                                        <div class="billed-to">
                                            <h6 class="tx-gray-800">Juan Dela Cruz</h6>
                                            <p>4033 Patterson Road, Staten Island, NY 10301 <br>
                                                Tel No: 324 445-4544<br>
                                                Email: youremail@companyname.com</p>
                                        </div>
                                    </div><!-- col -->
                                    <div class="col-md">
                                        <label class="section-label-sm tx-gray-500">Invoice Information</label>
                                        <p class="invoice-info-row">
                                            <span>Invoice No</span>
                                            <span>GHT-673-00</span>
                                        </p>
                                        <p class="invoice-info-row">
                                            <span>Project ID</span>
                                            <span>32334300</span>
                                        </p>
                                        <p class="invoice-info-row">
                                            <span>Issue Date:</span>
                                            <span>November 21, 2017</span>
                                        </p>
                                        <p class="invoice-info-row">
                                            <span>Due Date:</span>
                                            <span>November 30, 2017</span>
                                        </p>
                                    </div><!-- col -->
                                </div><!-- row -->

                                <div class="table-responsive mg-t-40">
                                    <table class="table table-invoice">
                                        <thead>
                                            <tr>
                                                <th class="wd-20p">Type</th>
                                                <th class="wd-40p">Description</th>
                                                <th class="tx-center">QNTY</th>
                                                <th class="tx-right">Unit Price</th>
                                                <th class="tx-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Website Design</td>
                                                <td class="tx-12">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam...</td>
                                                <td class="tx-center">2</td>
                                                <td class="tx-right">$150.00</td>
                                                <td class="tx-right">$300.00</td>
                                            </tr>
                                            <tr>
                                                <td>Firefox Plugin</td>
                                                <td class="tx-12">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque...</td>
                                                <td class="tx-center">1</td>
                                                <td class="tx-right">$1,200.00</td>
                                                <td class="tx-right">$1,200.00</td>
                                            </tr>
                                            <tr>
                                                <td>iPhone App</td>
                                                <td class="tx-12">Et harum quidem rerum facilis est et expedita distinctio</td>
                                                <td class="tx-center">2</td>
                                                <td class="tx-right">$850.00</td>
                                                <td class="tx-right">$1,700.00</td>
                                            </tr>
                                            <tr>
                                                <td>Android App</td>
                                                <td class="tx-12">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut</td>
                                                <td class="tx-center">3</td>
                                                <td class="tx-right">$850.00</td>
                                                <td class="tx-right">$2,550.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" rowspan="4" class="valign-middle">
                                                    <div class="invoice-notes">
                                                        <label class="section-label-sm tx-gray-500">Notes</label>
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                                                    </div><!-- invoice-notes -->
                                                </td>
                                                <td class="tx-right">Sub-Total</td>
                                                <td colspan="2" class="tx-right">$5,750.00</td>
                                            </tr>
                                            <tr>
                                                <td class="tx-right">Tax (5%)</td>
                                                <td colspan="2" class="tx-right">$287.50</td>
                                            </tr>
                                            <tr>
                                                <td class="tx-right">Discount</td>
                                                <td colspan="2" class="tx-right">-$50.00</td>
                                            </tr>
                                            <tr>
                                                <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
                                                <td colspan="2" class="tx-right">
                                                    <h4 class="tx-primary tx-bold tx-lato">$5,987.50</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->

                                <hr class="mg-b-60">

                                <a href="" class="btn btn-primary btn-block">Pay Now</a>

                            </div><!-- card-body -->
                        </div><!-- card -->

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
