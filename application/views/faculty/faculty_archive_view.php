<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="Title">
        Thesis Archive
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="studentHome"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="studentThesisArchive.html">Archive</a></li>
      </ol>
    </section>

    <!-- Main content -->
        <section id="tableSection" class="content container-fluid">
          <div class="row" id="scheduleRow">
            <table id="table" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Specialization</th>
                  <th>Members</th>
                  <th>Panel</th>
                  
                </tr>
              </thead>
              
              <tbody>
                <?php foreach($thesis as $trow):?>
                  <tr>
                    <td><a href="<?php echo site_url('faculty/view_archive_specific/'.$trow['thesis_id']);?>"><?php echo $trow['thesis_title'];?></a></td>
                    <td>
                      <?php
                        $tags = '';
                        foreach($specialization as $srow)
                        {
                          if($trow['thesis_id']==$srow['thesis_id'])
                          {
                            $tags.=$srow['specialization'].', ';
                          }
                        }
                        echo substr(trim($tags), 0, -1);
                      ?>
                    </td>
                    <td>
                      <?php
                        $tags = '';
                        foreach($member as $mrow)
                        {
                          if($trow['thesis_id']==$mrow['thesis_id'])
                          {
                            $tags.=$mrow['name'].', ';
                          }
                        }
                        echo substr(trim($tags), 0, -1);
                      ?>
                    </td>
                    <td>
                      <?php
                        $tags = '';
                        foreach($panel as $prow)
                        {
                          if($trow['thesis_id']==$prow['thesis_id'])
                          {
                            $tags.=$prow['name'].', ';
                          }
                        }
                        echo substr(trim($tags), 0, -1);
                      ?>
                    </td>
                    
                  </tr>
                <?php endforeach;?>  
                
              </tbody>
            </table>
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-red">
                
                
              </div>
              
              
            </div>
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-yellow">
                
                
              </div>
              
              
              <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-green">
                  
                  
                </div>
                
              </div>
              <div class="row">
                <div class="col-lg-6 col-xs-4">
                  
                  <!-- /.box-header -->
                  <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    <ul class="todo-list">
                      
                    </ul>
                  </div>
                  <!-- /.box-body -->
                  
                </div>
              </div>
              <div class="col-lg-6 col-xs-4">
                
                <!-- /.box-header -->
                
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          </div>
        
        </section>
  </div>
  <!-- /.content-wrapper -->