
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

              <div class="active tab-pane" id="activity"><!--discussion tab--->
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
                <div class="form-group">
                  <label for="exampleInputFile"><font size="+1">Current Document:</label>
                    <a href="#">
                      <?php if(sizeof($submit) > 0):?>
                          <h3 class="box-title"><a href="<?php echo site_url('student/download_file/'.$submit['upload_name']);?>"><?php echo $submit['upload_name'];?></a></h3>
                      <?php else:?>
                        No document submitted
                      <?php endif;?>
                    </font></a> 
                  <p class="help-block"><font size="-1">Last upload was on: <?php echo $submit['upload_date_time'];?></font></p>

                </div>

                

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
                              if($row['USER_ID']==$student_data['user_id'])
                              {
                                echo '<div class="timeline-footer">
                                  <a class="btn btn-primary btn-xs">Edit</a>
                                  <a class="btn btn-danger btn-xs" href="'.site_url('faculty/delete_comment/'.$row['THESIS_COMMENT_ID']).'">Delete</a>
                                </div>';
                              }
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
                              if($row['USER_ID']==$student_data['user_id'])
                              {
                                echo '<div class="timeline-footer">
                                  <a class="btn btn-primary btn-xs">Edit</a>
                                  <a class="btn btn-danger btn-xs" href="'.site_url('faculty/delete_comment/'.$row['THESIS_COMMENT_ID']).'">Delete</a>
                                </div>';
                              }
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


              <div class="tab-pane" id="newUpload"><!--new upload tab-->
                <form action="<?php echo site_url('student/upload_file');?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                 <div class="form-group">
                  <label for="exampleInputFile"><font size="+1">Upload New Document Submission</font></label>
                  <input id="submission" type="file" name="userfile" size="20" />
                  <input id="upload1" type="submit" class="btn btn-success" value="upload" />
                  <p class="help-block"><font size="-1"> Last upload was on: <?php echo $submit['upload_date_time'];?></font></p>
                </div>
                </form>
              </div>

              <!-- /.tab-pane -->
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
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
              </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->