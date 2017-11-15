<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="Title">
        Meetings
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">




      <div class="row" id="scheduleRow">
        <?php foreach($meeting as $row):?>
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
                if($row['CALENDAR']==$row['NOW'])
                {
                  echo 'Today';
                }
                else
                {
                  $date_new = strtotime($row['CALENDAR']);
                  $formatted_date_new = date('F d, Y', $date_new);
                  echo $formatted_date_new;
                }
                ?></h3>
                <p> <b> Time: </b><?php echo $row['START'].'-'.$row['END'];?></p>
                <p> <b> Venue: </b><?php echo $row['VENUE'];?></p>
              </div>
              <div class="icon">
              <i class="fa fa-calendar"></i>
              </div>
            </div>
          </div>
        <?php endforeach;?>
      </div>

      <div class="row">
      <div class="col-lg-12 col-xs-8">
      <div class="box box-primary">
            
            <!-- /.box-header -->
            <div  class="box-body">
            <h1>Important Dates for <?php echo $student_data['course_code']?></h1></div >
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                  <?php foreach($announcement as $row):?>
                  <li>
                    <div class="box-header with-border">
                      <h3 class="box-title"><?php echo $row['event_desc'];?></h3>
                    </div>
                  </li>
                <?php endforeach;?>
              </ul>
            </div>
            <!-- /.box-body -->
            
          </div>
      </div>    

       <div class="col-lg-12 col-xs-8">
      <div class="box box-primary">
           
            </div>
            <!-- /.box-header -->
          
            </div>
            <!-- /.box-body -->
          </div>
      </div>    
    </div>


   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->