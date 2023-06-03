<?php
$path  = 'admin/orna/';
include('admin/orna/db.php');
$where=" where user='".$_GET['customer']."' ";
$sql_custumer="select * from users where username='".$_GET['customer']."'";
$query_custoemr=mysql_query($sql_custumer);
$customer= mysql_fetch_array($query_custoemr);
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
    <title><?php echo $customer['f_name'].' '.$customer['l_name'];?> Profile</title>

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

                    <div class="right_col mobile-main" role="main" style="margin-left:0 !important;">
                
                <a href="user_meaurement.php?customer=<?php echo $_GET['customer']?>" class="btn btn-primary btn-xs"><i class="fa fa-list-ol"></i> Meaurements </a>
                        
                <a href="user_dietplan.php?customer=<?php echo $_GET['customer']?>"><button class="btn btn-dark btn-xs"><i class="fa fa-plus"></i> Diet Plan </button></a>
                        
                <a href="food_logs.php?customer=<?php echo $_GET['customer']?>"><button class="btn btn-dark btn-xs"><i class="fa fa-cutlery"></i> Food Log </button></a>        
                        
                <a href="announcemnts.php?t=announcement&customer=<?php echo $_GET['customer']?>" class="btn btn-default btn-xs" ><i class="fa fa-envelope"></i> Send Notification</a>
                        
                <a href="schedule.php?customer=<?php echo $_GET['customer']?>" class="btn btn-warning btn-xs" ><i class="fa fa-envelope"></i> Manage Schedule</a>
                
                    <!--COntent area-->
                    <div class="mobile">
                        <div class="alert alert-dark go">
                            <div class="media-left media-top pull-left">
                            <a href="#">
                              <img class="media-object" width="150px" src="images/<?php echo $customer['dir'].'/'.$customer['files_1'];?>" alt="<?php echo $customer['f_name'].' '.$customer['l_name'];?>">
                            </a>
                            </div>
                            
                            <br>
                            
                            <h4><?php echo $customer['f_name'].' '.$customer['l_name'];?></h4> 
                            <p>Mob: <?php echo $customer['mobile_number'];?><br>
                                E-mail: <?php echo $customer['email'];?><br>
                                Address: <?php echo $customer['address'];?>.<br>
                                Registered on : <label class="label label-info"><?php echo date('D d-M-Y', $customer['dt']);?></label>
                            </p>
                            
                            <div class="clear-fix row"></div>
                        </div>
                        
						<div class="details">
                            <h4> <span style="color:#f0ad4e;"> <i class="fa fa-circle"></i> </span> Schedule </h4>                            
							<?php
								$sql_sec="select 
											sm.month, 
											sm.day, 
											sm.dt, 
											sm.status,
											t.f_name,
											t.l_name,
											sest.title,
											sest.time_start,
											sest.time_end,
											sest.durration,
											st.gym_note
												from 
													schedule_m sm, 
													schedule_t st,
													trainers t,
													session_t sest
														where
															sm.cust_id='".$customer['id']."' AND
															st.schedule_m=sm.id AND
															st.trainer_id=t.id AND
															st.session_t=sest.id 
																Order by sm.dt ASC";
							?>  
                                <!-- Small button group -->
                                <table class="table table-bordered table-striped" id="export">
                                    <thead>
                                        <tr>
                                      <th>Sr. #</th>
                                            <th>Date</th>
                                            <th>Coach</th>
                                            <th>Time</th>
                                            <th>Durration</th>
                                            <th>Notes</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        
                                        $query_sec=mysql_query($sql_sec);
                                            $sr=0;
                                        while($sec=mysql_fetch_array($query_sec)){
                                            $sr++;
                                            print "
                                            <tr>
                                                <td>".$sr."</td>
                                                <td>".date('D d-M-Y', strtotime($sec['dt']))."</td>
                                                <td>".$sec['f_name'].' '.$sec['l_name']."</td>
                                                <td>From: ".$sec['time_start'].' To: '.$sec['time_end']."</td>
                                                <td>".$sec['durration']." Minutes</td>
                                                <td>".ucfirst($sec['gym_note'])."</td>
                                                
                                            </tr>";
                                        }
                                    ?>  
                                </tbody>
                            </table>
                        </div>
						
                        <div class="details">
                            <h4> <span style="color:red;"> <i class="fa fa-circle"></i> </span> Meaurements </h4>                            
							<?php
								$sql001="select * from users_meaurements ".$where." Order by id DESC limit 0,1";
								$reading=mysql_fetch_array(mysql_query($sql001));
							?>
							<p>Last Reading Taken on <b><?php echo date('D d-M-Y', strtotime($reading['dt']));?></b></p>
                                
                                <!-- Small button group -->
                                <table class="table table-bordered table-striped" id="export">
                                    <thead>
                                        <tr>
                                      <th>Sr. #</th>
                                            <th>Date</th>
                                            <th>Weight</th>
                                            <th>Arm</th>
                                            <th>Naval</th>
                                            <th>Hip</th>
                                            <th>Thigh</th>
                                            <th>Upper Waist</th>
                                            <th>Chest</th>
                                            <th width='40%'>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        
                                        $sql="select * from users_meaurements ".$where." Order by id DESC";
                                        $query=mysql_query($sql);
                                            $sr=0;
                                        while($result112=mysql_fetch_array($query)){

                                            $sr++;
                                            if($sr==1){$class="class=\"success\"";}
											else{
                                                $class="";
                                            }
                                            print "
                                            <tr ".$class.">
                                                <td>".$sr."</td>
                                                <td>".date('d-M-Y', strtotime($result112['dt']))."</td>
                                                <td>".$result112['weight']."</td>
                                                <td>".$result112['arm']."</td>
                                                <td>".$result112['naval']."</td>
                                                <td>".$result112['hip']."</td>
                                                <td>".$result112['thigh']."</td>
                                                <td>".$result112['upper_waist']."</td>
                                                <td>".$result112['chest']."</td>
                                                <td>".$result112['notes']."</td>
                                            </tr>";
                                        }
                                    ?>  
                                </tbody>
                            </table>
                        </div>
                        
                        <hr>
                        
                        <div class="details">
                            <h4> <span style="color:green;"> <i class="fa fa-circle"></i> </span> Diet Plan </h4>                            
							<?php
								$sql002="select * from users_meaurements ".$where." Order by id DESC limit 0,1";
								$reading2=mysql_fetch_array(mysql_query($sql002));
							?>
							
                            <p>Last Updated on <b><?php echo date('D d-M-Y', strtotime($reading2['dt']));?></b></p>
                                
                                <!-- Small button group -->
                                <table class="table table-bordered table-striped" id="export">
                                    <thead >
                                        <tr>
                                      <th>Sr. #</th>
                                            <th>Date</th>
                                            <th>Updated By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        
                                        $sql="select * from user_dietplan ".$where." Order by id DESC";
                                        $query=mysql_query($sql);
                                            $sr=0;
                                        while($result=mysql_fetch_array($query)){

                                            $sr++;
                                            if($sr==1){$class="class=\"info\"";}else{
                                                $class="";
                                            }
                                            print "
                                            <tr ".$class.">
                                                <td>".$sr."</td>
                                                <td>".date('d-M-Y', $result['dt'])."</td>
                                                <td>".ucfirst($result['uploaded_by'])."</td>
                                                <td><a href='images/users/dietplan/".$result['files_1']."' target='blank'><button class='btn btn-primary btn-xs'>View Plan</button></a></td>
                                            </tr>";
                                        }
                                    ?>  
                                </tbody>
                            </table>

                                <hr>
                        </div>
                        
                    
                        <div class="clear-fix row"></div>
                        
                    </div>
        
                    <div class="mobile p-top last">
                        <h3>Notifications Sent</h3>
                        
						<?php
							$sql_noti="select * from announcement where `type`='".$_GET['customer']."'";
							$query_noti = mysql_query($sql_noti);
							while($noti=mysql_fetch_array($query_noti)){
								$sql_user_details="select * from users where username = '".$noti['user']."'";
								$user_details=mysql_fetch_array(mysql_query($sql_user_details));
									
									print "
										<div class=\"media\" style=\"padding:10px;\">
										  <div class=\"media-left media-top\">
											<a href=\"#\">
											  <img class=\"media-object\" src=\"images/".$user_details['dir'].'/'.$user_details['files_1']."\" alt=\"".$user_details['f_name'].' '.$user_details['l_name']."\" width='150px'>
											</a>
											<center>
												<p class=\"media-heading\" style='margin-top:0.5em;'> ".$user_details['f_name'].' '.$user_details['l_name']." </p>
											</center>
											
										  </div>
										  <div class=\"media-body details\">
											  
											<h4 class=\"media-heading\"> ".$noti['title']." </h4>

											  <p>".html_entity_decode($noti['descp'])."</p>
											  <p class=\"ago-comment label label-danger pull-right\">25 Minutes ago</p>
										  </div>
										</div>
									";
							};
						?>
                    </div>
                    <!--COntent area-->
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