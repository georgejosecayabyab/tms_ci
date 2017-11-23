<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 id="Title">
          CT - Thesis Portal
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="facultyPanelInitial.html">Panels</a></li>
            <li class="active">CT - Thesis Platform</li>
            
          </ol>
        </section>
        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              
              <section id="tableSection" class="content container-fluid">
                <div class="row" id="scheduleRow">
                  <div class="col-lg-14">
                    <table id="table" class="display" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Document Name</th>
                          <th>Date Uploaded</th>
                          
                          <th>Revisions List</th>
                          
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php foreach($upload as $row):?>
                          <tr>
                            <td><a href="<?php echo site_url('faculty/view_panel_document/'.$row['group_id'].'/'.$row['upload_id']);?>"><?php echo $row['upload_name'];?></a></td>
                            <td><?php echo $row['upload_date_time'];?></td>
                            <td><a href="<?php echo site_url('faculty/view_panel_document/'.$row['group_id'].'/'.$row['upload_id']);?>"><?php echo $row['revision_name'];?></a></td>
                          </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                    
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    
                    
                    
                    
                  </div>
                  
                  <!-- /.box-body -->
                  
                  <!-- /.box-footer-->
                </div>
                <!-- /.box -->
              </section>
            </div>
            <!-- /.content -->
          </div>
        </section>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Create the tabs -->
          <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
              
              <ul class="control-sidebar-menu">
                <li>
                  <a href="facultyViewProfile.html">
                    <i class="menu-icon fa fa-user bg-green"></i>
                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">View Profile</h4>
                      
                    </div>
                  </a>
                </li>
              </ul>
              <!-- /.control-sidebar-menu -->
              
              <ul class="control-sidebar-menu">
                <li>
                  <a href="facultyChangePassword.html">
                    <i class="menu-icon fa fa-expeditedssl bg-green"></i>
                    <div class="menu-info">
                      <h4 class="control-sidebar-subheading">Change Password</h4>
                      
                    </div>
                  </a>
                </li>
              </ul>
              <ul class="control-sidebar-menu">
                <li>
                  <a href="login.html">
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