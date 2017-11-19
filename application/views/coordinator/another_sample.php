<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> CTP - Thesis Coordinator | Group </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Include Required Prerequisites -->


  <!-- Include Date Range Picker -->

  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
    page. However, you can choose any other skin. Make sure you
    apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/skins/skin-green.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>css/datepicker/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
  </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <!-- Main Header -->
      <header class="main-header">
        <!-- Logo -->
        <a href="facultyHome.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>C</b>TT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>CT</b> THESIS</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- /.messages-menu -->
              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks Menu -->
              
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-user"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel (optional) -->
          
          <!-- search form (Optional) -->
          
          <!-- /.search form -->
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
            <li  class="header">MENU -COORDINATOR</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="coordinatorHome.html"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="active"><a href="coordinatorGroups.html"><i class="fa fa-users"></i> <span>Groups</span></a></li>
            <li><a href="coordinatorFaculty.html"><i class="fa fa-mortar-board"></i> <span>Faculty</span></a></li>
            <li><a href="coordinatorStudents.html"><i class="fa fa-user"></i> <span>Students</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-exclamation-circle"></i> <span>Announcements</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
            <ul class="treeview-menu" style="">
              <li><a href="coordinatorAnnouncements.html"><i class="fa fa-circle-o"></i> Home Announcements</a></li>
              <li><a href="index2.html"><i class="fa fa-circle-o"></i> Specific Announcements</a></li>
            </ul>
            <li><a href="coordinatorForms.html"><i class="fa fa-sticky-note"></i> <span>Forms</span></a></li>
            <li><a href="coordinatorMonitoringReport.html"><i class="fa fa-bar-chart"></i> <span>Monitoring Report</span></a></li>
            <li><a href="coordinatorThesisArchive.html"><i class="fa fa-archive"></i> <span>Archive</span></a></li>
            <li><a href="#"><i class="fa fa-calendar"></i> <span>Set Current Term <br> Current: 11/10/17 to 12/24/17</span></a></li>


          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 id="Title">
            Thesis Groups

          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            
          </ol>
        </section>
        <!-- Main content -->



        <section id="tableSection" class="content container-fluid">
          <div class="row" id="scheduleRow">
            <table id="table" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Group Name</th>
                  <th>Course</th>
                  <th>Section</th>
                  <th>Panel</th>
                  <th>Defense Date (mm/dd/yy)</th>
                  <th>Verdict</th>
                  
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td><a href="coordinatorGroupSpecific.html">Graduate ng Maaga</a></td>
                  <td>IT-THS1</td>
                  <td>S16</td>
                  <td> Loren Ipsum, Abc Def, Soar Clan </td>
                  <td>


                   <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-defensedate">
                    11/19/17 - 3:00 PM <i class="fa fa-fw fa-calendar-check-o"> </i>
                  </button>


                </td>
                <td>

                 <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-verdict">
                  Assign Verdict <i class="fa fa-info-circle"></i>
                </button>


              </td>

            </tr>
            <tr>
              <td><a href="coordinatorGroupSpecific.html">Team Best</a></td>
              <td>IT-THS1</td>
              <td>S15</td>
              <td> Loren Ipsum, Abc Def, Soar Clan </td>
              <td>

               <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-defensedate">
                Set Date <i class="fa fa-fw fa-calendar-plus-o"> </i>
              </button>


            </td>
            <td>
              <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-verdict">
               Redefense  <i class="fa fa-refresh redefenseCircle"> </i>
             </button>



           </td>

         </tr>
         <tr>
          <td><a href="coordinatorGroupSpecific.html"> Team C</a></td>
          <td>IT-THS3</td>
          <td>S14</td>
          <td> 

            <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-panel">
              Oli Malabanan, Geanne Franco, Fritz Flores <i class="fa fa-users"> </i>
            </button>

          </td>
          <td>
           <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-defensedate">
            11/19/17 - 3:00 PM <i class="fa fa-fw fa-calendar-check-o"> </i>
          </button>
        </td>
        <td> <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-verdict">

          Conditional Passed <i class="fa fa-check-circle conditionalCircle"></td>

        </button>

      </tr>

      <tr>
        <td><a href="coordinatorGroupSpecific.html"> Team C</a></td>
        <td>IT-THS3</td>
        <td>S14</td>
        <td> Loren Ipsum, Abc Def, Soar Clan </td>
        <td>

         <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-defensedate">
          11/19/17 - 3:00 PM <i class="fa fa-fw fa-calendar-check-o"> </i>
        </button>


      </td>
      <td>  <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-verdict"> Pass <i class="fa fa-check-circle successCircle"></i> </button></td>

    </tr>

    <tr>
      <td><a href="coordinatorGroupSpecific.html"> Team D</a></td>
      <td>IT-THS1</td>
      <td>S15</td>
      <td> Loren Ipsum, Abc Def, Soar Clan </td>
      <td>

       <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-defensedate">
        Set Date <i class="fa fa-fw fa-calendar-plus-o"> </i>
      </button>


    </td>
    <td>

     <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-verdict">
      No Verdict <i class="fa fa-question-circle noVerdictCircle"> </i> </button>


    </td>

  </tr>
  <tr>
    <td><a href="coordinatorGroupSpecific.html"> Team Z</a></td>
    <td>IT-THS1</td>
    <td>S15</td>
    <td> Loren Ipsum, Abc Def, Soar Clan </td>
    <td>

     <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-defensedate">
      Set Date <i class="fa fa-fw fa-calendar-plus-o"> </i>
    </button>


  </td>
  <td>

   <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-verdict">

     Fail <i class="fa fa-times-circle failCircle"> </i>

   </button>


 </td>

