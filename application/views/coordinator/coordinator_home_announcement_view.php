<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2>
          Announcement Home
          
          </h2>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <style type="text/css">
          #newann{
            margin-top: 20px;
            margin-bottom: 20px;
          }

        </style>
        <div class="col-lg-3 col-xs-2">
          <a href="<?php echo site_url('coordinator/view_new_home_announcement');?>"><button id="newann" type="button" class="btn btn-block btn-primary">New Announcement</button></a>
        </div>
        <section id="tableSection" class="content container-fluid">
          <div class="row" id="scheduleRow">
            <table id="table" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Name</th>
                
                  <th></th>
                  
                </tr>
              </thead>
              
              <tbody>
                <?php foreach($news as $row):?>
                  <tr>
                    <td><a href="#"><?php echo $row['news_title'];?></a></td>
                    <td id="del"><a href="<?php echo site_url('coordinator/delete_news/'.$row['news_id']);?>"><button type="button" value= "<?php echo $row['news_id'];?>" class="btn btn-block btn-danger">Delete</button></a></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
           
            
          </div>
        </div>
        <style type="text/css">
          #del{
            width: 50px;
          }
        </style>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->