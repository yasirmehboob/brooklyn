<div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="margin-top:5em;">

            <div class="menu_section">
              <ul class="nav side-menu">
                
                <?php 
                $sql_nav = "select * from ornasys_mnu where user = '".$_SESSION['myusername']."' and del='N' order by sort,f_nm asc";
                $query_nav = mysql_query($sql_nav);
                while($nav = mysql_fetch_array($query_nav)){
                   
                   if($nav['folder']!=""){
                        $dir=$nav['folder'].'/';
                    }else{
                        $dir='';
                    }
                    
                    print "<li><a href=\"".$dir.$nav['f_lnk'].".php\"><i class=\"fa ".$nav['icon']."\"></i> ".$nav['f_nm']." </a></li>";
                };
                ?>
                
                <li><a><i class="fa fa-file-text-o"></i> Admin Reports <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <?php 
                        $sql_nav1 = "select * from ornasys_rep where user = '".$_SESSION['myusername']."' order by sort asc";
                        $query_nav1 = mysql_query($sql_nav1);
                        while($nav1 = mysql_fetch_array($query_nav1)){
                            if($nav1['binary_object']=='yes'){
                                $type = '-adv';
                            }else{
                                $type = '';
                            }

                            print "<li><a href=\"".$nav1['rep_nm'].".php\" target=\"_blank\"><!--<i class=\"fa ".$nav1['icon']."\"></i>--> ".$nav1['display_name']." </a></li>";
                        };
                    ?>    
                  </ul>
                </li>
                
                <li><a><i class="fa fa-cogs"></i> Manage <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <?php 
                        $sql_nav1 = "select * from ornasys_tbl where user = '".$_SESSION['myusername']."' order by sort asc";
                        $query_nav1 = mysql_query($sql_nav1);
                        while($nav1 = mysql_fetch_array($query_nav1)){
                            if($nav1['binary_object']=='yes'){
                                $type = '-adv';
                            }else{
                                $type = '';
                            }

                            print "<li><a href=\"content".$type."-list.php?t=".$nav1['tname_db']."\"><i class=\"fa ".$nav1['icon']."\"></i> ".$nav1['display_name']." </a></li>";
                        };
                    ?>    
                  </ul>
                </li>
                
              </ul>
            </div>

          </div>