</tr>

</tbody>
</table>


<div class="modal fade" id="modal-defensedate">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Assign Defense Date</h4>
        </div>



        <div class="modal-body">
          <div id="suggestionSched">
            <div class="form-group">
             <h4> <label>  Date: </label> </h4>

             <div class="row">
              <div class="col-xs-8">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
              </div>
            </div>
            <br>

            <div class="form-group">
             <h4> <label>Free Schedule:</label> </h4>

             <div id="suggestion"> 
               Select a date for suggestions
             </div>

             <div id="conflict"> 
             </div>

           </div>



           <h4> <label>Time:</label> </h4>



           <div id="timePickedSuggested">



           </div>

           <br>

           <div class="row">
            <div class="col-xs-2">

             <select class="form-control" id="startHour">
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
              <option>11</option>
            </select>
          </div>

          <div class="col-xs-2">
            <select class="form-control" id="startMinute">
              <option>00</option>
              <option>15</option>
              <option>30</option>
              <option>45</option>

            </select>
          </div>

          <div class="col-xs-1">
            <select class="median" id="startMedDynamic">
              <option>AM</option>
              <option>PM</option>                 
            </select>
          </div>

          <div class="col-xs-2">

           <select class="form-control" id="endHour">

            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
          </select>
        </div>

        <div class="col-xs-2">
          <select class="form-control" id="endMinute">
            <option>00</option>
            <option>15</option>
            <option>30</option>
            <option>45</option>

          </select>
        </div>

        <div class="col-xs-1">
          <select class="median" id="endMedDynamic">
            <option>AM</option>
            <option>PM</option>                 
          </select>
        </div>



      </div>


      <!-- /.input group -->

      <!-- /.form group -->
    </div>

    <div>

      <a href="#" id="manual"> + Manually Input The Schedule</a>

    </div>

  </div>


  <div id="manualSched">
    <div class="form-group">
     <h4> <label>  Date: </label> </h4>

     <div class="row">
      <div class="col-xs-8">
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="datepicker2">
        </div>
      </div>
    </div>
    <br>





    <h4> <label>Time:</label> </h4>



    <div id="timePickedManual">



    </div>

    <br>

    <div class="row">
      <div class="col-xs-2">

       <select class="form-control" id="startHourMan">
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
      </select>
    </div>

    <div class="col-xs-2">
      <select class="form-control" id="startMinuteMan">
        <option>00</option>
        <option>15</option>
        <option>30</option>
        <option>45</option>

      </select>
    </div>

    <div class="col-xs-1">
      <select class="form-control median" id="startMedManual">
        <option>AM</option>
        <option>PM</option>                 
      </select>
    </div>

    <div class="col-xs-2">

     <select class="form-control" id="endHourMan">

      <option>8</option>
      <option>9</option>
      <option>10</option>
      <option>11</option>
    </select>
  </div>

  <div class="col-xs-2">
    <select class="form-control" id="endMinuteMan">
      <option>00</option>
      <option>15</option>
      <option>30</option>
      <option>45</option>

    </select>
  </div>


  <div class="col-xs-1">
    <select class="form-control median"  id="endMedManual">
      <option>AM</option>
      <option>PM</option>                 
    </select>
  </div>


</div>


<!-- /.input group -->

<!-- /.form group -->
</div>

<div>

  <a href="#" id="suggested"> + Input The Schedule With Suggestions</a>

</div>

</div>

<br>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary pull-left">Save changes</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>



