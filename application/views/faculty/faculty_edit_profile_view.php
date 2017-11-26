<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 id="Title">
        Edit Faculty Profile
        
        </h1>
      </section>
      <!-- Main content -->
      
      <section class="content container-fluid">
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
              <div class="box-header"></div>
              <!-- /.box-header -->
              <div  class="box-body">
              
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <form class="form-horizontal" method="POST">
                <div class="form-group">
                  <label for="inputFirstName" class="col-sm-2 control-label">First Name</label>
                  <div class="col-sm-8">
                    <input class="form-control" id="inputFirstName" placeholder="Name" value="<?php echo $faculty_data['FIRST_NAME'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputLastName" class="col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-8">
                    <input class="form-control" id="inputLAstName" placeholder="Name" value="<?php echo $faculty_data['LAST_NAME'];?>">
                  </div>
                </div>
                
                <div class="form-group ">
                  <label for="inputName" class="col-sm-2 control-label">Rank</label>
                  <div class="col-sm-8">
                    <span>
                      <select class="form-control select2" style="width: 100%;">
                        <?php foreach($all_rank as $row):?>
                          <option><?php echo $row['RANK'];?></option>
                        <?php endforeach;?>

                        
                      </select>
                    </span>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="allSpecialization" class="col-sm-2 control-label">Specialization</label>
                  
                  <div class="col-sm-8">
                    <select id="tags" name="tags" class="form-control select2" multiple="multiple" data-placeholder="Select an area of specialization"
                      style="width: 100%;">
                      <?php foreach($all_tag as $row):?>
                        <option id="<?php echo $row['specialization_id'];?>"><?php echo $row['specialization'];?></option>
                      <?php endforeach;?>
                      <?php foreach($faculty_tag as $row):?>
                        <option id="<?php echo $row['SPECIALIZATION_ID'];?>" selected="selected"><?php echo $row['SPECIALIZATION'];?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
                
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-4 col-xs-12">
                    </div>
                    <div class="col-lg-3 col-xs-12">
                      <a href="<?php echo site_url('faculty/view_profile');?>"><button id="submit_tag"  name="submit_tag"  type="button" class="btn btn-primary">Save and Quit</button></a>
                      <a href="<?php echo site_url('faculty/view_profile');?>"><button id="submitbtn" type="button" class="btn btn-danger">Exit</button>
                    </div>
                  </div>
                </div>
              
              </form>
            </div>
            <!-- /.box-body -->
            
          </div>
        </div>
        <!-- /.modal -->
        
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->