<?php 
$path = '../../orna/';
require_once('../../orna/db.php');

    $to = time();
    $from = strtotime("-6 month", $to);
    $dt_range  = " and dt>='$from' and dt<='$to' ";

    function count_data($table, $where_clause){
        $sql_count = "select count(*) as count from ".$table." where ".$where_clause;
        $return  = mysql_fetch_array(mysql_query($sql_count));
        return number_format($return['count']);
    }

    //Time Ago Function
    function humanTiming ($time){
        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
    }
    //Time Ago Function

?>
<style type="text/css">
    .fixed_height_450{
        height: 545px !important;
    }
    ul.top_profiles {
        height: 260px !important;
    }
</style>
<style type="text/css">
  @media (min-width: 768px){
    .bs-glyphicons li {
        width:33% !important;
        height: auto !important;
      }    
  }
.bs-glyphicons li span{
    font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
}
.bs-glyphicons .glyphicon {
    font-size: 28px;
}
.active_tab {
    color: #fff;
    background-color: #e74c3c !important;
}
</style> 
<div class="row"> 
    <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile fixed_height_450">
      <div class="x_title">
        <h2>Service Issue</h2>
        <ul class="nav navbar-right panel_toolbox" style="min-width:auto !important;">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
        <div class="bs-glyphicons">
            <ul class="bs-glyphicons-list">
                <a href="issues-list.php?status=Pending">
                <li>
                  <span class="glyphicon" aria-hidden="true"><b> <?php echo $total  = count_data("service_issue", "del = 'N' and status ='Pending' ".$dt_range);?></b></span>
                  <span class="glyphicon-class">Pending</span>
                </li>
                </a>
                
                <a href="issues-list.php?status=Escalated">
                <li class="active_tab">
                  <span class="glyphicon" aria-hidden="true"><b><?php echo $total  = count_data("service_issue", "del = 'N' and status ='Escalated' ".$dt_range);?></b></span>
                  <span class="glyphicon-class">Escalated</span>
                </li>
                </a>
                
                <a href="issues-list.php?status=Resolved">
                <li>
                  <span class="glyphicon" aria-hidden="true"><b><?php echo $total  = count_data("service_issue", "del = 'N' and status ='resolved' ".$dt_range);?></b></span>
                  <span class="glyphicon-class">Resolved</span>
                </li>
                </a>
            </ul>
        </div>     
      <div class="x_content"> 
        <h4><?php echo $total  = count_data("service_issue", "del = 'N' ".$dt_range);?> Issues Reported & <?php echo $obtained  = count_data("service_issue", "del = 'N' and status = 'resolved' ".$dt_range);?> Resolved.</h4>
        <?php
          if((($obtained)>0) && (($total)>0)){
            $percentage  = round(($obtained/$total)*100);      
          }else{
            $percentage = 0;
          }
        ?>
          
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>From <?php echo date('M-y', $from);?></span>
          </div>
          <div class="w_center w_55" style="width:70%;">
            <div class="progress">
              <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage;?>%;">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
  
          <h4>Pending Issues <span class="xs_link"><a href="issues-list.php?status=Pending">View All</a></span></h4>  
        <div class="scroll">
            <ul class="list-unstyled top_profiles">
            
            <?php
                $sql="select * from service_issue where status = 'pending' and del='N'".$dt_range." order by id DESC";
                $query = mysql_query($sql);
                while($result=mysql_fetch_array($query)){
                    print "
                    <li class=\"media event\">
                      <a class=\"pull-left profile_thumb\">
                        <i class=\"fa fa-user\"></i>
                      </a>
                      <div class=\"media-body\">
                        <a class=\"title\" href=\"#\">".$result['machine']."</a>
                        <p><strong class=\"red\">Issue : </strong>".$result['issue']."</p>
                        <p><small class=\"dark\">".ucwords($result['user'])." - </small> <small class=\"blue\">".humanTiming($result['dt'])." ago</small>
                        </p>
                      </div>
                    </li>
                    ";
                };
            ?>
            
          </ul>
    </div>        

      </div>


    </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile fixed_height_450">
      <div class="x_title">
        <h2>Supply Requirements</h2>
        <ul class="nav navbar-right panel_toolbox" style="min-width:auto !important;">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
        <div class="bs-glyphicons">
            <ul class="bs-glyphicons-list">
                <a href="supply-list.php?status=Pending">
                    <li>
                  <span class="glyphicon" aria-hidden="true"><b> <?php echo $total  = count_data("supply", "del = 'N' and status ='Pending' ".$dt_range);?></b></span>
                  <span class="glyphicon-class">Pending</span>
                    </li>
                </a>
                
                <a href="supply-list.php?status=Escalated">
                <li class="active_tab">
                  <span class="glyphicon" aria-hidden="true"><b><?php echo $total  = count_data("supply", "del = 'N' and status ='Escalated' ".$dt_range);?></b></span>
                  <span class="glyphicon-class">Escalated</span>
                </li>
                </a>
                
                <a href="supply-list.php?status=Resolved">
                <li>
                  <span class="glyphicon" aria-hidden="true"><b><?php echo $total  = count_data("supply", "del = 'N' and status ='resolved' ".$dt_range);?></b></span>
                  <span class="glyphicon-class">Delivered</span>
                </li>
                </a>
            </ul>
        </div> 
      <div class="x_content">
        <h4><?php echo $total  = count_data("supply", "del = 'N' ".$dt_range);?> Supplies Required & <?php echo $obtained  = count_data("supply", "del = 'N' and status = 'resolved' ".$dt_range);?> Delivered.</h4>
          <?php
          if((($obtained)>0) && (($total)>0)){
            $percentage  = round(($obtained/$total)*100);      
          }else{
            $percentage = 0;
          }
        ?>
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>From <?php echo date('M-y', $from);?></span>
          </div>
          <div class="w_center w_55" style="width:70%;">
            <div class="progress">
              <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage;?>%;">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
          <h4>Pending Supplies <span class="xs_link"><a href="supply-list.php?status=Pending">View All</a></span></h4>  
        <div class="scroll">
            <ul class="list-unstyled top_profiles">
             <?php
                $sql="select * from supply where status = 'pending' and del='N'".$dt_range." order by id DESC";
                $query = mysql_query($sql);
                while($result=mysql_fetch_array($query)){
                    print "
                    <li class=\"media event\">
                      <a class=\"pull-left profile_thumb\">
                        <i class=\"fa fa-user\"></i>
                      </a>
                      <div class=\"media-body\">
                        <a class=\"title\" href=\"#\">".$result['machine_id']."</a>
                        <p><strong class=\"red\">Reagent : </strong> ".$result['product_id']."<strong class=\"red\"> ( QTY ".$result['qty']." )</strong></p>
                        <p><small class=\"dark\">".ucwords($result['user'])." - </small> <small class=\"blue\">".humanTiming($result['dt'])." ago</small>
                        </p>
                        </p>
                      </div>
                    </li>
                    ";
                };
            ?>  
          </ul>
    </div>
      </div>
    </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile fixed_height_450">
      <div class="x_title">
        <h2>Stock Requirements</h2>
        <ul class="nav navbar-right panel_toolbox" style="min-width:auto !important;">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
        <div class="bs-glyphicons">
            <ul class="bs-glyphicons-list">
                <a href="stock-requirement-list.php?status=Pending">
                <li>
                  <span class="glyphicon" aria-hidden="true"><b> <?php echo $total  = count_data("stock_requirement", "del = 'N' and status ='Pending' ".$dt_range);?></b></span>
                  <span class="glyphicon-class">Pending</span>
                </li>
                </a>
                
                <a href="stock-requirement-list.php?status=Escalated">
                <li class="active_tab">
                  <span class="glyphicon" aria-hidden="true"><b><?php echo $total  = count_data("stock_requirement", "del = 'N' and status ='Escalated' ".$dt_range);?></b></span>
                  <span class="glyphicon-class">Escalated</span>
                </li>
                </a>
                
                <a href="stock-requirement-list.php?status=Resolved">
                <li>
                  <span class="glyphicon" aria-hidden="true"><b><?php echo $total  = count_data("stock_requirement", "del = 'N' and status ='resolved' ".$dt_range);?></b></span>
                  <span class="glyphicon-class">Delivered</span>
                </li>
                </a>
            </ul>
        </div>     
      <div class="x_content">
        <h4><?php echo $total  = count_data("stock_requirement", "del = 'N' ".$dt_range);?> Stock Requested & <?php echo $obtained  = count_data("stock_requirement", "del = 'N' and status = 'resolved' ".$dt_range);?> Provided.</h4>
        <?php
          if((($obtained)>0) && (($total)>0)){
            $percentage  = round(($obtained/$total)*100);      
          }else{
            $percentage = 0;
          }
        ?>
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>From <?php echo date('M-y', $from);?></span>
          </div>
          <div class="w_center w_55" style="width:70%;">
            <div class="progress">
              <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage;?>%;">
                <span class="sr-only">96% Complete</span>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
        </div>
          <h4>Pending Stock Rrquirements <span class="xs_link"><a href="stock-requirement-list.php?status=Pending">View All</a></span></h4>  
        <div class="scroll">
            <ul class="list-unstyled top_profiles">
             <?php
                $sql="select * from stock_requirement where status = 'pending' and del='N'".$dt_range." order by id DESC";
                $query = mysql_query($sql);
                while($result=mysql_fetch_array($query)){
                    print "
                    <li class=\"media event\">
                      <a class=\"pull-left profile_thumb\">
                        <i class=\"fa fa-user\"></i>
                      </a>
                      <div class=\"media-body\">
                        <a class=\"title\" href=\"#\">".$result['stock_item']."</a>
                        <p><strong class=\"red\">Required QTY : </strong> ".$result['qty']."</p>
                        <p><small class=\"dark\">".ucwords($result['user'])." - </small> <small class=\"blue\">".humanTiming($result['dt'])." ago</small>
                        </p>
                        </p>
                      </div>
                    </li>
                    ";
                };
            ?>   
          </ul>
    </div>
      </div>
    </div>
    </div>
</div>