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
                  <th># of Panels Assigned</th>
                  <th># of Groups Supervised</th>
                  <th>Status</th>
                </tr>
              </thead>
              
              <tbody>
                <?php foreach($faculty_detail as $row):?>
                  <tr>
                    <td><?php echo $row['NAME'];?></td>
                    <td>
                      <?php
                        $panel_no = 'None';
                        foreach($panel as $prow)
                        {
                          if($row['USER_ID']==$prow['USER_ID'])
                          {
                            if($prow['PANEL'] > 0)
                            {
                              $panel_no = $prow['PANEL'];
                            }
                          }
                        }
                        echo $panel_no;
                      ?>
                    </td>
                    <td>
                      <?php
                        $group_no = 'None';
                        foreach($group as $grow)
                        {
                          if($row['USER_ID']==$grow['USER_ID'])
                          {
                            $group_no = $grow['GROUP'];
                          }
                        }
                        echo $group_no;
                      ?>
                    </td>
                    <td>
                      <?php 
                        if($row['IS_ACTIVE'] == 1)
                        {
                          echo 'Active';
                        } 
                        else
                        {
                          echo 'Inactive';
                        }
                      ?>  
                    </td>
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