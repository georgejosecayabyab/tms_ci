<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 id="Title">
    Students
    
    </h1>
    <ol class="breadcrumb">
      <li><a href="studentHome"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="studentThesisArchive.html">Archive</a></li>
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
      <button id="modalbutton" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Student</button>
    </div>
  </div>
  <!-- Modal -->
  <form action="<?php echo site_url('coordinator/validate_student');?>" method="POST" class="form-horizontal">
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Student</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-8">
                <input class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="first_name" class="col-sm-2 control-label">First Name</label>
              <div class="col-sm-8">
                <input class="form-control" id="first_name" name="first_name" placeholder="First Name">
              </div>
            </div>
            
            <div class="form-group">
              <label for="last_name" class="col-sm-2 control-label">Last Name</label>
              <div class="col-sm-8">
                <input class="form-control" id="last_name" name="last_name" placeholder="Last Name">
              </div>
            </div>
            <div class="form-group ">
              <label for="course" class="col-sm-2 control-label">Course</label>
              
              <div class="col-sm-8">
                <select class="form-control" id="course" name="course">
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
  <!-- Main content -->
  <section id="tableSection" class="content container-fluid">
    <div class="row" id="scheduleRow">
      
      <table id="table" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Group</th>
            <th>Status</th>
          </tr>
        </thead>
        
        <tbody>
          <?php foreach($student as $row):?>
            <tr>
              <td><?php echo $row['NAME'];?></td>
              <td>
                <?php
                  echo $row['COURSE_CODE'];
                ?>
              </td>
              <td><?php echo $row['GROUP_NAME']?></td>
              <td><?php echo $row['IS_ACTIVE'];?></td>
            </tr>
          <?php endforeach;?>
          
        </tbody>
      </table>

    </div>
  
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->