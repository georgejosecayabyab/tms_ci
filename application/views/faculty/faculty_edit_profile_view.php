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
              <form class="form-horizontal">
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
                    <select id="allSpecialization" class="form-control select2" multiple="multiple" data-placeholder="Select an area of specialization"
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
                      <button id="submitbtn" onclick="location.href='<?php echo site_url('faculty/view_profile');?>'" type="button" class="btn btn-danger">Exit</button>
                      <button id="submit_edit"  type="button" class="btn btn-primary">Save and Quit</button>
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