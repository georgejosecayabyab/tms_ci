
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
                    $date_new = strtotime($defense['DEF_DATE']);
                    $formatted_date_new = date('F d, Y', $date_new);
                    echo $formatted_date_new;?>
                  </a>
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
              <li><a href="#setMeeting" data-toggle="tab">Set Meeting</a></li>
              <li><a href="#settings" data-toggle="tab">Edit Group</a></li>
             
            </ul>

            <div class="tab-content">

              <div class="active tab-pane" id="activity">
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
              <div class="tab-pane" id="timeline">
                <div class="form-group">
                  <label for="exampleInputFile"><font size="+1">Current Document:</label>
                    <a href="#"><?php
                      if(sizeof($submit) > 0){
                        echo $submit['upload_name'];
                      }
                      else
                      {
                        echo 'No document submitted';
                      }
                     ?>
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


              <div class="tab-pane" id="newUpload">
                <form action="<?php echo site_url('student/upload_file');?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                 <div class="form-group">
                  <label for="exampleInputFile"><font size="+1">Upload New Document Submission</font></label>
                  <input id="submission" type="file" name="userfile" size="20" />
                  <input type="submit" value="upload" />
                  <p class="help-block"><font size="-1"> Last upload was on: upload date </font></p>
                </div>
                </form>
              </div>




              <div class="tab-pane" id="setMeeting">
                <form class="form-horizontal">
                 <div class="box box-solid bg-green-gradient" style="position: relative; left: 0px; top: 0px;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"><div class="datepicker datepicker-inline"><div class="datepicker-days" style=""><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">July 2017</th><th class="next">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day" data-date="1498348800000">25</td><td class="old day" data-date="1498435200000">26</td><td class="old day" data-date="1498521600000">27</td><td class="old day" data-date="1498608000000">28</td><td class="old day" data-date="1498694400000">29</td><td class="old day" data-date="1498780800000">30</td><td class="day" data-date="1498867200000">1</td></tr><tr><td class="day" data-date="1498953600000">2</td><td class="day" data-date="1499040000000">3</td><td class="day" data-date="1499126400000">4</td><td class="day" data-date="1499212800000">5</td><td class="day" data-date="1499299200000">6</td><td class="day" data-date="1499385600000">7</td><td class="day" data-date="1499472000000">8</td></tr><tr><td class="day" data-date="1499558400000">9</td><td class="day" data-date="1499644800000">10</td><td class="day" data-date="1499731200000">11</td><td class="day" data-date="1499817600000">12</td><td class="day" data-date="1499904000000">13</td><td class="day" data-date="1499990400000">14</td><td class="day" data-date="1500076800000">15</td></tr><tr><td class="day" data-date="1500163200000">16</td><td class="day" data-date="1500249600000">17</td><td class="day" data-date="1500336000000">18</td><td class="day" data-date="1500422400000">19</td><td class="day" data-date="1500508800000">20</td><td class="day" data-date="1500595200000">21</td><td class="day" data-date="1500681600000">22</td></tr><tr><td class="day" data-date="1500768000000">23</td><td class="day" data-date="1500854400000">24</td><td class="day" data-date="1500940800000">25</td><td class="day" data-date="1501027200000">26</td><td class="day" data-date="1501113600000">27</td><td class="day" data-date="1501200000000">28</td><td class="day" data-date="1501286400000">29</td></tr><tr><td class="day" data-date="1501372800000">30</td><td class="day" data-date="1501459200000">31</td><td class="new day" data-date="1501545600000">1</td><td class="new day" data-date="1501632000000">2</td><td class="new day" data-date="1501718400000">3</td><td class="new day" data-date="1501804800000">4</td><td class="new day" data-date="1501891200000">5</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2017</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month focused">Jul</span><span class="month active">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2010-2019</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year active focused">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year new">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2090</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="decade old">1990</span><span class="decade">2000</span><span class="decade active focused">2010</span><span class="decade">2020</span><span class="decade">2030</span><span class="decade">2040</span><span class="decade">2050</span><span class="decade">2060</span><span class="decade">2070</span><span class="decade">2080</span><span class="decade">2090</span><span class="decade new">2100</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-centuries" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2900</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="century old">1900</span><span class="century active focused">2000</span><span class="century">2100</span><span class="century">2200</span><span class="century">2300</span><span class="century">2400</span><span class="century">2500</span><span class="century">2600</span><span class="century">2700</span><span class="century">2800</span><span class="century">2900</span><span class="century new">3000</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black" style="">
              <div class="row">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
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