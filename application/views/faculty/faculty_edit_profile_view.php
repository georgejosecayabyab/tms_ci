<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 id="Title">
        Edit Faculty Profile
        
        </h1>
        <ol class="breadcrumb">
          <li><a href="studentHome.html"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="studentGroup.html"><i class="fa fa-home"></i> Group</a></li>
          
        </ol>
      </section>
      <!-- Main content -->
      <section class="content container-fluid">
        
        <div class="row" id="scheduleRow">
          
          <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-red">
              
              
            </div>
          </div>
          <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-yellow">
              
              
            </div>
          </div>
          
          <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-green">
              
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-xs-8">
            <div class="box box-primary">
              
              <!-- /.box-header -->
              <div  class="box-body">
              </div >
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-8">
                    <input class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
               
                
                <div class="form-group ">
                  <label for="inputName" class="col-sm-2 control-label">Rank</label>
                  
                  <div class="col-sm-8">
                    <select class="form-control select2" data-placeholder="Select a Rank"
                      style="width: 100%;">
                      <?php foreach($all_rank as $row):?>
                        <option><?php echo $row['RANK'];?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputName" class="col-sm-2 control-label">Specialization</label>
                  
                  <div class="col-sm-8">
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
                  <label for="inputEmail" class="col-sm-2 control-label">Current Specializations</label>
                  <p>
                    
                    <span class="label regularLabel">Web Platform</span>
                    <span class="label regularLabel">Web Application</span>
                    <span class="label regularLabel">Information Technology</span>
                    <span class="label regularLabel">Information Systems</span>
                    <span class="label regularLabel">Django Framework</span>
                    
                  </p>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
              <ul class="todo-list">
                
              </ul>
            </div>
            <!-- /.box-body -->
            
          </div>
        </div>
        <div class="col-lg-12 col-xs-8">
          <div class="box box-primary">
            
          </div>
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