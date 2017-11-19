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
                        <?php if($frow['course_code']==$row['course_code']):?>
                          <div class="col-lg-2 col-xs-2">
                            <a href="<?php echo site_url('coordinator/delete_form/'.$frow['form_id']);?>"><button id="delete_form" type="button" class="btn btn-block btn-danger">Delete</button></a>
                          </div>
                          <li>
                            <a href="#">
                              <span >
                                <i class="ion ion-clipboard"></i>
                              </span>
                              <span class="text">
                                <?php 
                                    echo $frow['form_name'];
                                ?>
                              </span>
                              
                            </a>
                          </li>
                        <?php endif;?>
                      <?php endforeach;?>
                    </ul>
                    <div id="upload" class="form-group">
                      <form action="<?php echo site_url('coordinator/upload_form/'.$row['course_code']);?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="form-group">
                          <label for="exampleInputFile"><font size="+1">Upload New Form for <?php echo $row['course_code'];?></font></label>
                          <input id="submission" type="file" name="userfile" size="20">
                          <input type="submit" value="upload">
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
            <?php endforeach;?>
          </div>
        </section>
      </div>
      <!-- /.content-wrapper -->