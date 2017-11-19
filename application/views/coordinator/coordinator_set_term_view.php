<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 id="Title">
        Set Term
        
        </h1>
        <ol class="breadcrumb">
          <li><a href="studentHome.html"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="studentGroup.html"><i class="fa fa-home"></i> Group</a></li>
          
        </ol>
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
                  <label for="inputName" class="col-sm-2 control-label">Current Term</label>
                  <div class="col-sm-8">
                    <text><?php echo 'Term'.$term['term'].' AY '.$term['school_year_code'];?></text>
                  </div>
                </div>
                
                
                <div class="form-group ">
                  <label for="inputName" class="col-sm-2 control-label">Term</label>
                  
                  <div class="col-sm-8">
                    <span>
                      <select class="form-control select2" style="width: 100%;">
                        <option>Term 1</option>
                        <option>Term 2</option>
                        <option>Term 3</option>
                      </select>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">School Year</label>
                  <div class="col-sm-1">
                    <input class="form-control" id="inputName" placeholder="Year">
                  </div>
                </div>
                
                
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-4 col-xs-12">
                    </div>
                    <div class="col-lg-3 col-xs-12">
                      <form>
                        <button id="submitbtn" onclick="location.href='coordinatorSetTerm.html';" type="button" class="btn btn-success">Save and Quit</button>
                        <button id="submitbtn2" onclick="location.href='coordinatorSetTerm.html';" type="button" class="btn btn-danger">Exit</button>
                        
                      </form>
                    </div>
                  </div>
                </div>
                
              
              
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