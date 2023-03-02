<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Select Application Type</title>
<link rel="stylesheet" type="text/css" href="view-ornasys.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a><?php echo $company;?></a></h1>
		<form id="form_806184" class="appnitro"  method="post" action="../orna/ins-type.php">
					<div class="form_description">
			<h2>Please Make Your Selection.</h2>
			<p> (<?php echo $company;?>)</p>
		</div>						
			<ul >
			
					<li id="li_2" >
						  <div>	
                          <table>
                          	<tr id="fix_height">
								<td>
                                    <div>
                                        <a href="que.php">CONTESTANT'S APPLICATIONS</a>
                                    </div>
                             	</td>
                             </tr><tr id="fix_height">
                                <td>
                                    <div>
                                        <a href="que_fran.php">FRANCHISE'S APPLICATIONS</a>
                                    </div>
                             	</td>
                                </tr><tr id="fix_height">
                                <td>
                                    <div>
                                        <a href="que_val.php">VOLUNTEERS'S APPLICATIONS</a>
                                    </div>
                             	</td>
                                </tr><tr id="fix_height">
                                <td>
                                    <div>
                                        <a href="que_tic.php">TICKET'S RESERVATIONS</a>
                                    </div>
                             	</td>
                                </tr>
                            </table>
	                      </div>
                    </li>
			</ul>
		</form>	
		<div id="footer">
			Powered by <a href="http://www.ornamentsolutions.com">Ornament</a> Registered to <?php echo $company;?>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>