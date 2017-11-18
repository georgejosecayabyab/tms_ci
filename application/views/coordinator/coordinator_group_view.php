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
                  <th>Defense Date (mm/dd/yy)</th>
                  <th>Verdict</th>
                  
                </tr>
              </thead>
              
              <tbody>
                <?php foreach($group as $row):?>
                    <tr>
                      <td><a href="coordinatorGroupSpecific.html"><?php echo $row['group_name'];?></a></td>
                      <td><?php echo $row['course_code'];?></td>
                      <td><?php echo $row['group_name'];?></td>
                      <td>
                        <?php 
                          if($row['defense_date']==null)
                          {
                            echo '<button>Set Date</button>';
                          }
                          else
                          {
                            $date_new = strtotime($row['defense_date']);
                            $formatted_date_new = date('d/m/Y', $date_new);
                            $time_new = strtotime($row['start_time']);
                            $formatted_time_new = date('g:i A', $time_new);
                            echo $formatted_date_new.' - '.$formatted_time_new;
                          }
                        ?>
                      </td>
                      <td>
                        <?php 
                          if($row['initial_verdict']=='NOV')
                          {
                            echo '<button>Set Verdict</button>';
                          }
                          else
                          {
                            echo $row['group_name'];
                          }
                        ?>
                      </td>
                      
                    </tr>

                <?php endforeach;?>
                <tr>
                  <td><a href="coordinatorGroupSpecific.html">Graduate ng Maaga</a></td>
                  <td>IT-THS1</td>
                  <td>S16</td>
                  <td>11/24/17 - 4PM</td>
                  <td><button>Assign Verdict</button></td>
                  
                </tr>
                <tr>
                  <td><a href="coordinatorGroupSpecific.html">Team Best</a></td>
                  <td>IT-THS1</td>
                  <td>S15</td>
                  <td><button>Set Date</button></td>
                  <td><button>Assign Verdict</button> </td>
                  
                </tr>
                
              </tbody>
            </table>
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-red">
                
                
              </div>
              
              
            </div>
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-yellow">
                
                
              </div>
              
              
              <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-green">
                  
                  
                </div>
                
              </div>
              <div class="row">
                <div class="col-lg-6 col-xs-4">
                  
                  <!-- /.box-header -->
                  <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    <ul class="todo-list">
                      
                    </ul>
                  </div>
                  <!-- /.box-body -->
                  
                </div>
              </div>
              <div class="col-lg-6 col-xs-4">
                
                <!-- /.box-header -->
                
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->