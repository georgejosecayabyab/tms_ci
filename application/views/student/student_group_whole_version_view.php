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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
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
          <a href="<?php echo site_url('student');?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>C</b>TT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>CT</b>   THESIS</span>
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
                <li id="notification" class="dropdown notifications-menu">
                  <!-- Menu toggle button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span id="new_notification_number" class="label label-warning"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                      <!-- Inner Menu: contains the notifications -->
                      <ul id="notification_list" class="menu">
                        <!-- start notification -->
                          
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
              <li class="<?php echo $active_tab['home'];?>"><a href="<?php echo site_url('student/index');?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
              <li class="<?php echo $active_tab['group'];?>"><a href="<?php echo site_url('student/view_group/'.$group_id['group_id']);?>"><i class="fa fa-users"></i> <span>Group</span></a></li>
              <li class="<?php echo $active_tab['group_schedule'];?>"><a href="<?php echo site_url('student/view_schedule');?>"><i class="fa fa-clock-o"></i> <span>Group Schedule</span></a></li>
              <li class="<?php echo $active_tab['form'];?>"><a href="<?php echo site_url('student/view_forms');?>"><i class="fa fa-sticky-note"></i> <span>Forms</span></a></li>
              <li class="<?php echo $active_tab['archive'];?>"><a href="<?php echo site_url('student/view_archive');?>"><i class="fa fa-archive"></i> <span>Archive</span></a></li>
              
              
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
            <?php echo $group['group_name'];?>
          </h1>
          <br>
          <ol class="breadcrumb">
            <li><a href="studentHome.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Group</a></li>
            <li class="active"><?php echo $group['group_name'];?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php if($this->session->flashdata('fail')): ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <center><h4><i class="icon fa fa-info"></i> Alert!</h4>
              <?php echo $this->session->flashdata('fail'); ?></center>
            </div>
          <?php endif; ?>
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <center><h4><i class="icon fa fa-info"></i> Alert!</h4>
              <?php echo $this->session->flashdata('success'); ?></center>
            </div>
          <?php endif; ?> 


          <div class="row">

            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>img/team-2.png" alt="User profile picture">

                  <h3 class="profile-username text-center"><?php echo $group['thesis_title'];?></h3>

                 

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Current Course</b> <a class="pull-right"><?php echo $group['course_code'];?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Defense Date</b> <a class="pull-right">
                        <?php 
                          if(sizeof($defense)>0)
                          {
                            $date_new = strtotime($defense['DEF_DATE']);
                            $formatted_date_new = date('F d, Y', $date_new);
                            echo $formatted_date_new;
                          } 
                          else
                          {
                            echo 'None';
                          }
                          
                        ?>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <b>Defense Venue</b> <a class="pull-right">
                        <?php
                          if(sizeof($defense)>0)
                          {
                            echo $defense['VENUE'];
                          } 
                          else
                          {
                            echo 'None';
                          }
                        ?></a>
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
                   <?php
                    $list = "";
                    if(sizeof($member)>0)
                    {
                      foreach($member as $member_row)
                      {
                        if($member_row['group_id']==$group['group_id'])
                        {
                          $list .= $member_row['first_name'].' '.$member_row['last_name'].', ';
                        }
                      }
                      echo substr(trim($list), 0, -1);
                    }
                    else
                    {
                      echo 'None';
                    }
                  ?>
                  </p>

                  <hr>

                 <strong><i class="fa fa-graduation-cap margin-r-5"></i>Thesis Adivser</i></strong>

                  <p>
                    <?php echo $group['first_name'].' '.$group['last_name'];?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Specialization</strong>

                  <p>
                    <?php if(sizeof($tag)>0):?>
                      <?php foreach($tag as $row):?>
                        <span class="label regularLabel"><?php echo $row['specialization'];?></span>
                      <?php endforeach;?>
                    <?php else:?>
                      <?php echo 'None';?><!-- create + button for adding new tag-->
                    <?php endif;?>
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

                  <div class="active tab-pane" id="activity"><!--discussion tab-->
                    <!-- Post -->
                    <!-- discussion button-->
                    <div class="row">
                      <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-success" onclick="location.href='<?php echo site_url('student/view_new_discussion');?>';" id="discussion">Create New Discussion </button>
                      </div>
                    </div>
                    <!-- end of discussion button-->

                    <?php if(sizeof($discussion) > 0):?><!-- if there is discussion-->
                      <?php foreach($discussion as $row):?>
                        <!-- Post -->
                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>img/003-user.png" alt="user image">
                                <span class="username">
                                  <a href="<?php echo site_url('student/view_discussion_specific/'.$row['TOPIC_DISCUSSION_ID']);?>"><?php echo $row['TOPIC_NAME'];?></a><!-- topic -->
                                </span>
                            <span class="description"><!-- created by , date, time-->
                            <?php 
                              echo $row['NAME'].' - '.$row['TIME'].' ';
                              $date_new = strtotime($row['DATE']);
                              $formatted_date_new = date('F d, Y', $date_new);
                              echo $formatted_date_new;
                            ?></span>
                          </div>
                          <!-- /.user-block -->
                          <p>
                            <?php echo $row['TOPIC_INFO']?>
                          </p>
                          <ul class="list-inline">
                            
                            </li>
                            <li class="pull-right">
                              <a href="<?php echo site_url('student/view_discussion_specific/'.$row['TOPIC_DISCUSSION_ID']);?>" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>Replies
                              <?php
                                $num = 0;
                                foreach($reply as $rep)
                                {
                                  if($rep['TOPIC_DISCUSSION_ID']==$row['TOPIC_DISCUSSION_ID'])
                                  {
                                    $num = $rep['COUNT'];
                                  }
                                }
                                if($num > 0)
                                {
                                  echo '('.$num.')';
                                }
                                else
                                {
                                  echo '('.$num.')';
                                }
                              ?>
                              </a></li>
                          </ul>

                          <br>
                        </div>
                      <?php endforeach;?>
                    <?php else:?><!-- if there is none-->
                      <div class="post">
                        <div class="user-block">
                          <?php echo 'No Discussions';?>
                        </div>
                      </div>
                    <?php endif;?>
                    <!-- /.post -->


                    <!-- Post -->
                  
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="timeline"><!--current upload tab-->
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <?php 
                        //echo form_open('faculty/delete_comment');
                        echo '<input type="hidden" name="group_id" value="'.$group['group_id'].'">';
                        if(sizeof($comment)>0)
                        {
                          $date = '';
                          foreach($comment as $row)
                          {
                            if($date != $row['DATE'])
                            {
                              $date_new = strtotime($row['DATE']);
                              $formatted_date_new = date('F d, Y', $date_new);
                              $date = $row['DATE'];
                              echo '<li class="time-label">
                                <span class="bg-green">'
                                  .$formatted_date_new.'
                                </span>
                              </li>';
                              echo '<li>
                               <i class="fa fa-comments bg-green"></i>

                                <div class="timeline-item">
                                  <span class="time"><i class="fa fa-clock-o"></i>'.$row['TIME'].'</span>

                                  <h3 class="timeline-header"><a href="#">'.$row['COMMENTED BY'].'</a> commented</h3>

                                  <div class="timeline-body">'
                                    .$row['THESIS_COMMENT'].
                                  '</div>';
                                echo '</div>
                              </li>';
                            }
                            else
                            {
                              echo '<li>
                               <i class="fa fa-comments bg-green"></i>

                                <div class="timeline-item">
                                  <span class="time"><i class="fa fa-clock-o"></i>'.$row['TIME'].'</span>

                                  <h3 class="timeline-header"><a href="#">'.$row['COMMENTED BY'].'</a> commented</h3>

                                  <div class="timeline-body">'
                                    .$row['THESIS_COMMENT'].
                                  '</div>';
                                echo '</div>
                              </li>';
                            }
                          }
                        }
                        else
                        {
                          echo '
                            <li>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  No Comment
                                </div>
                              </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->';
                        }
                        //echo '</form>';
                      ?>
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                      
                    </ul>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings"><!--settings tab-->
                    <form class="form-horizontal" action="<?php echo site_url('student');?>"  method="post">
                    <div id="select_tags" hidden></div>
                      
                      
                      <div class="form-group ">
                        <label for="inputName" class="col-sm-2 control-label">Specialization</label>
                        
                        <div class="col-sm-10">
                          <select class="form-control select2" name="tags" id="tags" multiple="multiple" data-placeholder="Select an area of specialization"
                            style="width: 100%;">
                            <?php foreach($tag as $row):?>
                              <option selected><?php echo $row['specialization'];?></option>
                            <?php endforeach;?>
                            <?php foreach($tags as $row):?>
                              <option><?php echo $row['specialization'];?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <a href="<?php echo site_url('student/view_group/'.$group_id['group_id']);?>"><button id="submit_tag" type="button" class="btn btn-success">Save and Quit</button></a>
                          <button id="submitbtn2" onclick="location.href='facultyViewProfile.html';" type="button" class="btn btn-danger">Exit</button>
                          
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="abstract"><!--abstract tab-->
                    <form action="<?php echo site_url('student/validate_abstract');?>" method="post">
                      <input type="hidden" name="thesis_id" value="<?php echo $group['thesis_id'];?>">
                      <input type="hidden" name="group_id" value="<?php echo $group['group_id'];?>">
                      <div class="row">
                        <div class="tab-content">
                          <div id="abstract" class="col-lg-9 col-xs-4">
                            <div class="box-body">
                              <h3>Abstract</h3>
                              <textarea name="abstract_text" rows="10" cols="110"><?php echo $group['abstract'];?></textarea>
                              <div class="col-lg-1">
                              </div>
                              <button id="submitbtn" type="submit" class="btn btn-success">Save and Quit</button>
                              <a href=""><button id="submitbtn2" type="button" class="btn btn-danger">Exit</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>   
                  </div>
                  
                  <div class="tab-pane" id="setMeeting">
                    <form method="post" action="<?php echo site_url('student/set_meeting');?>">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="date" class="form-control pull-right" id="datepicker">
                      </div>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="venue" class="form-control pull-right" id="datepicker">
                      </div>
                      <button id="submitbtn" type="button" class="btn btn-success">Set Meeting</button>
                      <button id="submitbtn2" type="button" class="btn btn-danger">Exit</button>
                    </form>
                  </div>

                  <div class="tab-pane" id="newUpload"><!--new upload tab-->
                    
                    <form action="<?php echo site_url('student/validate_thesis_uploads');?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                      <div class="col-md-6"><!--upload document-->
                        <div class="form-group">
                          <label for="thesis_file"><font size="+1">Upload New Revised Document Submission</font></label>
                          <input id="thesis_file" type="file" name="thesis_file" size="20"> <!--document file to be uploaded-->
                          <p class="help-block"><font size="-1"> Last upload was on:<?php echo $submit['upload_date_time'];?></font></p>
                        </div>
                      </div>
                      <div class="col-md-3"></div>
                      <div class="col-md-6"> <!--upload revisions list-->
                        <div class="form-group">
                          <label for="revision_file"><font size="+1">Upload Associated Revisions List</font></label>
                          <input id="revision_file" type="file" name="revision_file" size="20" />
                          <p class="help-block"><font size="-1"> Last upload was on:<?php echo $submit['upload_date_time'];?></font></p>
                        </div>
                      </div>
                      <div style="center">
                        <button id="uploadForm" type="submit" name="upload_thesis_revision" class="btn btn-success">upload forms</button>
                      </div>
                    </form>
                    <section id="tableSection" class="content container-fluid">
                      <div class="col-lg-14">
                        <label for="table"> Archive</label>
                        <table id="table" class="display" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Document Name</th>
                              <th>Date Uploaded</th>
                              
                              <th>Revisions List</th>
                              
                            </tr>
                          </thead>
                          
                          <tbody>
                            <?php foreach($uploads as $row):?>
                              <tr>
                                <td><a href="facultyPanelSpecific.html"><?php echo $row['upload_name'];?></a></td>
                                <td><?php echo $row['upload_date_time'];?></td>
                                <td><a href="facultyPanelSpecific.html"><?php echo $row['revision_name'];?></a></td>
                              </tr>
                            <?php endforeach;?>
                          </tbody>
                        </table>
                        
                        <!-- END timeline item -->
                        <!-- timeline item -->
                      </div>
                    </section>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.box-body -->
                  
                  <!-- /.box-footer-->
                </div>
                <!-- /.box -->
              </section>
                  
                </div>
                
                
                
                <!-- /.content-wrapper -->
                <!-- Main Footer -->
                
                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                  <!-- Create the tabs -->
                  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><?php echo $student_data['last_name'].','.$student_data['first_name'];?><i class="fa fa-home"></i></a></li>
                    
                  </ul>
                  <!-- Tab panes -->
                    <div class="tab-content">
                      <!-- Home tab content -->
                      <div class="tab-pane active" id="control-sidebar-home-tab">
                         <ul class="control-sidebar-menu">
                          <li>
                            <a href="<?php echo site_url('student/logout');?>">
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
              <script src="<?php echo base_url();?>js/select2.full.min.js"></script>
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

              <script>/////create delete all tags of thssis, redirect
                $('#submit_tag').click(function(){
                  var sel = $('#tags').select2("val");
                  console.log(sel);

                  $.ajax({
                    type:'POST',
                    url: '/tms_ci/index.php/student/add_tags',
                    data: {'tags': sel},
                    success: function(data)
                    {
                      for(var x =0; x<data.length; x++)
                      {
                        console.log('tag is '+data[x]);
                      }
                    },
                    error: function(err)
                    {
                      console.log(err);
                    }
                  });
                });
              </script>

              <script>
                $(function () {
                  //Initialize Select2 Elements
                  $('.select2').select2()
                });
              </script>

              <!-- schedule-->
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


                $("#submit").click(function() {
                  var test = $('#target').weekly_schedule("getSelectedHour");
                  console.log(test);
                  $.ajax({
                    type:'POST',
                    url: '/tms_ci/index.php/student/delete_schedule',
                    success: function()
                    {
                      for(var i = 0; i<=5; i++){
                        var i2 = i+"";
                        var day = i;
                        $.ajax({
                          type:'POST',
                          url:'/tms_ci/index.php/student/insert_schedule',
                          data: {'data': test[i2], 'day': day},
                          success: function(data)
                          {
                            console.log('succes');
                            console.log('length is '+ JSON.stringify(data));
                          },
                          error: function(err)
                          {
                            console.log(err);
                          }

                        }); 
                      }

                      alert('Schedule has been uploaded!');
                    },
                    error: function(err)
                    {
                      console.log(err);
                    }
                  });

                  
                });
              </script>

              <!--notification refresh-->
              <script>
                var interval = 5000;
                get_new_notifications();
                get_all_notifications();

                function get_all_notifications()
                {
                  $.ajax({
                    type:'POST',
                    url:'http://[::1]/tms_ci/index.php/student/get_all_notifications',
                    success: function(data)
                    {
                      $('#notification_list').empty();
                      num = 10;
                      if(data.length < num)
                      {
                        num = data.length
                      }
                      for(i=0; i<num;i++)
                      {
                        $('#notification_list').append('<li><a href="#"><i class="fa fa-users text-aqua"></i>'+data[i].notification_details+'</a></li>');
                      }
                    },
                    error: function(data)
                    {
                      console.log('wrong!');
                    }
                  });
                }
                function get_new_notifications()
                {
                  $.ajax({
                    type: 'POST',
                    url:'http://[::1]/tms_ci/index.php/student/get_new_notifications',
                    success: function(data)
                    {
                      //$('#notification_list').empty();
                      console.log(data);
                      if(data.length > 0)
                      {
                        $('#new_notification_number').empty();
                        $('#new_notification_number').append(data.length);
                        get_all_notifications();
                      }
                      else
                      {
                        $('#new_notification_number').empty();
                      }

                    },
                    error: function(data, errorThrown)
                    {
                      console.log(errorThrown);
                    }
                  });
                }

                $('#notification').on('click',function()
                {
                  $.ajax({
                    type: 'POST',
                    url: 'http://[::1]/tms_ci/index.php/student/update_notification',          
                    success: function () {
                      console.log('none');
                      get_new_notifications();
                    },
                    error: function(data, errorThrown)
                    {
                      console.log(errorThrown);
                    }
                  });
                });

                

                setInterval(get_new_notifications, interval);
                setInterval(get_all_notifications, interval);
              </script>

              <!--editor-->
              <script>
                $(function () {
                  // Replace the <textarea id="editor1"> with a CKEditor
                  // instance, using default configuration.
                  CKEDITOR.replace('editor1')
                  //bootstrap WYSIHTML5 - text editor
                  $('.textarea').wysihtml5()
                })
              </script>

              <!---editor content-->
              <script>
                var editor = CKEDITOR.replace('editor1');
                $('#save_discussion').click(function() {
                  var topic_info = editor.getData();
                  var topic_name = $('#discussion_title').val();
                  $('#discussion_title').val(topic_name);
                  $('#editor1').val(topic_info);
                });

                function fill_in()
                {
                  var topic_info = editor.getData();
                  var topic_name = $('#discussion_title').val();
                  $('#discussion_title').val(topic_name);
                  $('#editor1').val(topic_info);
                  console.log('succe');
                  console.log($('#editor1').val());
                  console.log($('#discussion_title').val());
                }
              </script>

              <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

              <script type="text/javascript">
                $(document).ready(function() {
                  $('#table').DataTable();
                });
              </script>
              <script type="text/javascript">
                $('#datepicker,#datepicker2').datepicker({
                  autoclose: true
                });
              </script>
              
            </html>