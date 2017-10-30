<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 id="Title">
      <?php echo $group['group_name'];?>
    </h1>
    <br>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="facultyAdviseeInitial.html">Advisees</a></li>
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
                <b>Defense Date</b> <a class="pull-right"><?php 
                $date_new = strtotime($defense['DEF_DATE']);
                $formatted_date_new = date('F d, Y', $date_new);
                echo $formatted_date_new;?></a>
              </li>
              <li class="list-group-item">
                <b>Defense Venue</b> <a class="pull-right"><?php echo $defense['VENUE'];?></a>
              </li>
             
            </ul>

            <a href="#" class="btn btn-success btn-block"><b><i class="fa fa-gears margin-r-5"></i> Edit Group</b> </a>
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
            <li><a href="#timeline" data-toggle="tab">Verdict</a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
          <!-- tab contents -->
          <div class="tab-content">
            <div class="active tab-pane" id="activity"><!-- DISCUSSION -->
              <!-- DISCUSSION START -->
              <?php if(sizeof($discussion) > 0):?><!-- if there is discussion-->
                <?php foreach($discussion as $row):?>
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>img/003-user.png" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo $row['TOPIC_NAME'];?></a><!-- topic -->
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
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>Replies
                      <?php
                        $num = 0;
                        foreach($reply as $rep)
                        {
                          if($rep['GROUP_ID']==$row['GROUP_ID'])
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
                <!-- timeline time label -->
                
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-green"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

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
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-user bg-aqua"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-green">
                        3 Jan. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>
            <!-- /.tab-pane -->

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
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Specialization</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputExperience" placeholder="Specialization"></textarea>
                  </div>
                </div>
              
                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
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
