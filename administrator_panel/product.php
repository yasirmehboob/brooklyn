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
    <title>New Product</title>

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
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>

    <link rel="stylesheet" href="admin/plugin/image_uploader/css/jquery.uploader.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="admin/plugin/tags/dist/style.css">
    
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
                                <h2>New Product</h2>
                                <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                    <a href="products_list.php" style="float:right">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-shopping-basket"></i> All Products</button></a>
                                </div>
                            </div>

                        </div>

                            <div class="container">
                                    <!-- Left side -->
                                    <div class="col-lg-5">
                                        <!-- Basic information -->

                                        <div class="card mb-1">
                                            <div class="card-body">
                                                <h3 class="h6 mb-4">Product information</h3>
                                                <div class="row">
                                                    <div class="col-lg-6 mb-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Product Name</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Select Category</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6 mb-4">
                                                        <div class="mb-6">
                                                            <label class="form-label">Price</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 mb-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Taxable</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 mb-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Tax Percentage</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                        <!-- Address -->
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Product Specification</label>
                                                        <textarea id="descp" name="descp" class="element textarea large">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Right side -->
                                    <div class="col-lg-4">

                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h3 class="h6 mb-4">Media / Images</h3>

                                                <ul class="list-group list-group-flush mx-n2">
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-start">

                                                        <div class="ms-2 me-auto">
                                                            <label class="mb-0">Upload Media</label>
                                                            <input type="text" id="upload_media" value="">
                                                        </div>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        
                                        
                                        
                                         <div class="card mb-4">
                                            <div class="card-body">
                                                <h3 class="h6 mb-4">Link Attributes</h3>

                                                <ul class="list-group list-group-flush mx-n2">
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-start">

                                                        <div class="ms-2 me-auto">
                                                            <label class="mb-0">Upload Media</label>
                                                            <input class="form-check-input" type="input">
                                                        </div>

                                                        <div class="ms-2 me-auto">
                                                            <h6 class="mb-0">Selected Images</h6>
                                                        </div>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>

                                    </div>
                                
                                    <div class="col-lg-3">
                                        
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h3 class="h6 mb-4">Add Tags</h3>

                                                <div class="ms-2 me-auto">
                                                    <select multiple data-placeholder="Select Languages">
                                                        <option>Python</option>
                                                        <option selected>JavaScript</option>
                                                        <option>C/C++</option>
                                                        <option>Java</option>
                                                        <option>Kotlin</option>
                                                        <option>PHP</option>
                                                        <option>Scala</option>
                                                        <option>Vue.js</option>
                                                        <option>Angular</option>
                                                        <option>React</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Status -->
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h3 class="h6 mb-4">Listing Options</h3>

                                                <ul class="list-group list-group-flush mx-n2">
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-start">

                                                        <div class="ms-2 me-auto">
                                                            <input type="checkbox" checked data-toggle="toggle" data-style="ios">
                                                            <label class="mb-0">Sale</label>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="ms-2 me-auto">
                                                            <h6 class="mb-0">Discounted Price</h6>
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            <input class="form-control form-check-input" type="text" value="" placeholder="Discounted price" />
                                                        </div>

                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                                                        <div class="ms-2 me-auto">

                                                            <input type="checkbox" data-toggle="toggle" data-style="ios">
                                                            <label class="mb-0">Hot Selling</label>
                                                        </div>
                                                        <small>News about product and feature updates.</small>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                                                        <div class="ms-2 me-auto">

                                                            <input type="checkbox" checked data-toggle="toggle" data-style="ios">
                                                            <label class="mb-0">Featured Item</label>
                                                        </div>
                                                        <small>News about product and feature updates.</small>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                                                        
                                                            
                                                        
                                                        <div class="ms-2 me-auto">

                                                            <input type="checkbox"  data-toggle="toggle" data-style="ios">
                                                            <label class="mb-0">New Arrivals</label>
                                                        </div>
                                                        <small>News about product and feature updates.</small>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        
                                        
                                         <div class="card mb-4">
                                            <div class="card-body">
                                                <h3 class="h6 mb-4">Inventory Management</h3>

                                                <ul class="list-group list-group-flush mx-n2">
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-start">

                                                        <div class="ms-2 me-auto">
                                                            <label class="mb-0">Upload Media</label>
                                                            <input class="form-check-input" type="text">
                                                        </div>

                                                        <div class="ms-2 me-auto">
                                                            <h6 class="mb-0">Selected Images</h6>
                                                        </div>
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

    <script src="admin/ajax/js/sv.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>
    
    <script src="admin/plugin/image_uploader/dist/jquery.uploader.min.js"></script>
    
    <script src="admin/plugin/tags/dist/script.js"></script>

    <script>
        CKEDITOR.replace('descp', {
            height: 350
        });

    </script>



    <script type="application/javascript">
        let ajaxConfig = {
            ajaxRequester: function(config, uploadFile, pCall, sCall, eCall) {
                let progress = 0
                let interval = setInterval(() => {
                    progress += 10;
                    pCall(progress)
                    if (progress >= 100) {
                        clearInterval(interval)
                        const windowURL = window.URL || window.webkitURL;
                        sCall({
                            data: windowURL.createObjectURL(uploadFile.file)
                        })
                        // eCall("上传异常")
                    }
                }, 300)
            }
        }
        $("#upload_media").uploader({
            multiple: true,
            ajaxConfig: ajaxConfig,
            autoUpload: false
        })

    </script>
</body>

</html>
