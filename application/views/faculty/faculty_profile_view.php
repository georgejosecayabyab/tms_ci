<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h2>
        Faculty Profile
        
        </h2>
      </section>
      <!-- Main content -->
       
      <section class="content">
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
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
         <div class="col-md-6">
          <div class="box box-solid">
            
            <!-- /.box-header -->
            <div id="viewprof" class="box-body">
              <div class="form-group">
              <dl class="dl-horizontal">
                <dt>Name</dt>
                <dd><?php echo $faculty_data['FIRST_NAME'].' '.$faculty_data['LAST_NAME'];?></dd>
                <dt>Rank</dt>
                <dd><?php echo $faculty_data['RANK'];?></dd>
                <dt>Current Specialization</dt>
                <dd>
              
                  <h5>  
                    <?php foreach($faculty_tag as $row):?>
                      <span class="label regularLabel"><?php echo $row['SPECIALIZATION'];?></span>
                    <?php endforeach;?>
                  </h5>
                
                </dd>
                
                
              </dl>
            </div>
            </div>
            <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-4 col-xs-12">
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <form>
                          <button id="submitbtn" onclick="location.href='<?php echo site_url('faculty/edit_profile');?>';" type="button" class="btn btn-block btn-primary">Edit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <!-- /.box-footer-->
      </section>
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->