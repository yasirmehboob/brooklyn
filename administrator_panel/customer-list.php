<?php
$path  = 'admin/orna/';
include('admin/orna/db.php');

if(isset($_GET['category'])){
    $_POST['category']=ucwords($_GET['category']);
}

if(isset($_GET['status'])){
    $_POST['status']=$_GET['status'];
}

$where='';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo @$_POST['category'];?> Users</title>

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

    <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />    
    
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
                                <h2><?php echo @$_POST['category'];?> Customers</h2>
                                <div class="col-md-7 form-group pull-right top_search" style="margin-bottom:0;">
                                        <!--Filter Buttion-->
                                        <form action="customer-list.php" method="POST">
                                            <div class="col-md-4">
                                                <label class="control-label">Category</label>
                                                <select class="form-control" name="category">
                                                    <option value="*">All</option>
                                                    <?php
                                                    $sql1="select * from user_category where del ='N'";
                                                    $query = mysql_query($sql1);
                                                    while($filter=mysql_fetch_array($query)){
                                                        print "<option value=\"".$filter['category']."\">".$filter['category']."</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <script type="text/javascript">
                                                    $(document).ready(function(){
                                                       var post_value = '<?php echo @$_POST['category']?>';
                                                        if (post_value != '') {
                                                            $("select  option[value='"+post_value+"'").prop("selected", true);
                                                        } 
                                                    });
                                                </script>

                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="*">All</option>
                                                    <option value="approved">Approved</option>
                                                    <option value="approval-pending">Approval Pending</option>
                                                </select>
                                                <script type="text/javascript">
                                                    var post_value = '<?php echo @$_POST['status']?>';
                                                    if (post_value != '') {
                                                        $("select  option[value='"+post_value+"'").prop("selected", true);
                                                    }
                                                </script>
                                            </div>

                                            <div class="col-md-4">
                                                <button type="submit" id="up" class="btn btn-success go">Filter</button>
                                                
                                                <a href="customer.php" class="btn btn-info go" >New Customer</a>
                                            </div>

                                        </form>
                                        <!--Filter Buttion-->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead class="header">
                                        <tr>
                                            <th>Sr. #</th>
                                            <th width="20%">Name</th>
                                            <th>Contact #</th>
                                            <th>E-mail</th>
                                            <th>Branch</th>
                                            <th width="10%">Reg. Date</th>
                                            <th>Status</th>
                                            <th>Edit Status</th>
                                            <th width="16%">Tools</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                              
                                            //------------Filter-----------------
                                            if(isset($_POST['status']) && $_POST['status']!='*'){
                                                if($where!=''){
                                                    $where.=' AND ';
                                                }else{
                                                    $where.=" WHERE ";
                                                }

                                                $where.= "  `status`='".$_POST['status']."'";
                                            }else{
                                                $where.="";
                                            }
                                                    
                                            if(isset($_POST['category']) && $_POST['category']!='*'){
                                                if($where!=''){
                                                    $where.=' AND ';
                                                }else{
                                                    $where.=" WHERE ";
                                                }

                                                $where.= "  `category`='".$_POST['category']."'";
                                            }else{
                                                $where.="";
                                            }        
                                            //------------Filter-----------------
                                                    
                                            $sql="select * from users ".$where;
                                            $query=mysql_query($sql);
                                                $sr=0;
                                            while($result=mysql_fetch_array($query)){
                                                $sr++;
                                                if($result['status']=='approval-pending'){
                                                        $status="<label class=\"label label-default\">Pending</label>";
                                                        $action = "<a href=\"#\" class=\"btn btn-primary btn-xs approve\" data-toggle=\"modal\" data-target=\"#approve-modal\" data-user_id=\"".$result['id']."\" data-user_name=\"".$result['f_name'].' '.$result['l_name']."\"><i class=\"fa fa-check\"></i> Approve </a>";
                                                    }
                                                else if($result['status']=='approved'){
                                                        $status="<label class=\"label label-success\">Approved</label>";
                                                        $action = "<a href=\"#\" class=\"btn btn-danger btn-xs susspend\" data-toggle=\"modal\" data-target=\"#susspend-modal\" data-user_id=\"".$result['id']."\" data-user_name=\"".$result['f_name'].' '.$result['l_name']."\"><i class=\"fa fa-ban\"></i> Susspend </a>";
                                                    }
                                                else{
                                                        $status="<label class=\"label label-danger\">Suspended</label>";
                                                        $action = "<a href=\"#\" class=\"btn btn-warning btn-xs unsuspend\" data-toggle=\"modal\" data-target=\"#unsuspend-modal\" data-user_id=\"".$result['id']."\" data-user_name=\"".$result['f_name'].' '.$result['l_name']."\" data-suspend_category=\"".$result['category']."\"><i class=\"fa fa-check-circle-o\"></i> Unsuspend </a>";
                                                }
                                                
                                                if($result['dt']==''){
                                                    $result['dt']=time();
                                                }
                                                print "
                                                <tr>
                                                    <td>".$sr."</td>
                                                    <td>".$result['f_name'].' '.$result['l_name']."</td>
                                                    <td>".$result['mobile_number']."</td>
                                                    <td>".$result['email']."</td>
                                                    <td>".$result['branch']."</td>
                                                    <td>".date('d-M-Y', $result['dt'])."</td>
                                                    <td>".$status."</td>
                                                    
                                                    <td>".$action."</td>
                                                    
                                                    <td>
                                                        <a href=\"customer-profile.php?customer=".$result['username']."\" class=\"btn btn-dark btn-xs\"><i class=\"fa fa-user\"></i> View Profile </a>
                                                        
                                                        <a href=\"users-edit.php?id=".$result['id']."&t=users\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-pencil\"></i> Edit </a>
                                                        
                                                    </td>
                                                </tr>
                                                ";
                                            }
                                        ?>   
                                    </tbody>
                                </table>
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
    
     <!-- Approve modal -->
    <div class="modal fade" id="approve-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Approve <span class="label label-danger user_name"></span></h4>
                </div>
                <form id="approve_form">
                    <div class="modal-body">
                        <h4>Choose category for this User</h4>
                        <select class="form-control" style="width:50% !important;" id="category" required>
                           <option value="">Choose Category</option>
                            <?php
                            $sql1="select * from user_category where del ='N'";
                            $query = mysql_query($sql1);
                            while($category=mysql_fetch_array($query)){
                                print "<option value=\"".$category['category']."\">".$category['category']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="confirm_approve" data-popup_user_id="" ><i class="fa fa-check"></i> Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Approve modal -->
    
    <!-- Susspend modal -->
    <div class="modal fade" id="susspend-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning, susspend <span class="label label-danger user_name"></span></h4>
                </div>
                    <div class="modal-body">
                        <h4>Are you sure you want to susspend this user?</h4>
                        <p>Once susspened, this user will no longer be able to log into Metafitnosis Mobile App. You will still retain all records of their actions in the system.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="confirm_susspend" data-popup_user_id="" ><i class="fa fa-ban"></i> Susspend Now</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- Susspend modal -->
    
    
    <!-- unsuspend modal -->
    <div class="modal fade" id="unsuspend-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle"></i> Unsuspend <span class="label label-danger user_name"></span></h4>
                </div>
                    <div class="modal-body">
                        <h4>Are you sure you want to unsuspend this user?</h4>
                        <p>Once susspened, this user will no longer be able to log into Metafitnosis Mobile App. You will still retain all records of their actions in the system.</p>
                        
                        <h6>User Category</h6>
                        <select class="form-control old_category" style="width:50% !important;" id="new_category" required>
                           <option value="">Choose Category</option>
                            <?php
                            $sql1="select * from user_category where del ='N'";
                            $query = mysql_query($sql1);
                            while($category=mysql_fetch_array($query)){
                                print "<option value=\"".$category['category']."\">".$category['category']."</option>";
                            }
                            ?>
                        </select>
                        <h6><b>Current Category: <span id="suspend_category"></span></b></h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="confirm_unsuspend" data-popup_user_id="" ><i class="fa fa-ban"></i> Unsuspend Now</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- unsuspend modal -->
    

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
    
    <!-- PNotify -->
    <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>
    
    
    <!-- skycons -->
    <script src="js/skycons/skycons.min.js"></script>
     <!-- Datatables-->
    <script src="js/datatables/jquery.dataTables.min.js"></script>
    <script src="js/datatables/dataTables.bootstrap.js"></script>
    <script src="js/datatables/dataTables.buttons.min.js"></script>
    <script src="js/datatables/buttons.bootstrap.min.js"></script>
    <script src="js/datatables/jszip.min.js"></script>
    <script src="js/datatables/pdfmake.min.js"></script>
    <script src="js/datatables/vfs_fonts.js"></script>
    <script src="js/datatables/buttons.html5.min.js"></script>
    <script src="js/datatables/buttons.print.min.js"></script>

    <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="js/datatables/dataTables.keyTable.min.js"></script>
    <script src="js/datatables/dataTables.responsive.min.js"></script>
    <script src="js/datatables/responsive.bootstrap.min.js"></script>
    <script src="js/datatables/dataTables.scroller.min.js"></script> 
    
    <script src="admin/ajax/js/user.js"></script>
    
    <script>
            var handleDataTableButtons = function () {
                    "use strict";
                    0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                        dom: "Bfrtip",
                        buttons: [{
                            extend: "copy",
                            className: "btn-sm"
                }, {
                            extend: "csv",
                            className: "btn-sm"
                }, {
                            extend: "excel",
                            className: "btn-sm"
                }, {
                            extend: "pdf",
                            className: "btn-sm"
                }, {
                            extend: "print",
                            className: "btn-sm"
                }],
                        responsive: !0
                    })
                },
                TableManageButtons = function () {
                    "use strict";
                    return {
                        init: function () {
                            handleDataTableButtons()
                        }
                    }
                }();
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({
                    keys: true
                });
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable({
                    ajax: "js/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({
                    fixedHeader: true
                });
            });
            TableManageButtons.init();
        </script>
    
</body>

</html>