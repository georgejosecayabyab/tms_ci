<!-- Content Wrapper. Contains page content -->
<<<<<<< HEAD
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
          <?php if($this->session->flashdata('fail')): ?>s
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <center><h4><i class="icon fa fa-info"></i> Alert!</h4>
                <?php echo $this->session->flashdata('fail'); ?></center>
              </div>
          <?php endif; ?>
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <center><h4><i class="icon fa fa-info"></i> Alert!</h4>
              <?php echo $this->session->flashdata('success'); ?></center>
            </div>
          <?php endif; ?>
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
=======
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
  <?php if($this->session->flashdata('fail')): ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center><h4><i class="icon fa fa-info"></i> Alert!</h4>
        <?php echo $this->session->flashdata('fail'); ?></center>
      </div>
  <?php endif; ?>
  <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <center><h4><i class="icon fa fa-info"></i> Alert!</h4>
      <?php echo $this->session->flashdata('success'); ?></center>
    </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-lg-6 col-xs-4">
      <button id="modalbutton" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Form</button>
    </div>
  </div>
  <!-- Modal -->
  <form action="<?php echo site_url('coordinator/upload_form');?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Form</h4>
          </div>
          <div class="modal-body">
            <div class="col-sm-8">
              <div id="upload" class="form-group">
                <label for="exampleInputFile">Upload new form</label>
                <input id="submission" type="file" name="userfile" size="20">
>>>>>>> 263988410e7e1598dd0e0c6fc49d44dd15bf6143
              </div>
            </div>
          <div class="form-group ">
            <div class="col-sm-8">
              <label for="inputName" class="col-sm-2 control-label">Course</label>
              <select class="form-control" name="course">
                <?php foreach($course as $row):?>
                  <option><?php echo $row['course_code'];?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row" align="center">
            <button id="submitbtn" type="submit" class="btn btn-success">Save and Quit</button>
            <button id="submitbtn2" onclick="location.href='facultyViewProfile.html';" data-dismiss="modal" type="button" class="btn btn-danger">Exit</button>
          </div>
        </div>
      </div>
    </div>
    </div>
  </form>
  <section id="tableSection" class="content container-fluid">
    <div class="row" id="scheduleRow">
      
      <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Form</th>
            <th>Course</th>
            <th></th>
          
          </tr>
        </thead>
        
        <tbody>
          <?php foreach($form as $row):?>
            <tr>
              <td><a href="<?php echo site_url('coordinator/download_form/'.$row['form_name']);?>"><?php echo $row['form_name'];?></a></td>
              <td><?php echo $row['course_code'];?></td>
              <td><a href="<?php echo site_url('coordinator/delete_form/'.$row['form_id']);?>"><button id="delete" type="button" class="btn btn-block btn-danger">Delete</button></a></td>
              
            </tr>
          <?php endforeach;?>
          
        </tbody>
      </table>
    </div>
    
  </section>
</div>
<!-- /.content-wrapper -->