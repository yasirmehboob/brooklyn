<?php 
$path  = 'admin/orna/';
include('admin/orna/db.php');
$where='';
$t_name='ornasys_tbl';
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
    <title>Database Content Privilege</title>

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
                                <h2 class="cap">Database Content Privilege</h2>
                                <div class="col-md-5 form-group pull-right top_search" style="margin-bottom:0;">
                                        <!--Filter Buttion-->
                                        <form action="content-privilege-list.php" method="post">
                                            <div class="col-md-5">
                                                <select class="form-control" placeholder="Choose Option" name="del" required="required">
                                                    <option value="*">All</option>
                                                    <option value="N">Active</option>
                                                    <option value="Y">In-Actice</option>
                                                </select>
                                                <script type="text/javascript">
                                                    var post_value = '<?php echo @$_POST['del']?>';
                                                    if (post_value != '') {
                                                        $("select  option[value='" + post_value + "'").prop("selected", true);
                                                    }
                                                </script>

                                            </div>

                                            <div class="col-md-2">
                                                <button type="submit" id="up" class="btn btn-success">Filter</button>
                                            </div>

                                            <div class="col-md-3">
                                                <a href="content-privilege.php"><button type="button" class="btn btn-primary cap"><i class="fa fa-plus"></i> New Content Privilege</button></a>                                            
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
                                        <?php
                                            $row=0;
                                                 
                                            $sql_fields='desc '.$t_name;
                                            $ed_desc_query=mysql_query($sql_fields);
                                            while($ed_desc=mysql_fetch_array($ed_desc_query)){
                                                
                                             if($ed_desc['Field']=='del'){
                                                 $ed_desc['Field']="Status";
                                             }
                                                
                                            if($ed_desc['Field']=='id'){
                                                 $ed_desc['Field']="ID #.";
                                             }    
                                                
                                            if($ed_desc['Field']=='dt'){
                                                 $ed_desc['Field']="Date";
                                             }                
                                                   
                                            print"<th class=\"cap\">"; echo $ed_desc['Field']; print"</th>";
                                            };

                                        print "<th width=\"15%\" style=\"text-align:center\">Action</th>";    
                                        ?>    
                                        </tr>
                                    </thead>


                                    <tbody>
                                        
                                        <?php
                                              
                                            //------------Filter-----------------
                                            if(isset($_POST['del']) && $_POST['del']!='*'){
                                                if($where!=''){
                                                    $where.=' AND ';
                                                }else{
                                                    $where.=" WHERE ";
                                                }

                                                $where.= "  `del`='".$_POST['del']."'";
                                            }else{
                                                $where.="";
                                            }
                                            //------------Filter-----------------
                                               
                                            
                                            $sql_data='select * from '. $t_name .$where;
                                        
						  		            $query=mysql_query($sql_data);
                                            $sr=0;
                                        
                                            while($result=mysql_fetch_array($query)){
                                                $sr++;
                                                
                                                $sql='desc '.$t_name;
                                                $ed_desc_query=mysql_query($sql);
                                            print "<tr>";
                                                
                                                if(isset($result['del'])){//check if del coloumn existed in table
                                                    if($result['del']=='N'){
                                                    $result['del']="<button type=\"button\" class=\"btn btn-success btn-xs\">Active</button>";
                                                    }else{
                                                        $result['del']="<button type=\"button\" class=\"btn btn-danger btn-xs\">Inactive</button>";
                                                    }   
                                                }
                                                
                                                if(isset($result['dt'])){//check if del coloumn existed in table
                                                    if($result['dt']!=''){
                                                        $result['dt']=date('d-M-Y', $result['dt']);
                                                    }else{
                                                        $result['dt'] = 'N/A';
                                                    }
                                                }
                                                
                                                while($ed_desc=mysql_fetch_array($ed_desc_query)){
                                                    
                                                    if(1==1){//exampt some fields           
                                                        //Checking if the field is a forigen key field
                                                         $sql_fk = "SELECT
                                                                        CONCAT(table_name, '.', column_name) AS 'foreign key',
                                                                        CONCAT(referenced_table_name, '.', referenced_column_name) AS 'references',
                                                                        constraint_name AS 'constraint name',
                                                                        referenced_table_name,
                                                                        referenced_column_name
                                                                    FROM
                                                                        information_schema.key_column_usage
                                                                    WHERE
                                                                        referenced_table_name IS NOT NULL
                                                                        AND table_schema = '".$MySQL_database."'
                                                                        AND table_name = '".$t_name."'
                                                                        AND column_name = '".$ed_desc['Field']."'";

                                                        $count_fk = mysql_num_rows(mysql_query($sql_fk));

                                                            if($count_fk>0){//if forigen key found
                                                                    $fk = mysql_fetch_array(mysql_query($sql_fk)); 
                                                                    $sql_fk_ref = "select * from ". $fk['referenced_table_name']." where ".$fk['referenced_column_name']." = '".$result[$ed_desc['Field']]."'";
                                                                    $query_fk_ref = mysql_query($sql_fk_ref);
                                                                    $fk_dropdown_val= '';
                                                                    while($fk_ref = mysql_fetch_array($query_fk_ref)){

                                                                    //making forigen key values for drop-down    
                                                                    //for ($i = 0; $i < mysql_num_fields($query_fk_ref); $i++) { // getting all columns
                                                                    for ($i = 0; $i < 3; $i++) {    
                                                                        $fk_dropdown_val.= substr($fk_ref[mysql_field_name($query_fk_ref, $i)],0,20).' -- '; 
                                                                    } 
                                                                     $fk_dropdown_val=substr($fk_dropdown_val,0,strlen($fk_dropdown_val)-4);
                                                                    //making forigen key values for drop-down

                                                                }//end While Fk-Ref 
                                                                print"<td>".$fk_dropdown_val."</td>";   

                                                            }//end if forigen key found
                                                            else{
                                                                print"<td>"; echo $result[$ed_desc['Field']]; print "</td>";   
                                                            }
                                                                
                                                            }//end if
                                                    
                                                     };
                                                
                                                 print "
                                                    <td style=\"text-align:center\">
                                                        <a href=\"content-privilege-edit.php?id=".$result['id']."&t=".$t_name."\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-pencil\"></i> Edit </a>

                                                        <button type=\"button\" class=\"btn btn-danger btn-xs delete\" data-toggle=\"modal\" data-target=\"#delete-modal\"
                                                        data-id=\"".$result['id']."\" data-name=\"Delete data from : ".$t_name."\"  data-tname=\"".$t_name."\">
                                                            <i class=\"fa fa-trash-o\"></i> Delete 
                                                         </button>
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
    
     <!-- Delete modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Delete Record?</h4>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to permanently delete this data?</h4>
                    <p id="delete_data"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger confirm_delete" data-ajax_table="" data-ajax_id="">Confirm Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete modal -->

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
        
    <script src="admin/ajax/js/delete_popup.js"></script>
    
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