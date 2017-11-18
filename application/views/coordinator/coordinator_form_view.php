<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 id="Title">
          Form Download Links
          
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            
          </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
          <div class="row">
            <?php foreach($course as $row):?>
              <div class="col-lg-6 col-xs-4">
                <div class="box box-primary">
                  <div class="box-header">

                    <h3 class="box-title"><?php echo $row['course_code'];?></h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    <ul class="todo-list">
                      <?php foreach($form as $frow):?>
                        <div class="col-lg-2 col-xs-2">
                          <button id="delete" type="button" class="btn btn-block btn-danger">Delete</button>
                        </div>
                        <li>
                          <a href="#">
                            <span >
                              <i class="ion ion-clipboard"></i>
                            </span>
                            <span class="text">
                              <?php 
                                echo $frow['form_name'];
                                if($frow['course_code']=$row['coruse_code'])
                                {
                                  
                                }
                              ?>
                                
                            </span>
                            
                          </a>
                        </li>
                      <?php endforeach;?>
                      <div class="col-lg-2 col-xs-2">

                        <button id="delete" type="button" class="btn btn-block btn-danger">Delete</button>
                      </div>
                      <li>
                        <a href="#">
                          <span >
                            <i class="ion ion-clipboard"></i>
                          </span>
                          <span class="text"> Form1.docx </span>
                          
                        </a>
                      </li>
                      <div class="col-lg-2 col-xs-2">

                        <button id="delete" type="button" class="btn btn-block btn-danger">Delete</button>
                      </div>
                      <li>
                        <a href="#">
                          <span >
                            <i class="ion ion-clipboard"></i>
                          </span>
                          
                          <span class="text"> Form2.docx </span>
                          
                        </a>
                      </li>
                    </ul>
                    <div id="upload" class="form-group">
                      <label for="exampleInputFile">Upload new form for THS-1</label>
                      <input type="file" id="exampleInputFile"> 
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
            <?php endforeach;?>
            <div class="col-lg-6 col-xs-4">
              <div class="box box-primary">
                <div class="box-header">
                  
                  <h3 class="box-title">THS-2</h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                  
                  <ul class="todo-list">
                    <div class="col-lg-2 col-xs-2">
                      <button id="delete" type="button" class="btn btn-block btn-danger">Delete</button>
                    </div>
                    <li>
                      <a href="#">
                        <span >
                          <i class="ion ion-clipboard"></i>
                        </span>
                        <span class="text"> Form1.docx </span>
                        
                        
                      </a>
                    </li>
                    <div class="col-lg-2 col-xs-2">
                      <button id="delete" type="button" class="btn btn-block btn-danger">Delete</button>
                    </div>
                    <li>
                      <a href="#">
                        <span >
                          <i class="ion ion-clipboard"></i>
                        </span>
                        
                        <span class="text"> Form2.docx </span>
                        
                      </a>
                    </li>
                  </ul>
                  <div id="upload" class="form-group">
                    <label for="exampleInputFile">Upload new form for THS-2</label>
                    <input type="file" id="exampleInputFile">
                    
                  </div>
                </div>
                <!-- /.box-body -->
                
              </div>
            </div>
            
          </section>
          <!-- /.content -->
          <section class="content container-fluid">
            <div class="row">
              <div class="col-lg-6 col-xs-4">
                <div class="box box-primary">
                  <div class="box-header">
                    
                    <h3 class="box-title">THS-3</h3>
                    
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    <ul class="todo-list">
                      <div class="col-lg-2 col-xs-2">
                        <button id="delete" type="button" class="btn btn-block btn-danger">Delete</button>
                      </div>
                      <li>
                        <a href="#">
                          <span >
                            <i class="ion ion-clipboard"></i>
                          </span>
                          <span class="text"> Form1.docx </span>
                          
                        </a>
                      </li>
                      <div class="col-lg-2 col-xs-2">
                        <button id="delete" type="button" class="btn btn-block btn-danger">Delete</button>
                      </div>
                      <li>
                        <a href="#">
                          <span >
                            <i class="ion ion-clipboard"></i>
                          </span>
                          
                          <span class="text"> Form2.docx </span>
                          
                        </a>
                      </li>
                    </ul>
                    <div id="upload" class="form-group">
                      <label for="exampleInputFile">Upload new form for THS-3</label>
                      <input type="file" id="exampleInputFile">
                      
                    </div>
                  </div>
                  <!-- /.box-body -->
                  
                </div>
              </div>
              <div class="col-lg-6 col-xs-4">
                <div class="box box-primary">
                  <div class="box-header">
                    
                    <h3 class="box-title">THS-4</h3>
                    
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    
                    <ul class="todo-list">
                      <div class="col-lg-2 col-xs-2">
                        <button id="delete" type="button" class="btn btn-block btn-danger">Delete</button>
                      </div>
                      <li>
                        <a href="#">
                          <span >
                            <i class="ion ion-clipboard"></i>
                          </span>
                          <span class="text"> Form1.docx </span>
                          
                          
                        </a>
                      </li>
                      <div class="col-lg-2 col-xs-2">
                        <button id="delete" type="button" class="btn btn-block btn-danger">Delete</button>
                      </div>
                      <li>
                        <a href="#">
                          <span >
                            <i class="ion ion-clipboard"></i>
                          </span>
                          
                          <span class="text"> Form2.docx </span>
                          
                        </a>
                      </li>
                    </ul>
                    <div id="upload" class="form-group">
                      <label for="exampleInputFile">Upload new form THS-4</label>
                      <input type="file" id="exampleInputFile">
                      
                    </div>
                  </div>
                  <!-- /.box-body -->
                  
                </div>
              </div>
              
            </section>
            <!-- /.content -->
          </div>
        </div>
        <!-- /.content-wrapper -->