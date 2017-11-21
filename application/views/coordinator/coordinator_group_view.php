
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

        <?php if($this->session->flashdata('fail')): ?>s
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4>
                <?php echo $this->session->flashdata('fail'); ?>
              </div>
          <?php endif; ?>
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-info"></i> Alert!</h4>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php endif; ?> 
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
                <?php foreach($group as $row):?>
                  <tr>
                    <td><a href="coordinatorGroupSpecific.html"><?php echo $row['GROUP_NAME'];?></a></td><!--isn't better to have it as thesis?-->
                    <td><?php echo $row['COURSE_CODE'];?></td>
                    <td><?php echo $row['SECTION'];?></td>
                    <td>
                      <button id="modal-panel-button" value="<?php echo $row['GROUP_ID'];?>" type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-panel">
                      <?php
                        $panels = 'None -';
                        $panels2 = '';
                        foreach($panel as $prow)
                        {
                          if($row['GROUP_ID']==$prow['group_id'])
                          {
                            $panels.=$prow['name'].', ';
                            $panels2.=$prow['name'].', ';
                          }
                        }
                        if($panels=='None -'){
                          echo substr(trim($panels), 0, -1);
                        }
                        else
                        {
                          echo substr(trim($panels2), 0, -1);
                        }
                        
                      ?>
                        <i class="fa fa-users"> </i>
                      </button>
                    </td>
                    <td>
                      <?php if($row['DEFENSE_DATE']==null):?>
                        <button value="<?php echo $row['GROUP_ID'];?>" type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-defensedate">
                        Set Date <i class="fa fa-fw fa-calendar-plus-o"> </i>
                        </button>
                      <?php else:?>
                        <?php 
                          $data_time = "";
                          $date_new = strtotime($row['DEFENSE_DATE']);
                          $formatted_date_new = date('d/m/Y', $date_new);
                          $time_new = strtotime($row['START_TIME']);
                          $formatted_time_new = date('g:i A', $time_new);
                          $date_time = $formatted_date_new.' - '.$formatted_time_new;
                        ?>
                        <button value="<?php echo $row['GROUP_ID'];?>" id="<?php echo $formatted_date_new;?>" type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-defensedate">
                        <?php echo $date_time;?> <i class="fa fa-fw fa-calendar-check-o"> </i>
                        </button>
                      <?php endif;?>
                    </td>
                    <td>
                      <button id="<?php echo $row['INITIAL_VERDICT'];?>" value="<?php echo $row['GROUP_ID'];?>" type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-verdict">   
                        <?php 
                          if($row['INITIAL_VERDICT']=='NOV')
                          {
                            echo 'No Verdict <i class="fa fa-question-circle noVerdictCircle"> </i> ';
                          }
                          else if($row['INITIAL_VERDICT']=='CP')
                          {
                            echo 'Conditional Pass <i class="fa fa-check-circle conditionalCircle">';
                          }
                          else if($row['INITIAL_VERDICT']=='F')
                          {
                            echo 'Fail <i class="fa fa-times-circle failCircle"> </i>';
                          }
                          else if($row['INITIAL_VERDICT']=='P')
                          {
                            echo 'Pass <i class="fa fa-check-circle successCircle"></i>';
                          }
                          else
                          {
                            echo 'Redefense  <i class="fa fa-refresh redefenseCircle"> </i>';
                          }
                        ?>
                      </button>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>


