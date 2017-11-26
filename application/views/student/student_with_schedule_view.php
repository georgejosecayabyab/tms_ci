<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 id="Title">
      Schedule
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
        <div class="col-md-8">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h1> Your Schedule</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php if(sizeof($sched) >0):?>
                <?php 
                  $mo = "";
                  $tu = "";
                  $we = "";
                  $th = "";
                  $fr = "";
                  $sa = "";
                  foreach($sched as $row)
                  {
                    if($row['DAY'] == 'MO')
                    {
                      $mo .= $row['START'].'-'.$row['END'].'| ';
                    }
                    if($row['DAY'] == 'TU')
                    {
                      $tu .= $row['START'].'-'.$row['END'].'| ';
                    }
                    if($row['DAY'] == 'WE')
                    {
                      $we .= $row['START'].'-'.$row['END'].'| ';
                    }
                    if($row['DAY'] == 'TH')
                    {
                      $th .= $row['START'].'-'.$row['END'].'| ';
                    }
                    if($row['DAY'] == 'FR')
                    {
                      $fr .= $row['START'].'-'.$row['END'].'| ';
                    }
                    if($row['DAY'] == 'SA')
                    {
                      $sa .= $row['START'].'-'.$row['END'].'| ';
                    }
                  }
                ?>

                <span> <h4> Monday: </h3> 
                  <h4><?php echo $mo;?></h4></h3> 
                </span>
                <span> <h4> Tuesday: </h3> 
                  <h4><?php echo $tu;?></h4> </h3> 
                </span>
                <span> <h4> Wednesday: </h3> 
                  <h4><?php echo $we;?></h4>  </h3>
                </span>
                <span> <h4> Thursday: </h3> 
                  <h4><?php echo $th;?></h4> </h3> 
                </span>
                <span> <h4> Friday: </h3> 
                  <h4><?php echo $fr;?></h4> </h3> 
                </span>
                <span> <h4> Saturday: </h3> 
                  <h4><?php echo $sa;?></h4> </h3> 
                </span>
              <?php else:?>
                <span> <h4> No schedule yet</h4></span>
              <?php endif;?>
            </div>

            <div class="row">
              <div class="col-lg-1 col-xs-12">
              </div>
              <div class="col-lg-3 col-xs-12">
                <form>
                  <a href="<?php echo site_url('student/view_edit_schedule');?>"><button id="editSched" type="button" class="btn btn-success">Edit schedule</button></a>
                </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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