 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="Title">
        Advisees
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('faculty');?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Advisees</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


    

      <div class="row" id="groupsRow">
        <?php if(sizeof($advisee)>0):?>
          <?php foreach($advisee as $row):?>
              <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <p> <h3> <?php echo $row['GROUP_NAME'];?>  </h3> </p>
                  <div class="row">
                      <div class="col-lg-6">
                    
                      <p> <b> Thesis Topic: </b> <?php echo $row['THESIS_TITLE'];?> </p>
                      <p> <b> Members: </b>
                      <?php 
                        $list="";
                        foreach($member as $member_row)
                        {
                          if($member_row['group_id']==$row['GROUP_ID'])
                          {
                            $list .= $member_row['last_name'].', ';
                          }
                        }
                        echo substr(trim($list), 0, -1);

                      ?>
                      </p>
                      
                      <br>
                      </div>

                      <div class="col-lg-6">
                    
                      <p> <b> Discussion: </b> 
                        <?php
                          $num = 0;
                          foreach($discussion as $discuss)
                          {
                            if($discuss['GROUP_ID']==$row['GROUP_ID'])
                            {
                              $num = $discuss['COUNT'];
                            }
                          }
                          if($num > 0)
                          {
                            echo $num;
                          }
                          else
                          {
                            echo $num;
                          }
                        ?>
                      </p>
                      <p> <b> New Notifications: </b>
                        <?php
                          $num = 0;
                          foreach($notification as $notify)
                          {
                            if($notify['GROUP_NAME']==$row['GROUP_NAME'])
                            {
                              $num = $notify['NOTIF'];
                            }
                          }
                          if($num > 0)
                          {
                            echo $num;
                          }
                          else
                          {
                            echo $num;
                          }
                        ?>
                      </p>
                     
                      </div>

                  </div>

                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo site_url('faculty/view_advisee_specific/'.$row['GROUP_ID']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              </div>

          <?php endforeach;?>
        <?php else:?>
          <div class="col-lg-12 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <center>No Advisee Groups</center>
              </div>
            </div>
        <?php endif;?>
      </div>

      
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->