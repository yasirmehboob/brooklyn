<?php
$to = time();
$from = strtotime("-6 month", $to);
$dt_range  = " and dt>='$from' and dt<='$to' ";
?>
<div class="col-md-4">
<a href="event-list.php">
<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="tile-stats">
    <div class="icon"><i class="fa fa-hand-rock-o"></i>
    </div>
    <?php 
        $sql1 = "select count(*) as total from events where del='N'".$dt_range;
        $count = mysql_fetch_array(mysql_query($sql1));
    ?>  
      <div class="count"><?php echo number_format($count['total']);?>4</div>
    <h3>Trainers Enrolled</h3>
    <p>From <?php echo date('d-M-Y', $from);?> Till Date</p>
  </div>
</div>
</a>    



<a href="content-adv-list.php?t=news_letter">
<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="tile-stats">
    <div class="icon"><i class="fa fa-calendar"></i>
    </div>
    <?php 
        $sql1 = "select count(*) as total from news_letter where del='N'".$dt_range;
        $count = mysql_fetch_array(mysql_query($sql1));
    ?>  
    <div class="count"><?php echo number_format($count['total']);?></div>
    <h3> Sesstions</h3>
    <p>Today</p>
  </div>
</div>
</a>    

<a href="#">
<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="tile-stats">
    <div class="icon"><i class="fa fa-bullhorn"></i>
    </div>
    <?php 
        $sql1 = "select count(*) as total from announcement where del='N'".$dt_range;
        $count = mysql_fetch_array(mysql_query($sql1));
    ?>  
    <div class="count"><?php echo number_format($count['total']);?>9</div>
    <h3>Announcements</h3>
      
    <p>From <?php echo date('d-M-Y', $from);?> Till Date</p>
  </div>
</div>
</a>
    
<a href="#">
<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="tile-stats">
    <div class="icon"><i class="fa fa-cutlery"></i>
    </div>
    <?php 
        $sql1 = "select count(*) as total from announcement where del='N'".$dt_range;
        $count = mysql_fetch_array(mysql_query($sql1));
    ?>  
    <div class="count"><?php echo number_format($count['total']);?>6</div>
    <h3>Food Logs</h3>
      
    <p>From <?php echo date('d-M-Y', $from);?> Till Date</p>
  </div>
</div>
</a> 
    
<a href="#">
<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="tile-stats">
    <div class="icon"><i class="fa fa-users"></i>
    </div>
    <?php 
        $sql1 = "select count(*) as total from announcement where del='N'".$dt_range;
        $count = mysql_fetch_array(mysql_query($sql1));
    ?>  
    <div class="count"><?php echo number_format($count['total']);?>6</div>
    <h3>Customers Enrolled</h3>
      
    <p>Total Active Registration</p>
  </div>
</div>
</a>     

</div>