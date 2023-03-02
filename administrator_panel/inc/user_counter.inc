<!-- top tiles -->
<div class="row tile_count">
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-users"></i> All Users (Approved)</span>
            <?php 
                $sql1 = "select count(*) as hr from users where status ='approved'";
                $count1 = mysql_fetch_array(mysql_query($sql1));
            ?>
            <div class="count green"><?php echo number_format($count1['hr']);?></div>
            <span class="count_bottom"><i class="green"><i class="fa fa-users"></i> All Categories</i></span>
        </div>
    </div>

     <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-users"></i> All User Requests</span>
            <?php 
                $sql1 = "select count(*) as pending from users where status ='approval-pending'";
                $count1 = mysql_fetch_array(mysql_query($sql1));
            ?>
            <div class="count red"><a href="users-list.php?status=approval-pending" class="red"><?php echo number_format($count1['pending']);?></a></div>
            <span class="count_bottom"><i class="fa fa-users"></i> Approval <i class="red">Pending</i></span>
        </div>
    </div>


    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-user"></i> Users</span>
            <?php 
                $sql1 = "select count(*) as lab from users where category = 'lab' and status ='approved'";
                $count1 = mysql_fetch_array(mysql_query($sql1));
            ?>
            <div class="count"><a href="users-list.php?status=approved&category=Lab"><?php echo number_format($count1['lab']);?></a></div>
            <span class="count_bottom"> <i class=""><i class="fa fa-flask"></i> Laboratory</i></span>
        </div>
    </div>


    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-user"></i> Users</span>
            <?php 
                $sql1 = "select count(*) as admin from users where category = 'Admin' and status ='approved'";
                $count1 = mysql_fetch_array(mysql_query($sql1));
            ?>
            <div class="count"><a href="users-list.php?status=approved&category=Admin"><?php echo number_format($count1['admin']);?></a></div> 
            <span class="count_bottom"> <i class=""><i class="fa fa-id-badge"></i> Admin</i></span>
        </div>
    </div>

    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-user"></i> Users</span>
            <?php 
                $sql1 = "select count(*) as ext from users where category = 'External' and status ='approved'";
                $count1 = mysql_fetch_array(mysql_query($sql1));
            ?>
            <div class="count"><a href="users-list.php?status=approved&category=External"><?php echo number_format($count1['ext']);?></a></div>
            <span class="count_bottom"> <i class=""><i class="fa fa-external-link-square"></i> External</i></span>
        </div>
    </div>

    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-user"></i> Users</span>
            <?php 
                $sql1 = "select count(*) as hr from users where category = 'HR' and status ='approved'";
                $count1 = mysql_fetch_array(mysql_query($sql1));
            ?>
            <div class="count"><a href="users-list.php?status=approved&category=HR"><?php echo number_format($count1['hr']);?></a></div>
            <span class="count_bottom"><i class=""><i class="fa fa-briefcase"></i> Human Resource</i></span>
        </div>
    </div>
</div>
<!-- /top tiles -->