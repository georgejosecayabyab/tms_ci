
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 id="Title">
          Input Schedule
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="facultyPanelInitial.html">Schedule</a></li>
           
          
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
         

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
             
            </div>
          </div>


          <div class="row">  
          <div class="col-xs-6">
          <div class="box-body">

           
             <div id="schedule">
          
                  <div style="width:100%; height: 50%; display: flex; flex-direction: row; justify-content: center;">
          
                <div id="target">
                </div>
              
                
            </div>

          </div>
       

          
          </div>
          </div>

        <div class="col-xs-5">
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <div  class="box-body">
            <h2>Legend</h2></div >
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                <li>
                  <div class="box-header with-border">
                        <h3 class="box-title">  Each Block Represent 1 Class Schedule</h3> <br><br>
                        <h3 class="box-title">  <canvas id="myCanvas" width="50" height="10" style="border:1px solid #000000; background: #bfbfbf">
                        </canvas> - Free Schedule</h3> <br>
                        <h3 class="box-title"> <canvas id="myCanvas" width="50" height="10" style="border:1px solid #000000; background: #6fdc6f">
                        </canvas> - Occupied Schedule</h3> </h3>
                        <div>
                          <div>
                            <br>
                            <a href="#" id="specialCase"> + Add a Special Case Schedule</a>
                            <br> ex: LASARE3/Nov 24/8AM-5PM
                          </div>
                          <br>
                          <div class="col-xs-10" id="specialField">
                          </div>
                          
                        </div>
                      </div>
                </li>
             
              </ul>
            </div>
            <!-- /.box-body -->
            
            </div>

            <div class="col-xs-5">
               
                <button id="submit"> Submit </button>

            </div>
       

            </div>


          
        
          <!-- /.box-body -->
          <div class="box-footer">
           
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->