<div class="modal fade" id="modal-verdict">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Defense Verdict</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <a class="btn btn-app successBtn">
                <i class="fa fa-check"></i> Pass
              </a>
              <a class="btn btn-app conditionalBtn">
                <i class="fa fa-check"></i> Conditional Pass
              </a>
              <a class="btn btn-app failBtn">
                <i class="fa fa-times"></i> Fail 
              </a>
              <a class="btn btn-app noVerdictBtn">
                <i class="fa fa-question"></i> No Verdict
              </a>
              <a class="btn btn-app redefenseBtn">
                <i class="fa fa-refresh"></i> Redefense
              </a>
            </div>
          </div>  
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary pull-left">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="modal-panel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Defense Panel List</h4>
          </div>
          <div class="modal-body">


           <div class="post">
            <h4> <label>  Group Tags: </label> </h4>
            <span class="label regularLabel">Web Platform</span>
            <span class="label regularLabel">Web Application</span>
            <span class="label regularLabel">Information Technology</span>
          </div>


          <div class="post">

            <h4> <label>  Suggested Panel List: </label> </h4>      

            <div class="row">

              <div  class="col-xs-4" id="suggestionOne">

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-user"></i> Geanne Franco </h4>
                  <h5> Assistant Professor </h5>

              <div> 
                 <p>
                <b> Specialization: </b> <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                <span class="label regularLabel">Information Systems</span>
                <span class="label regularLabel">Django Framework</span>
                
                </p>

              </div>


              <div> 
                 <p>
                <b> Common (3): </b> <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>



                </div>


              </div>


             <div  class="col-xs-4" id="suggestionTwo">

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-user"></i> Oliver Malabanan </h4>
                  <h5> Assistant Professor </h5>

              <div> 
                 <p>
                <b> Specialization: </b> <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                <span class="label regularLabel">Information Systems</span>
                <span class="label regularLabel">Django Framework</span>
                
                </p>

              </div>


              <div> 
                 <p>
                <b> Common (3): </b> <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>



                </div>


              </div>
              <div  class="col-xs-4" id="suggestionThree">

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-user"></i> Fritz Flores  </h4>
                  <h5> Assistant Professor </h5>

              <div> 
                 <p>
                <b> Specialization: </b> <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                <span class="label regularLabel">Information Systems</span>
                <span class="label regularLabel">Django Framework</span>
                
                </p>

              </div>


              <div> 
                 <p>
                <b> Common (3): </b> <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>



                </div>


              </div>    

            </div>
          </div>          


          <div class="post">
          </div>


        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary pull-left">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


</div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->

  <!-- Default to the left -->

</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane active" id="control-sidebar-home-tab">

      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:;">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">View Profile</h4>
              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:;">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Edit Profile</h4>
              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
      </ul>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:;">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Logout Profile</h4>
              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
      </ul>

      <!-- /.control-sidebar-menu -->
    </div>
    <!-- /.tab-pane -->


  </div>
</aside>
<!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>js/adminlte.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url();?>js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {


    $('#manual').click( function () {


      $('#manualSched').css({
        display: "inline",
        visibility: "visible"
      });


      $("#suggestionSched").css({
        display: "none",
        visibility: "hidden"
      });

    });



    $('#suggested').click( function () {


      $("#suggestionSched").css({
        display: "inline",
        visibility: "visible"
      });

      $("#manualSched").css({
        display: "none",
        visibility: "hidden"
      });


    });


    $("#startHour,#startMinute,#endHour,#endMinute,#startMedDynamic,#endMedDynamic").change(function () {


      var firstHour =  $('#startHour').val();
      var firstMinute =  $('#startMinute').val();
      var firstMeridian = $('#startMedDynamic').val();
      var secondHour =  $('#endHour').val();
      var secondMinute =  $('#endMinute').val();
      var secondMeridian = $('#endMedDynamic').val();


      $("#timePickedSuggested").html("<h4>" + firstHour + ":" + firstMinute + " " + firstMeridian + " - " + secondHour + ":" + secondMinute + " " + secondMeridian + "</h4>");

    });



    $("#startHourMan,#startMinuteMan,#endHourMan,#endMinuteMan,#startMedManual,#endMedManual").change(function () {


      var firstHour =  $('#startHourMan').val();
      var firstMinute =  $('#startMinuteMan').val();
      var firstMeridian = $('#startMedManual').val();
      var secondHour =  $('#endHourMan').val();
      var secondMinute =  $('#endMinuteMan').val();
      var secondMeridian = $('#endMedManual').val();

      $("#timePickedManual").html("<h4>" + firstHour + ":" + firstMinute + " " + firstMeridian + " - " + secondHour + ":" + secondMinute + " " + secondMeridian + "</h4>");

    });
    

    $("#datepicker").change(function () {

      var dateVal =  $('#datepicker').val();
      

      // $("#suggestion").html("The free schedule for " + test + " is");

      $("#suggestion").html('<div class="alert alert-success alert-dismissible">\
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
        <h4><i class="icon fa fa-check"></i> Available Schedule for ' +  dateVal  + ' </h4>\
        <h5> <span> 8:00 AM - 12:00 PM | 2:00 PM - 4:00 PM | 6:00 PM - 9:00 PM </span>\
        </h5> \
        </div>');




      $("#conflict").html('<div class="alert alert-danger alert-dismissible">\
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
        <h4><i class="icon fa fa-ban"></i> Conflict Schedule for ' +  dateVal + ' </h4>\
        <span> Confict for the schedule of <b> Marivic Tangkeko </b> due to thesis defense at <b> 10:00 AM </b> </span> <br>\
        <span> Confict for the schedule of <b> Oli Malabanan </b> due to thesis defense at <b> 12:00 AM </b>   </span> \
        </div>');


    })


    $('#table').DataTable();

    $('#datepicker,#datepicker2').datepicker({
      autoclose: true
    });


  });
</script>
  <!-- Optionally, you can add Slimscroll and FastClick plugins.
  Both of these plugins are recommended to enhance the
  user experience. -->
</body>
</html>