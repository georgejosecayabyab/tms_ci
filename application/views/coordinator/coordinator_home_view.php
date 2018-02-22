<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Upcoming Defense Schedule
        
      </h2>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('coordinator');?>"><i class="fa fa-home"></i>Home</a>
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
                if($row['DEF_DATE']==$row['NOW'])
                {
                  echo 'Today';
                }
                else
                {
                  $date_new = strtotime($row['DEF_DATE']);
                  $formatted_date_new = date('F d, Y', $date_new);
                  echo $formatted_date_new;
                }
                ?></h3>
                <p> <b> Time: </b><?php echo $row['START'].'-'.$row['END'];?></p>
                <p> <b> Venue: </b><?php echo $row['VENUE'];?></p>
                <p> <b> Topic: </b><?php echo $row['THESIS_TITLE']?></p>
              </div>
              <div class="icon">
              <i class="fa fa-calendar"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endforeach;?>

      </div>

      <!-- /.box-body -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->