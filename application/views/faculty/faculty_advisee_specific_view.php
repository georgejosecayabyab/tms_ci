<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 id="Title">
      <?php echo $group['group_name'];?>
    </h1>
    <br>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('faculty');?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo site_url('faculty/view_advisee_list');?>">Advisees</a></li>
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
                <b>Defense Date</b> <a class="pull-right"><?php 
                $date_new = strtotime($defense['DEF_DATE']);
                $formatted_date_new = date('F d, Y', $date_new);
                echo $formatted_date_new;?></a>
              </li>
              <li class="list-group-item">
                <b>Defense Venue</b> <a class="pull-right"><?php echo $defense['VENUE'];?></a>
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
                foreach($member as $member_row)
                {
                  if($member_row['group_id']==$group['group_id'])
                  {
                    $list .= $member_row['first_name'].' '.$member_row['last_name'].', ';
                  }
                }
                echo substr(trim($list), 0, -1);
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
              <?php foreach($tag as $row):?>
              <span class="label regularLabel"><?php echo $row['specialization'];?></span>
              <?php endforeach;?>
              
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
            <li><a href="#timeline" data-toggle="tab">Current Document</a></li>
            <li><a href="#setMeeting" data-toggle="tab">Set Meeting</a></li>
          </ul>
          <!-- tab contents -->
          <div class="tab-content">
            <div class="active tab-pane" id="activity"><!-- DISCUSSION -->
              <div class="row">
                <div class="col-md-3">
                  <button type="button" class="btn btn-block btn-success" onclick="location.href='<?php echo site_url('faculty/view_new_discussion/'.$group['group_id']);?>';" id="discussion">Create New Discussion </button>
                </div>
              </div>
              <!-- DISCUSSION START -->
              <?php if(sizeof($discussion) > 0):?><!-- if there is discussion-->
                <?php foreach($discussion as $row):?>
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>img/003-user.png" alt="user image">
                        <span class="username">
                          <a href="<?php echo site_url('faculty/view_discussion_specific/'.$row['TOPIC_DISCUSSION_ID']);?>"><?php echo $row['TOPIC_NAME'];?></a><!-- topic -->
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
                      <a href="<?php echo site_url('faculty/view_discussion_specific/'.$row['TOPIC_DISCUSSION_ID']);?>" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>Replies
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
            <!-- DISCUSSION END -->
            </div><!-- END DISCUSSION -->
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline"><!-- VERDICT-->
              <!-- The timeline -->
              <!-- VERDICT START-->
              <ul class="timeline timeline-inverse">
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
            <div class="tab-pane" id="setMeeting">
              <form method="post" action="<?php echo site_url('faculty/validate_meeting');?>">
                <input type="hidden" name="group_id" id="group_id" value="<?php echo $group['group_id'];?>">
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
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