<div class="modal fade" id="modal-defensedate">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
  <a  href="<?php echo site_url('coordinator/view_group');?>"><button id="modal-defense-button" type="button" class="btn btn-primary pull-left">Save changes</button></a>
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
          <h4 id="modal-verdict-title" class="modal-title">Defense Verdict</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <a id="modal-verdict-pass" value="P" class="btn btn-app successBtn">
                <i class="fa fa-check"></i> Pass
              </a>
              <a id="modal-verdict-conditional-pass" value="CP" class="btn btn-app conditionalBtn">
                <i class="fa fa-check"></i> Conditional Pass
              </a>
              <a id="modal-verdict-fail" value="F" class="btn btn-app failBtn">
                <i class="fa fa-times"></i> Fail 
              </a>
              <a id="modal-verdict-no-verdict" value="NOV" class="btn btn-app noVerdictBtn">
                <i class="fa fa-question"></i> No Verdict
              </a>
              <a id="modal-verdict-redefense" value="RD" class="btn btn-app redefenseBtn">
                <i class="fa fa-refresh"></i> Redefense
              </a>
            </div>
          </div>  
        </div>
        <div class="modal-footer">
          <a  href="<?php echo site_url('coordinator/view_group');?>" ><button id="modal-verdict-button" onClick="edit_verdict()" type="button" class="btn btn-primary pull-left">Save changes</button></a>
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

            <div id="dynamicPanel">

           <div id="group_tags" class="post">
            <h4> <label>  Group Tags: </label> </h4><!--GROUP TAGS-->
            <span class="label regularLabel">Web Platform</span>
            <span class="label regularLabel">Web Application</span>
            <span class="label regularLabel">Information Technology</span>
          </div>


          <div class="post">

            <h4> <label>  Suggested Panelist: </label> </h4>      

            
             <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">  </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
                 <div class="row">

              <div  class="col-xs-4" id="suggestionOne">

                <div class="alert alert-success alert-dismissible">
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
                  <h4><i class="icon fa fa-user"></i> Oliver Malabanan </h4>
                  <h5> Assistant Professor </h5>
                  <div> 
                    <p>
                    <b> Specialization: </b> <br>
                    <span></span>
                    <span class="label regularLabel">Web Platform</span>
                    <span class="label regularLabel">Information Technology</span>
                    <span class="label regularLabel">Information Systems</span>
                    <span class="label regularLabel">Django Framework</span>
                    </p>
                  </div>
                  <div> 
                     <p>
                    <b> Common (2): </b> <br>
                    <span></span>
                    <span class="label regularLabel">Web Platform</span>
                    <span class="label regularLabel">Information Technology</span>
                    </p>
                  </div>
                </div>
              </div>
              <div  class="col-xs-4" id="suggestionThree">

                <div class="alert alert-success alert-dismissible">
                  <h4><i class="icon fa fa-user"></i> Fritz Flores  </h4>
                  <h5> Assistant Professor </h5>

              <div> 
                 <p>
                <b> Specialization: </b> <br>
                <span></span>
                <span class="label regularLabel">Information Technology</span>
                <span class="label regularLabel">Information Systems</span>
                <span class="label regularLabel">Django Framework</span>
                
                </p>

              </div>


              <div> 
                 <p>
                <b> Common (1): </b> <br>
                <span></span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>



                </div>


              </div>    

            </div>

            </div>
            <!-- /.box-body -->
          </div>




          </div>          


          <div class="post">

             <h4> <label>  Assign Panelist: </label> </h4> 

             <div class="row">

              <div class="col-xs-4">
               <div class="form-group">
                  <label>First Panelist</label>
                  <select class="form-control" id="firstPanelist">
                    <option>Oliver Malabanan</option>
                    <option>Geanne Franco</option>
                    <option>Fritz Flores</option>
                    <option>Renato Jose Molano</option>
                    <option>Thomas James Tiam-Lee</option>
                  </select>
                </div>  
              </div>

               
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Second Panelist</label>
                  <select class="form-control" id="secondPanelist">
                    <option>Oliver Malabanan</option>
                    <option>Geanne Franco</option>
                    <option>Fritz Flores</option>
                    <option>Renato Jose Molano</option>
                    <option>Thomas James Tiam-Lee</option>
                  </select>
                </div>  
              </div>

                

              <div class="col-xs-4">
                <div class="form-group">
                  <label>Third Panelist</label>
                  <select class="form-control" id="thirdPanelist">
                    <option>Oliver Malabanan</option>
                    <option>Geanne Franco</option>
                    <option>Fritz Flores</option>
                    <option>Renato Jose Molano</option>
                    <option>Thomas James Tiam-Lee</option>
                  </select>
                </div>  
              </div>

            </div>
          </div>


          <div class="post">

            <h4> <label>  Assigned Panelist: </label> </h4> 


            <div class="row" id="assignedPanel">


          <div id="firstPanelBox">
          <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Geanne Franco</h3>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <div> 
                 <p>
                Specialization (3): <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>


      <div id="secondPanelBox">
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Oliver Malabanan</h3>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <div> 
                 <p>
                Specialization (3): <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>




      <div id="thirdPanelBox">
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Fritz Flores</h3>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <div> 
                 <p>
                Specialization (3): <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

            </div>

              <a href="#" id="manualPanelButton"> + Manually Input The Panelist</a>

            <div>

      
    </div>
    </div>


          </div>


          <div id="manualPanel">

           <div class="post">
            <h4> <label>  Group Tags: </label> </h4>
            <span class="label regularLabel">Web Platform</span>
            <span class="label regularLabel">Web Application</span>
            <span class="label regularLabel">Information Technology</span>
          </div>


            <div class="post">

             <h4> <label>  Assign Panelist: </label> </h4> 

             <div class="row">

            <div class="col-xs-4">
               <div class="form-group">
                  <label>First Panelist</label>
                  <select class="form-control">
                    <option>Oliver Malabanan</option>
                    <option>Geanne Franco</option>
                    <option>Fritz Flores</option>
                    <option>Renato Jose Molano</option>
                    <option>Thomas James Tiam-Lee</option>
                  </select>
                </div>  
              </div>

               
                <div class="col-xs-4">
               <div class="form-group">
                  <label>Second Panelist</label>
                  <select class="form-control">
                    <option>Oliver Malabanan</option>
                    <option>Geanne Franco</option>
                    <option>Fritz Flores</option>
                    <option>Renato Jose Molano</option>
                    <option>Thomas James Tiam-Lee</option>
                  </select>
                </div>  
              </div>

                

                <div class="col-xs-4">
               <div class="form-group">
                  <label>Third Panelist</label>
                  <select class="form-control">
                    <option>Oliver Malabanan</option>
                    <option>Geanne Franco</option>
                    <option>Fritz Flores</option>
                    <option>Renato Jose Molano</option>
                    <option>Thomas James Tiam-Lee</option>
                  </select>
                </div>  
              </div>

            </div>
          </div>


          <div class="post">

            <h4> <label>  Assigned Panelist: </label> </h4> 


            <div class="row">

          <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Geanne Franco</h3>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <div> 
                 <p>
                Specialization (3): <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Oliver Malabanan</h3>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <div> 
                 <p>
                Specialization (3): <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Fritz Flores</h3>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <div> 
                 <p>
                Specialization (3): <br>
                <span></span>
                <span class="label regularLabel">Web Platform</span>
                <span class="label regularLabel">Web Application</span>
                <span class="label regularLabel">Information Technology</span>
                
                </p>

              </div>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

            </div>

              <a href="#" id="dynamicPanelButton"> + Input The Panelist With Suggestion</a>

            <div>

      
    </div>
    </div>


          </div>

        </div>









        <div class="modal-footer">

          <button id="modal_panel_button" type="button" class="btn btn-primary pull-left">Save changes</button> 
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