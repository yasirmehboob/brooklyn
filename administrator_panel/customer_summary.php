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
    <title>Customer's Profile</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bigshop.css" rel="stylesheet" type="text/css" />
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />


    <!-- Datatable New Style sheet -->
    <link href="admin/plugin/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="admin/plugin/select2/css/select2.min.css" rel="stylesheet">
    <!-- Datatable New Style sheet -->

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
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
                            <h2>Manage Attributes</h2>
                            <div class="col-md-3 form-group pull-right top_search" style="margin-bottom:0;">
                                <a href="content-list.php?t=attribute_type" style="float:right">
                                    <button type="button" class="btn btn-primary"> <i class="fa fa-th-large"></i> Attribute Category</button>
                                </a>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-8">

                        <div class="card card-profile">
                            <div class="card-body">
                                <div class="media">
                                    <img src="http://via.placeholder.com/500x500" alt="">
                                    <div class="media-body">
                                        <h3 class="card-profile-name">Asma Hashmat <i class="fa fa-question-circle tx-warning mg-r-8"></i></h3>
                                        <p class="card-profile-position">Female - Islamabad.</p>
                                        <p>House No 12, Block L, Naval Enchorage. Islamabad, Pakistan.<br>
                                            +92-3366900371 <i class="fa fa-check tx-success mg-r-8"></i><br>
                                            asma48pk@gmail.com <i class="fa fa-question-circle tx-warning mg-r-8"></i>
                                        </p>

                                        <p class="mg-b-0">Member Sinice January 2022</p>
                                    </div><!-- media-body -->
                                </div><!-- media -->
                            </div><!-- card-body -->
                            <div class="card-footer">
                                <a class=" card-profile-direct" href="#"><b class="tx-primary">View as Client :</b> http://thmpxls.me/profile?id=katherine</a>
                                <div>
                                    <a href="">Edit Profile</a>
                                    <a href="">Last Login : 24-Nov-23</a>
                                </div>
                            </div><!-- card-footer -->
                        </div><!-- card -->


                        <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap mt-4">
                            <thead>
                                <tr>
                                    <th class="wd-15p">First name</th>
                                    <th class="wd-15p">Last name</th>
                                    <th class="wd-20p">Position</th>
                                    <th class="wd-15p">Start date</th>
                                    <th class="wd-10p">Salary</th>
                                    <th class="wd-25p">E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger</td>
                                    <td>Nixon</td>
                                    <td>System Architect</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td>t.nixon@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Garrett</td>
                                    <td>Winters</td>
                                    <td>Accountant</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                    <td>g.winters@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Ashton</td>
                                    <td>Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                    <td>a.cox@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Cedric</td>
                                    <td>Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                    <td>c.kelly@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Airi</td>
                                    <td>Satou</td>
                                    <td>Accountant</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                    <td>a.satou@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Brielle</td>
                                    <td>Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>2012/12/02</td>
                                    <td>$372,000</td>
                                    <td>b.williamson@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Herrod</td>
                                    <td>Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>2012/08/06</td>
                                    <td>$137,500</td>
                                    <td>h.chandler@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Rhona</td>
                                    <td>Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>2010/10/14</td>
                                    <td>$327,900</td>
                                    <td>r.davidson@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Colleen</td>
                                    <td>Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>2009/09/15</td>
                                    <td>$205,500</td>
                                    <td>c.hurst@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Sonya</td>
                                    <td>Frost</td>
                                    <td>Software Engineer</td>
                                    <td>2008/12/13</td>
                                    <td>$103,600</td>
                                    <td>s.frost@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jena</td>
                                    <td>Gaines</td>
                                    <td>Office Manager</td>
                                    <td>2008/12/19</td>
                                    <td>$90,560</td>
                                    <td>j.gaines@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Quinn</td>
                                    <td>Flynn</td>
                                    <td>Support Lead</td>
                                    <td>2013/03/03</td>
                                    <td>$342,000</td>
                                    <td>q.flynn@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Charde</td>
                                    <td>Marshall</td>
                                    <td>Regional Director</td>
                                    <td>2008/10/16</td>
                                    <td>$470,600</td>
                                    <td>c.marshall@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Haley</td>
                                    <td>Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>2012/12/18</td>
                                    <td>$313,500</td>
                                    <td>h.kennedy@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Tatyana</td>
                                    <td>Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>2010/03/17</td>
                                    <td>$385,750</td>
                                    <td>t.fitzpatrick@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Michael</td>
                                    <td>Silva</td>
                                    <td>Marketing Designer</td>
                                    <td>2012/11/27</td>
                                    <td>$198,500</td>
                                    <td>m.silva@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Paul</td>
                                    <td>Byrd</td>
                                    <td>Chief Financial Officer</td>
                                    <td>2010/06/09</td>
                                    <td>$725,000</td>
                                    <td>p.byrd@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Gloria</td>
                                    <td>Little</td>
                                    <td>Systems Administrator</td>
                                    <td>2009/04/10</td>
                                    <td>$237,500</td>
                                    <td>g.little@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Bradley</td>
                                    <td>Greer</td>
                                    <td>Software Engineer</td>
                                    <td>2012/10/13</td>
                                    <td>$132,000</td>
                                    <td>b.greer@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Dai</td>
                                    <td>Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>2012/09/26</td>
                                    <td>$217,500</td>
                                    <td>d.rios@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jenette</td>
                                    <td>Caldwell</td>
                                    <td>Development Lead</td>
                                    <td>2011/09/03</td>
                                    <td>$345,000</td>
                                    <td>j.caldwell@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Yuri</td>
                                    <td>Berry</td>
                                    <td>Chief Marketing Officer</td>
                                    <td>2009/06/25</td>
                                    <td>$675,000</td>
                                    <td>y.berry@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Caesar</td>
                                    <td>Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td>2011/12/12</td>
                                    <td>$106,450</td>
                                    <td>c.vance@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Doris</td>
                                    <td>Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td>2010/09/20</td>
                                    <td>$85,600</td>
                                    <td>d.wilder@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Angelica</td>
                                    <td>Ramos</td>
                                    <td>Chief Executive Officer</td>
                                    <td>2009/10/09</td>
                                    <td>$1,200,000</td>
                                    <td>a.ramos@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Gavin</td>
                                    <td>Joyce</td>
                                    <td>Developer</td>
                                    <td>2010/12/22</td>
                                    <td>$92,575</td>
                                    <td>g.joyce@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jennifer</td>
                                    <td>Chang</td>
                                    <td>Regional Director</td>
                                    <td>2010/11/14</td>
                                    <td>$357,650</td>
                                    <td>j.chang@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Brenden</td>
                                    <td>Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>2011/06/07</td>
                                    <td>$206,850</td>
                                    <td>b.wagner@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Fiona</td>
                                    <td>Green</td>
                                    <td>Chief Operating Officer</td>
                                    <td>2010/03/11</td>
                                    <td>$850,000</td>
                                    <td>f.green@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Shou</td>
                                    <td>Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>2011/08/14</td>
                                    <td>$163,000</td>
                                    <td>s.itou@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Michelle</td>
                                    <td>House</td>
                                    <td>Integration Specialist</td>
                                    <td>2011/06/02</td>
                                    <td>$95,400</td>
                                    <td>m.house@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Suki</td>
                                    <td>Burks</td>
                                    <td>Developer</td>
                                    <td>2009/10/22</td>
                                    <td>$114,500</td>
                                    <td>s.burks@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Prescott</td>
                                    <td>Bartlett</td>
                                    <td>Technical Author</td>
                                    <td>2011/05/07</td>
                                    <td>$145,000</td>
                                    <td>p.bartlett@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Gavin</td>
                                    <td>Cortez</td>
                                    <td>Team Leader</td>
                                    <td>2008/10/26</td>
                                    <td>$235,500</td>
                                    <td>g.cortez@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Martena</td>
                                    <td>Mccray</td>
                                    <td>Post-Sales support</td>
                                    <td>2011/03/09</td>
                                    <td>$324,050</td>
                                    <td>m.mccray@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Unity</td>
                                    <td>Butler</td>
                                    <td>Marketing Designer</td>
                                    <td>2009/12/09</td>
                                    <td>$85,675</td>
                                    <td>u.butler@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Howard</td>
                                    <td>Hatfield</td>
                                    <td>Office Manager</td>
                                    <td>2008/12/16</td>
                                    <td>$164,500</td>
                                    <td>h.hatfield@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Hope</td>
                                    <td>Fuentes</td>
                                    <td>Secretary</td>
                                    <td>2010/02/12</td>
                                    <td>$109,850</td>
                                    <td>h.fuentes@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Vivian</td>
                                    <td>Harrell</td>
                                    <td>Financial Controller</td>
                                    <td>2009/02/14</td>
                                    <td>$452,500</td>
                                    <td>v.harrell@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Timothy</td>
                                    <td>Mooney</td>
                                    <td>Office Manager</td>
                                    <td>2008/12/11</td>
                                    <td>$136,200</td>
                                    <td>t.mooney@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jackson</td>
                                    <td>Bradshaw</td>
                                    <td>Director</td>
                                    <td>2008/09/26</td>
                                    <td>$645,750</td>
                                    <td>j.bradshaw@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Olivia</td>
                                    <td>Liang</td>
                                    <td>Support Engineer</td>
                                    <td>2011/02/03</td>
                                    <td>$234,500</td>
                                    <td>o.liang@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Bruno</td>
                                    <td>Nash</td>
                                    <td>Software Engineer</td>
                                    <td>2011/05/03</td>
                                    <td>$163,500</td>
                                    <td>b.nash@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Sakura</td>
                                    <td>Yamamoto</td>
                                    <td>Support Engineer</td>
                                    <td>2009/08/19</td>
                                    <td>$139,575</td>
                                    <td>s.yamamoto@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Thor</td>
                                    <td>Walton</td>
                                    <td>Developer</td>
                                    <td>2013/08/11</td>
                                    <td>$98,540</td>
                                    <td>t.walton@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Finn</td>
                                    <td>Camacho</td>
                                    <td>Support Engineer</td>
                                    <td>2009/07/07</td>
                                    <td>$87,500</td>
                                    <td>f.camacho@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Serge</td>
                                    <td>Baldwin</td>
                                    <td>Data Coordinator</td>
                                    <td>2012/04/09</td>
                                    <td>$138,575</td>
                                    <td>s.baldwin@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Zenaida</td>
                                    <td>Frank</td>
                                    <td>Software Engineer</td>
                                    <td>2010/01/04</td>
                                    <td>$125,250</td>
                                    <td>z.frank@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Zorita</td>
                                    <td>Serrano</td>
                                    <td>Software Engineer</td>
                                    <td>2012/06/01</td>
                                    <td>$115,000</td>
                                    <td>z.serrano@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jennifer</td>
                                    <td>Acosta</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>2013/02/01</td>
                                    <td>$75,650</td>
                                    <td>j.acosta@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Cara</td>
                                    <td>Stevens</td>
                                    <td>Sales Assistant</td>
                                    <td>2011/12/06</td>
                                    <td>$145,600</td>
                                    <td>c.stevens@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Hermione</td>
                                    <td>Butler</td>
                                    <td>Regional Director</td>
                                    <td>2011/03/21</td>
                                    <td>$356,250</td>
                                    <td>h.butler@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Lael</td>
                                    <td>Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>2009/02/27</td>
                                    <td>$103,500</td>
                                    <td>l.greer@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jonas</td>
                                    <td>Alexander</td>
                                    <td>Developer</td>
                                    <td>2010/07/14</td>
                                    <td>$86,500</td>
                                    <td>j.alexander@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Shad</td>
                                    <td>Decker</td>
                                    <td>Regional Director</td>
                                    <td>2008/11/13</td>
                                    <td>$183,000</td>
                                    <td>s.decker@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Michael</td>
                                    <td>Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>2011/06/27</td>
                                    <td>$183,000</td>
                                    <td>m.bruce@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Donna</td>
                                    <td>Snider</td>
                                    <td>Customer Support</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                    <td>d.snider@datatables.net</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>


                    </div>


                    <div class="col-md-4">

                        <div class="card card-connection">
                            <div class="row row-xs">
                                <div class="col-md-4 tx-primary">14</div>
                                <div class="col-md-8">
                                    <p class="card-profile-position">Total No. of Orders Placed <br><a href="">ThemePixels, Inc.</a></p>
                                </div>
                            </div><!-- row -->
                            <hr>
                            <div class="row row-xs">
                                <div class="col-md-4 tx-default">23</div>
                                <div class="col-md-8">
                                    <p class="card-profile-position">Total Items Purchased <br><a href="">ThemePixels, Inc.</a></p>
                                </div>
                            </div><!-- row -->
                            <hr>
                            <div class="row row-xs">
                                <div class="col-md-4 tx-purple">13,845</div>
                                <div class="col-md-8">
                                    <p class="card-profile-position">Total Purchases <br><a href="">ThemePixels, Inc.</a></p>
                                </div>
                            </div><!-- row -->
                        </div><!-- card -->

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


    <!-- DataTables New -->
    <script src="admin/plugin/datatables/js/jquery.dataTables.js"></script>
    <script src="admin/plugin/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="admin/plugin/select2/js/select2.min.js"></script>
    <!-- DataTables New -->


    <script>
        $(function() {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                bLengthChange: false,
                searching: false,
                
                language: {
                    searchPlaceholder: 'Search Orders',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                    searching: false
                }
            });



            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });

    </script>

</body>

</html>
