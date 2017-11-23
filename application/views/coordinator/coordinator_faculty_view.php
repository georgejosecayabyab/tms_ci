<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 id="Title">Faculty</h1>
    <ol class="breadcrumb">

      <li><a href="<?php echo site_url('coordinator');?>"><i class="fa fa-home"></i> Home</a></li>
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
  <!-- Trigger the modal with a button -->
  <div class="row">
    <div class="col-lg-6 col-xs-4">
      <button id="addFaculty2" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Faculty</button>
    </div>
  </div>
  <!-- Modal -->
  <form method="POST" action="<?php echo site_url('coordinator/validate_faculty');?>" class="form-horizontal">
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Faculty</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="faculty_email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                  <input class="form-control" name="email" id="faculty_email" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="faculty_first_name" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-8">
                  <input class="form-control" name="first_name" id="faculty_first_name" placeholder="First Name">
                </div>
              </div>
              
              <div class="form-group">
                <label for="faculty_last_name" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-8">
                  <input class="form-control" name="last_name" id="faculty_last_name" placeholder="Last Name">
                </div>
              </div>
              
              <div class="form-group ">
                <label for="inputName" class="col-sm-2 control-label">Rank</label>
                
                <div class="col-sm-8">
                  <select name="rank" class="form-control" id="faculty_rank">
                    <?php foreach($all_rank as $row):?>
                      <option><?php echo $row['rank'];?></option>
                    <?php endforeach;?>
                    
                  </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <div class="row" align="center">
              <button id="submitbtn" onclick=create_faculty() type="submit" class="btn btn-success">Save and Quit</button>
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
            <th>Name</th>
            <th>Email</th>
            <th>Rank</th>
            <th># of Panels Assigned</th>
            <th># of Groups Supervised</th>
            <th>Status</th>
          </tr>
        </thead>
        
        <tbody>
          <?php foreach($faculty_detail as $row):?>
            <tr>
              <td><?php echo $row['NAME'];?></td>
              <td><?php echo $row['EMAIL'];?></td>
              <td><?php echo $row['RANK'];?></td>
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
    </div>
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->