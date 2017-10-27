
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="Title">
        Home
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">




      <div class="row" id="scheduleRow">
        <?php foreach($defense as $row):?>
          <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <?php 
              if($row['DIFF'] >= 14)
              {
                echo '<div class="small-box bg-blue">';
              }
              else if($row['DIFF'] >= 7)
              {
                echo '<div class="small-box bg-yellow">';
              }
              else
              {
                echo '<div class="small-box bg-red">';
              }
            ?>
              <div class="inner">
                <h3><?php 

                $date_new = strtotime($row['DEF_DATE']);
                $formatted_date_new = date('F d, Y', $date_new);
                echo $formatted_date_new;
                ?></h3>
                <p> <b> Time: </b><?php echo $row['START'].'-'.$row['END'];?></p>
                <p> <b> Venue: </b><?php echo $row['VENUE'];?></p>
                <p> <b> Topic: </b><?php echo $row['GROUP_NAME']?></p>
              </div>
              <div class="icon">
              <i class="fa fa-calendar"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endforeach;?>

      </div>



      <div class="row">
      <div class="col-lg-6 col-xs-4">
      <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Panel Notification</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                  <li>
                    <a href="facultyHome.html">
                       <span >
                        <i class="fa fa-comment-o"></i>
                      </span>
                  <span class="text">New Comment from CT-THESIS PORTAL</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 10:30 AM Oct 11, 2017</small>
                 </a>
                </li>
                  <li>
                      <a href="facultyHome.html">
                       <span >
                        <i class="fa fa-comment-o"></i>
                      </span>
               
                  <span class="text">New Comment from CSO Integrated System</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 10:30 AM Oct 11, 2017</small>
                 </a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            
          </div>
      </div>    

       <div class="col-lg-6 col-xs-4">
      <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Advicee Notification</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                  <li>
                    <a href="facultyHome.html">
                      <span >
                        <i class="fa fa-comment-o"></i>
                      </span>
               
                  <span class="text">New Comment from Team GNM</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 10:30 AM Oct 11, 2017</small>
                 </a>
                </li>
                  <li>
                      <a href="facultyHome.html">
                        <span >
                        <i class="fa fa-comment-o"></i>
                      </span>
               
                  <span class="text">New Comment from Loren Ipsum</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 10:30 AM Oct 11, 2017</small>
                 </a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
      </div>    
    </div>


   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  