  <?php echo $this->session->flashdata('msg'); ?>
  <?php echo validation_errors(); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="Title">
        <?php echo $group['thesis_title'];?> ge
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('faculty');?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo site_url('faculty/view_panel_details');?>">Panels</a></li>
        <li class="active"><?php echo $group['thesis_title'];?></li>
        
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
        <div class="box-body">

         
          <br>
        
        </div>


        <div id="pdf">
          <?php if(sizeof($submit)>0):?>
            <iframe src = "<?php echo base_url();?>uploaded_thesis/<?php echo $submit['upload_name'];?>" width='1000' height='500' allowfullscreen webkitallowfullscreen></iframe><!-- url of pdf document. check if exists -->
          <?php else:?>
            No Document
          <?php endif;?>
          
        </div>
        <div id="pdf" >

        

        </div>

        <div  id="timeline">
          <!-- The timeline -->
          <ul class="timeline timeline-inverse">

            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-gray" id="panelComments">
                      Panel Comments
                  </span>
             <a href="#inputComment"><i id="addComment" class="fa fa-fw fa-plus-circle bg-blue"></i> </a>

            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <?php 
              //echo form_open('faculty/delete_comment');
              echo '<input type="hidden" name="group_id" value="'.$group['group_id'].'">';
              if(sizeof($comment)>0)
              {
                $date = '';
                foreach($comment as $row)
                {
                  if($date != $row['DATE'])
                  {
                    $date_new = strtotime($row['DATE']);
                    $formatted_date_new = date('F d, Y', $date_new);
                    $date = $row['DATE'];
                    echo '<li class="time-label">
                      <span class="bg-green">'
                        .$formatted_date_new.'
                      </span>
                    </li>';
                    echo '<li>
                     <i class="fa fa-comments bg-green"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i>'.$row['TIME'].'</span>

                        <h3 class="timeline-header"><a href="#">'.$row['COMMENTED BY'].'</a> commented</h3>

                        <div class="timeline-body">'
                          .$row['THESIS_COMMENT'].
                        '</div>';
                        if($row['USER_ID']==$faculty_data['USER_ID'])
                        {
                          echo '<div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Edit</a>
                            <a class="btn btn-danger btn-xs" href="'.site_url('faculty/delete_comment/'.$row['THESIS_COMMENT_ID']).'">Delete</a>
                          </div>';
                        }
                      echo '</div>
                    </li>';
                  }
                  else
                  {
                    echo '<li>
                     <i class="fa fa-comments bg-green"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i>'.$row['TIME'].'</span>

                        <h3 class="timeline-header"><a href="#">'.$row['COMMENTED BY'].'</a> commented</h3>

                        <div class="timeline-body">'
                          .$row['THESIS_COMMENT'].
                        '</div>';
                        if($row['USER_ID']==$faculty_data['USER_ID'])
                        {
                          echo '<div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Edit</a>
                            <a class="btn btn-danger btn-xs" href="'.site_url('faculty/delete_comment/'.$row['THESIS_COMMENT_ID']).'">Delete</a>
                          </div>';
                        }
                      echo '</div>
                    </li>';
                  }
                }
              }
              else
              {
                echo '
                  <li>
                    <div class="timeline-item">
                      <div class="timeline-body">
                        No Comment
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->';
              }
              //echo '</form>';
            ?>
          
            <!-- END timeline item -->
            <!-- timeline item -->

            <li class="time-label">
                <span class="bg-gray" id="panelComments">
                    Post a comment
                </span>
            </li>

            <li id="inputComment">
              <i class="fa  fa-pencil-square-o bg-blue"></i>

              <div class="timeline-item">
               
                <h3 class="timeline-header">Post a Comment</h3>
                <?php echo form_open('faculty/validate_comment');?>
                  <input type="hidden" name="group_id" value="<?php echo $group['group_id'];?>">
                  <input type="hidden" name="thesis_title" value="<?php echo $group['thesis_title'];?>">
                  <div class="timeline-body">
                    <div class="form-group">
                      <label></label>
                      <textarea name="comment" class="form-control" rows="3" placeholder="Post a comment about your verdict on the thesis document."></textarea>
                    </div>
                  </div>
                  <div class="timeline-footer">
                    <input type="submit" name="submit_comment" value="Submit" class="btn btn-primary btn-xs">
                  </div>
                </form>
              </div>
            </li>
          </ul>
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

  