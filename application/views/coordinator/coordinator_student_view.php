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
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <center><h4><i class="icon fa fa-info"></i> Alert!</h4>
      <?php echo $this->session->flashdata('success'); ?></center>
    </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-lg-2 col-xs-4">
      <button id="addFaculty" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Student</button>
    </div>
    <div class="col-lg-6 col-xs-4">
      <button id="addFaculty" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Add Group</button>
    </div>
  </div>
  <!-- Modal 1 -->
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
  <!-- Modal2 -->

  <form method="POST" action="<?php echo site_url('coordinator/insert_group');?>" class="form-horizontal">
    <div id="user_id" hidden>

    </div>
    <div id="adviser_id" hidden>

    </div>
    <div id="myModal2" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Group</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="group_name" class="col-sm-2 control-label">Group Name</label>
              <div class="col-sm-8">
                <input class="form-control" name="group_name" id="group_name" placeholder="Group Name">
              </div>
            </div>
            <div class="form-group">
              <label for="thesis_title" class="col-sm-2 control-label">Thesis Title</label>
              <div class="col-sm-8">
                <input class="form-control" name="thesis_title" id="thesis_title" placeholder="Thesis Title">
              </div>
            </div>
            <div class="form-group">
              <label for="course" class="col-sm-2 control-label">Course</label>
              <div class="col-sm-8">
                <select class="form-control select2" id="course" name="course" style="width: 100%;">
                  <?php foreach($course as $row):?>
                    <option><?php echo $row['course_code'];?></option>
                  <?php endforeach;?>
                </select> 
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Adviser</label>
              <div class="col-sm-8">
                <select class="form-control select2" name="adviser" id="adviser" style="width: 100%;">
                  <?php foreach($faculty as $row):?>
                    <option value="<?php echo $row['user_id'];?>"><?php echo $row['last_name'].', '.$row['first_name'];?></option>
                  <?php endforeach;?>
                </select> 
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Members</label>
              <div id="group_members" class="col-sm-8">
                <h5>None</h5>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="row" align="center">
              <button id="add_group_submit" onclick="" type="submit" class="btn btn-success">Save and Quit</button>
              <button id="submitbtn2" data-dismiss="modal" type="button" class="btn btn-danger">Exit</button>
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
            <th></th>
            <th>Name</th>
            <th>Course</th>
            <th>Group</th>
            <th>Status</th>
          </tr>
        </thead>
        <div class="form-group">
          <tbody>
            <?php foreach($student as $row):?>
              <tr>
                <td><input name="<?php echo $row['USER_ID'];?>" type="checkbox" id="student_box"></td>
                <td><?php echo $row['NAME'];?></td>
                <td>
                  <?php
                    echo $row['COURSE_CODE'];
                  ?>
                </td>
                <td><?php echo $row['GROUP_NAME']?></td>
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
                  ?></td>
              </tr>
            <?php endforeach;?>
            
          </tbody>
        </div>
      </table>

    </div>
  
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->