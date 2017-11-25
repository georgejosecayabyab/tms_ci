<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 id="Title">
        Specialization
        
        
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
      <!-- Trigger the modal with a button -->
       <div class="row">
        <div class="col-lg-6 col-xs-4">
          <button id="addFaculty" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Specialization</button>
        </div>
      </div>
      <!-- Modal -->
      <form method="POST" action="<?php echo site_url('coordinator/validate_specialization');?>" class="form-horizontal">
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Specialty</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="specialization" class="col-sm-2 control-label">Specialty</label>
                  <div class="col-sm-8">

                    <input name="specialization" class="form-control" id="specialization" placeholder="Specialty">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row" align="center">
                  <button id="submitbtn" type="submit" class="btn btn-success">Save and Quit</button>
                  <a href="<?php echo site_url('coordinator/view_specialization');?>"><button id="submitbtn2" data-dismiss="modal" type="button" class="btn btn-danger">Exit</button></a>
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
                  <th>Specialty</th>
                  
                </tr>
              </thead>
              
              <tbody>
                <?php foreach($specialization as $row):?>
                  <tr>
                    <td><?php echo $row['specialization'];?></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
        
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->