<?php 
$path  = 'admin/orna/';
include('admin/orna/db.php');
$where='';
$t_name=$_GET['t'];
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
    <title>New <?php echo $t_name;?></title>

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

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
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
                                <h2 class="cap">Add (<?php echo $t_name;?>)</h2>
                                <div class="col-md-2 pull-right top_search" style="margin-bottom:0;">
                                        
                                    <div class="col-md-12">
                                        <a href="content-list.php?t=<?php echo $t_name;?>"><button type="button" class="btn btn-success cap" style="width:100%;"><i class="fa fa-list"></i> View All <?php echo $t_name;?></button></a>                                            
                                    </div>
                                        <!--Filter Buttion-->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form id="form" class="form-horizontal form-label-left" action="admin/ajax/php/sv.php?t_name1=<?php echo $_GET['t'];?>&count=1&row=single&file=false&flimit=0&aiu=n&log=n" method="POST">
                                     
                                <?php	
						  		$sql='desc '.$t_name;
						  		$ed_desc_query=mysql_query($sql);
								
								while($ed_desc=mysql_fetch_array($ed_desc_query)){
								$type=explode('(',$ed_desc['Type']);
								$size=substr(@$type[1],0,-1);
                                    
                                if($ed_desc['Field']=='del'){
                                     $ed_desc['lable']="Status";
                                 }    
                                    
                                else if($ed_desc['Field']=='dt'){
                                     $ed_desc['lable']="Date";
                                 }                 
                                    
                                else if($ed_desc['Field']=='files_1'){
                                     $ed_desc['lable']="Choose Image";
                                 }
                                    
                                else if($ed_desc['Field']=='descp'){
                                     $ed_desc['lable']="Description";
                                 }    
                                
                                else{
                                    $ed_desc['lable']=$ed_desc['Field'];
                                }    
                                    
								print"
                                <div class=\"form-group\">
                                  <label class=\"control-label col-md-3 col-sm-3 col-xs-12 cap\" for=\"".stripslashes($ed_desc['Field'])."\">"; echo $ed_desc['lable']; print" <span class=\"required\">*</span>
                                  </label>
                                  <div class=\"col-md-6 col-sm-6 col-xs-12\">";
                                    
                                    //Checking if the field is a forigen key field
                                    $sql_fk = "
                                                SELECT
                                                    CONCAT(table_name, '.', column_name) AS 'foreign key',
                                                    CONCAT(referenced_table_name, '.', referenced_column_name) AS 'references',
                                                    constraint_name AS 'constraint_name',
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
                                            $sql_fk_ref = "select * from ". $fk['referenced_table_name'];
                                            
                                            $query_fk_ref = mysql_query($sql_fk_ref);
                                            print"<select  class=\"form-control\" name=\"".stripslashes($ed_desc['Field'])."\">";
                                        
                                            while($fk_ref = mysql_fetch_array($query_fk_ref)){

                                                //making forigen key values for drop-down
                                                $sql_fk_data = $sql_fk_ref. " where ".$fk['referenced_column_name']." = '".$fk_ref[$fk['referenced_column_name']]."'";
                                                
                                                $query_fk_data = mysql_query($sql_fk_data);
                                                $fk_data = mysql_fetch_array($query_fk_data);
                                                $fk_dropdown_val= '';
                                                //making forigen key values for drop-down    
                                                //for ($i = 0; $i < mysql_num_fields($query_fk_ref); $i++) { // getting all columns
                                                for ($i = 0; $i <2; $i++) {    
                                                    $fk_dropdown_val.= substr($fk_data[mysql_field_name($query_fk_data, $i)],0,20).' -- '; 
                                                } 
                                                $fk_dropdown_val=substr($fk_dropdown_val,0,strlen($fk_dropdown_val)-4);
                                                //making forigen key values for drop-down

                                                print "<option value=\"".$fk_ref[$fk['referenced_column_name']]."\">".$fk_dropdown_val."</option>";
                                            }//end While Fk-Ref 
                                        print "</select>";
                                    }//End if forigen key found
                                    
                                    
                                    else{//Else forigen key not found
                                        
                                            if(($size>200) || (@$type[0]=='text') || (@$type[0]=='longtext')){
                                            print"
                                            <textarea class=\"form-control\" id=\"descp\" rows=\"4\" name=\""; echo stripslashes($ed_desc['Field']); print "\"></textarea>";
                                            }

                                            else if($ed_desc['Field']=='dt'){
                                                print"
                                                    <input type=\"date\" class=\"form-control\" value=\"\" name=\""; echo stripslashes($ed_desc['Field']); print "\"/>";
                                                }

                                            else if($ed_desc['Field']=='id'){
                                                    print"<input class=\"form-control\" type=\"text\" value=\"null\" name=\""; echo stripslashes($ed_desc['Field']); print "\" readonly/>";
                                                }

                                            else if($ed_desc['Field']=='del'){
                                                
                                                print"
                                                    <select  class=\"form-control\" name=\"".stripslashes($ed_desc['Field'])."\">
                                                        <option value=\"N\" >Active</option>
                                                        <option value=\"Y\" >In-Active</option>
                                                    </select>";
                                                }    

                                                else{
                                                    print"<input class=\"form-control\" type=\"text\" value=\"\" name=\""; echo stripslashes($ed_desc['Field']); print "\"/>";
                                                    }
                                    }//end Else foriegen key not found
                                    
                                    
                            print "</div>
                                </div>";
								
								};
							?>   
                                <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="hidden" name="dt"  value="<?php echo time();?>" >
                                            <input type="hidden" id="id" value="<?php echo $_GET['id']?>">
                                            <input type="hidden" id="table" value="<?php echo $_GET['t']?>">
                                          <a href="content-list.php?t=<?php echo $_GET['t'];?>"><button type="button"class="btn btn-danger">Cancle</button></a>
                                            <button type="submit" id="sv" class="btn btn-primary">Save</button>
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
    <script src="admin/ajax/js/sv.js"></script>
    <script>
        CKEDITOR.replace( 'descp',{height:350} );
	</script>
</body>

</html>