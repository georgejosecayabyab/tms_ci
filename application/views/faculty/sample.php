<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CTP - Faculty | Schedule </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/index.css">
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.weekly-schedule-plugin.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
            <li class="header">MENU -FACULTY</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="facultyHome.html"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li  class="active"><a href="facultySchedule.html"><i class="fa fa-clock-o"></i> <span>Schedule</span></a></li>
            <li><a href="facultyAdviseeInitial.html"><i class="fa fa-users"></i> <span>Advisees</span></a></li>
            <li><a href="facultyPanelInitial.html"><i class="fa fa-graduation-cap"></i> <span>Panels</span></a></li>
            <li><a href="facultyThesisArchive.html"><i class="fa fa-archive"></i> <span>Archive</span></a></li>
            
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
          Input Schedule
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="facultyPanelInitial.html">Schedule</a></li>
            
            
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
                
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6">
                <div class="box-body">
                  
                  <div id="schedule">
                    
                    <div style="width:100%; height: 50%; display: flex; flex-direction: row; justify-content: center;">
                      
                      <div id="target">
                      </div>
                      
                      
                    </div>
                  </div>
                  
                  
                </div>
              </div>
              <div class="col-xs-5">
                <div class="box box-primary">
                  
                  <!-- /.box-header -->
                  <div  class="box-body">
                  <h2>Legend</h2></div >
                  <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                  <ul class="todo-list">
                    <li>
                      
                      
                      <div class="box-header with-border">
                        <h3 class="box-title">  Each Block Represent 1 Class Schedule</h3> <br><br>
                        <h3 class="box-title">  <canvas id="myCanvas" width="50" height="10" style="border:1px solid #000000; background: #bfbfbf">
                        </canvas> - Free Schedule</h3> <br>
                        <h3 class="box-title"> <canvas id="myCanvas" width="50" height="10" style="border:1px solid #000000; background: #6fdc6f">
                        </canvas> - Occupied Schedule</h3> </h3>
                        <div>
                          <div>
                            <br>
                            <a href="#" id="specialCase"> + Add a Special Case Schedule</a>
                            <br> ex: LASARE3/Nov 24/8AM-5PM
                          </div>
                          <br>
                          <div class="col-xs-10" id="specialField">
                          </div>
                          
                        </div>
                      </div>
                      
                    </a>
                  </li>
                  
                </ul>
              </div>
              <!-- /.box-body -->
              
            </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                </div>
                <div class="col-lg-3 col-xs-12">
                  <form>
                    <button id="submitbtn"  type="button" class="btn btn-success">Save and Quit</button>
                    <button id="submitbtn2" onclick="location.href='facultyViewProfile.html';" type="button" class="btn btn-danger">Exit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            
          </div>
          
          
          <!-- /.box-body -->
          <div class="box-footer">
            
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->
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
              <a href="facultyViewProfile.html">
                <i class="menu-icon fa fa-user bg-green"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">View Profile</h4>
                  
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->
          
          <ul class="control-sidebar-menu">
            <li>
              <a href="facultyChangePassword.html">
                <i class="menu-icon fa fa-expeditedssl bg-green"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Change Password</h4>
                  
                </div>
              </a>
            </li>
          </ul>
          <ul class="control-sidebar-menu">
            <li>
              <a href="login.html">
                <i class="menu-icon fa fa-sign-out bg-green"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Logout</h4>
                  
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
  <!-- Bootstrap 3.3.7 -->
  <script src="js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>
  <script>
  
  $('.schedule').on('selectionmade', function() {
  console.log("Selection Made");
  }).on('selectionremoved', function() {
  console.log("Selection Removed");
  });
  $('#target').weekly_schedule({
  // Days displayed
  days: ["mon", "tue", "wed", "thu", "fri", "sat"],
  // Hours displyed
  hours: "7:30AM-9:00PM",
  // Font used in the component
  fontFamily: "Montserrat",
  // Font colot used in the component
  fontColor: "black",
  // Font weight used in the component
  fontWeight: "10000",
  // Font size used in the component
  fontSize: "0.8em",
  // Background color when hovered
  hoverColor: "#239023",
  // Background color when selected
  selectionColor: "#6fdc6f",
  // Background color of headers
  headerBackgroundColor: "transparent"
  
  });
  $('#specialCase').click(function (){
    $('#specialField').html('<input class="text form-control" placeholder="Subject/Date/Time" id="specialText"> </input>');
  });
  $("#submitbtn").click(
  function() {
  var test = $('#target').weekly_schedule("getSelectedHour");

   console.log(test);
  
  });
  </script>
  <!-- Optionally, you can add Slimscroll and FastClick plugins.
  Both of these plugins are recommended to enhance the
  user experience. -->
</body>
</html>