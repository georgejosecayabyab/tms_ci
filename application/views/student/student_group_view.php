
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
                          <td><a href="<?php echo site_url('student/download_file/'.$row['upload_name']);?>"><?php echo $row['upload_name'];?></a></td>
                          <td><?php echo $row['upload_date_time'];?></td>
                          <td><a href="<?php echo site_url('student/download_file/'.$row['revision_name']);?>"><?php echo $row['revision_name'];?></a></td>
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
              <form method="post" action="<?php echo site_url('student/validate_meeting');?>">
                <div class="form-group">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="datepicker" id="datepicker">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Venue" class="control-label">Venue</label>
                  <input class="form-control" id="venue" name="venue" placeholder="venue">
                </div>

                <div class="form-group">
                  <button id="submitbtn" type="submit" class="btn btn-success">Set Meeting</button>
                  <button id="submitbtn2" type="button" class="btn btn-danger">Exit</button>
                </div>

                
              </form>
            </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->