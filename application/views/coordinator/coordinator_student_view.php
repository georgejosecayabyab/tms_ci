<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 id="Title">
          Thesis Archive
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="studentHome"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="studentThesisArchive.html">Archive</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section id="tableSection" class="content container-fluid">
          <div class="row" id="scheduleRow">
            
            <table id="table" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Section</th>
                  <th>Group</th>
                  <th>Status</th>
                </tr>
              </thead>
              
              <tbody>
                <?php foreach($student as $row):?>
                  <tr>
                    <td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                    <td>
                      <?php
                        foreach($course as $crow)
                        {
                          if($row['course_id']==$crow['course_id'])
                          { 
                            echo $crow['course_code'];
                          }
                        }
                      ?>
                    </td>
                    <td>
                      <?php
                        foreach($course as $crow)
                        {
                          if($row['course_id']==$crow['course_id'])
                          { 
                            echo $crow['section'];
                          }
                        }
                      ?>
                    </td>
                    <td><?php echo $row['group_name']?></td>
                    <td><?php echo $row['is_active'];?></td>
                  </tr>
                <?php endforeach;?>
                
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