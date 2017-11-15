<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 id="Title">
        Faculty Profile
        
        </h1>
      </section>
      <!-- Main content -->
       
      <section class="content">

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