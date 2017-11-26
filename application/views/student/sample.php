<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CTP - Student | Group </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/select2.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
    page. However, you can choose any other skin. Make sure you
    apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/skins/skin-green.min.css">
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
      <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datepicker.css">
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
          <a href="studentHome.html" class="logo">
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
          <div class="user-panel">
            
            <div class="pull-left info">
              
            </div>
          </div>
          <!-- search form (Optional) -->
          
          <!-- /.search form -->
          <!-- Sidebar Menu -->
          <ul id="header" class="sidebar-menu" data-widget="tree">
            <li  class="header">MENU -STUDENT</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="studentHome.html"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="active"><a href="studentGroup.html"><i class="fa fa-users"></i> <span>Group</span></a></li>
            <li><a href="studentGroupSchedule.html"><i class="fa fa-clock-o"></i> <span>Group Schedule</span></a></li>
            <li><a href="studentForms.html"><i class="fa fa-sticky-note"></i> <span>Forms</span></a></li>
            <li><a href="studentThesisArchive.html"><i class="fa fa-archive"></i> <span>Archive</span></a></li>
            
            
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
          Team GNM
          </h1>
          <br>
          <ol class="breadcrumb">
            <li><a href="studentHome.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Group</a></li>
            <li class="active">Team GNM</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="img/team-2.png" alt="User profile picture">
                  <h3 class="profile-username text-center">CCS - CT Thesis Management Platform</h3>
                  
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Current Course</b> <a class="pull-right"> THES-2 </a>
                    </li>
                    <li class="list-group-item">
                      <b>Defense Date</b> <a class="pull-right"> Nov 10 2017</a>
                    </li>
                    <li class="list-group-item">
                      <b>Defense Venue</b> <a class="pull-right"> A1007</a>
                    </li>
                    
                  </ul>
                  
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Us</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-users margin-r-5"></i>Thesis Members</strong>
                  <p>
                    Vincent Ulap Camilon, Ralph Rainer Cobankiat, George Cayabyab, Jose Gabriel Mariano
                  </p>
                  <hr>
                  <strong><i class="fa fa-graduation-cap margin-r-5"></i>Thesis Adivser</i></strong>
                  <p>
                    Geanne Ross L. Franco
                  </p>
                  <hr>
                  <strong><i class="fa fa-pencil margin-r-5"></i> Specialization</strong>
                  <p>
                    
                    <span class="label regularLabel">Web Platform</span>
                    <span class="label regularLabel">Web Application</span>
                    <span class="label regularLabel">Information Technology</span>
                    <span class="label regularLabel">Information Systems</span>
                    <span class="label regularLabel">Django Framework</span>
                    
                  </p>
                  <hr>
                  
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Discussions</a></li>
                  <li><a href="#timeline" data-toggle="tab">Current Upload</a></li>
                  <li><a href="#newUpload" data-toggle="tab">New Upload</a></li>
                  <li><a href="#abstract" data-toggle="tab">Abstract</a></li>
                  <li><a href="#setMeeting" data-toggle="tab">Set Meeting</a></li>
                  <li><a href="#settings" data-toggle="tab">Edit Group</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <div class="row">
                          <div class="col-md-3">
                            <button type="button" class="btn btn-block btn-success" onclick="location.href='studentNewDiscussion.html';" id="discussion">Create New Discussion </button>
                          </div>
                        </div>
                        <img class="img-circle img-bordered-sm" src="img/003-user.png" alt="user image">
                        <span class="username">
                          <a href="studentDiscussionsSpecific.html">Current System Use</a>
                          
                        </span>
                        <span class="description">Ralph Cobankiat - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                      <ul class="list-inline">
                        
                      </li>
                      <li class="pull-right">
                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Replies
                        (2)</a></li>
                      </ul>
                      <br>
                    </div>
                    <!-- /.post -->
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="img/003-user.png" alt="user image">
                        <span class="username">
                          <a href="studentDiscussionsSpecific.html">Functionalities To Do #1</a>
                          
                        </span>
                        <span class="description">Jego Mariano - 10:30 PM Friday</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>
                      <ul class="list-inline">
                        
                      </li>
                      <li class="pull-right">
                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Replies
                        (5)</a></li>
                      </ul>
                      <br>
                    </div>
                    <!-- /.post -->
                    <!-- Post -->
                    
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <div class="form-group">
                      <label for="exampleInputFile"><font size="+1">Current Document:</label>
                      <a href="#">Submission1</font></a>
                      <p class="help-block"><font size="-1">Last upload was on: upload date</font></p>
                    </div>
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li class="time-label">
                        <span class="bg-green">
                          25 Oct. 2017
                        </span>
                      </li>
                      <li>
                        <i class="fa fa-check bg-green"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                          <h3 class="timeline-header"><a href="#">Geanne Franco</a> approved your document</h3>
                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                          </div>
                        </div>
                      </li>
                      
                      <li class="time-label">
                        <span class="bg-green">
                          20 Oct. 2017
                        </span>
                      </li>
                      <li>
                        <i class="fa fa-comment bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                          <h3 class="timeline-header"><a href="#">Geanne Franco</a> sent your group a comment</h3>
                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                          </div>
                        </div>
                      </li>
                      <li class="time-label">
                        <span class="bg-green">
                          10 Oct. 2017
                        </span>
                      </li>
                      <li>
                        <i class="fa fa-comment bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                          <h3 class="timeline-header"><a href="#">Jocelyn Cu</a> sent your group a comment</h3>
                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                          </div>
                        </div>
                      </li>
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                      
                    </ul>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="abstract">
                    <form action="/action_page.php" method="get">
                      <div class="row">
                        <div class="tab-content">
                          <div id="abstract" class="col-lg-9 col-xs-4">
                            
                            <div class="box-body">
                              <h3>Abstract</h3>
                              <textarea rows="10" cols="110"></textarea>
                              <div class="col-lg-1">
                              </div>
                              <button id="submitbtn" onclick="location.href='studentGroup.html';" type="button" class="btn btn-success">Save and Quit</button>
                              <button id="submitbtn2" onclick="location.href='studentGroup.html';" type="button" class="btn btn-danger">Exit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>   
                  </div>
                  
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Thesis Title</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Thesis Title">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Members</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Members">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Adviser</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Adviser">
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="inputName" class="col-sm-2 control-label">Specialization</label>
                        
                        <div class="col-sm-10">
                          <select class="form-control select2" multiple="multiple" data-placeholder="Select an area of specialization"
                            style="width: 100%;">
                            <option>Algorithms and Complexity</option>
                            <option>Architecture and Organization</option>
                            <option>Computational Science</option>
                            <option>Digital Signal Processing</option>
                            <option>Discrete Structure</option>
                            <option>Embedded and Control System</option>
                            <option>General Computer Science</option>
                            <option>Robotics</option>
                            <option>Software Engineering</option>
                            <option>Graphics and Visual Computing</option>
                            <option>Human-Computer Interaction</option>
                            <option>Information Management</option>
                            <option>Intelligent Systems</option>
                            <option>Net-centric computing</option>
                            <option>Operating Systems</option>
                            <option>Programming Languages</option>
                            <option>Social and Professional Issues</option>
                          </select>
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button id="submitbtn" onclick="location.href='facultyViewProfile.html';" type="button" class="btn btn-success">Save and Quit</button>
                          <button id="submitbtn2" onclick="location.href='facultyViewProfile.html';" type="button" class="btn btn-danger">Exit</button>
                          
                        </div>
                      </div>
                    </form>
                  </div>
                  
                  <div class="tab-pane" id="setMeeting">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker">
                    </div>
                  </div>

                  <div class="tab-pane" id="newUpload">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="exampleInputFile"><font size="+1">Upload New Document Submission</font></label>
                        <input type="file" id="submission">
                        <p class="help-block"><font size="-1"> Last upload was on: upload date </font></p>
                      </div>
                    </form>
                    
                  </div>
                  
                  
                  
                  <!-- /.content-wrapper -->
                  <!-- Main Footer -->
                  
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
                            <a href="studentViewProfile.html">
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
                            <a href="studentChangePassword.html">
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
                <script src="<?php echo base_url();?>js/jquery.min.js"></script>
                <script src=" <?php echo base_url();?>js/select2.full.min.js"></script>
                <script>
                $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
                });
                </script>
                <!-- Bootstrap 3.3.7 -->
                <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
                <!-- AdminLTE App -->
                <script src="<?php echo base_url();?>js/adminlte.min.js"></script>
                <!-- Optionally, you can add Slimscroll and FastClick plugins.
                Both of these plugins are recommended to enhance the
                user experience. -->
                <script src="<?php echo base_url();?>js/bootstrap-datepicker.min.js"></script>
                <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
                <script type="text/javascript">$('#datepicker').datepicker({
                autoclose: true
                })</script>
                
              </html>