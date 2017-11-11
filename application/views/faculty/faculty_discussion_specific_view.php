<div class="content-wrapper">
  <!-- Content Header (Page header) --> 
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('faculty');?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo site_url('faculty/view_advisee_specific/'.$topic_data['group_id']);?>"> <?php echo $topic_data['group_name'];?></a></li>
      <li class="active"><?php echo $topic_data['topic_name'];?></li>
      
    </ol>
    <h1 id="Title">
      <?php echo $topic_data['topic_name'];?>
    </h1>
    <h5><?php echo $topic_data['topic_info'];?></h5>
  </section>
  <div  id="timeline">
    <!-- The timeline -->
    <ul class="timeline timeline-inverse">

      <!-- timeline time label -->

      </li>
      <!-- /.timeline-label -->
      <!-- timeline item -->
      <?php 
        //echo form_open('faculty/delete_comment');
        if(sizeof($discuss)>0)
        {
          $date = '';
          foreach($discuss as $row)
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

                  <h3 class="timeline-header"><a href="#">'.$row['NAME'].'</a> replied</h3>

                  <div class="timeline-body">'
                    .$row['DISCUSS'].
                  '</div>';
                  if($row['USER_ID']==$faculty_data['USER_ID'])
                  {
                    echo '<div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Edit</a>
                      <a class="btn btn-danger btn-xs" href="'.site_url('faculty/delete_reply/'.$row['DISCUSSION_ID']).'">Delete</a>
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

                  <h3 class="timeline-header"><a href="#">'.$row['NAME'].'</a> replied</h3>

                  <div class="timeline-body">'
                    .$row['DISCUSS'].
                  '</div>';
                  if($row['USER_ID']==$faculty_data['USER_ID'])
                  {
                    echo '<div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Edit</a>
                      <a class="btn btn-danger btn-xs" href="'.site_url('faculty/delete_reply/'.$row['DISCUSSION_ID']).'">Delete</a>
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
                  No Replies
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
              Post a reply
          </span>
      </li>

      <li id="inputComment">
        <i class="fa  fa-pencil-square-o bg-blue"></i>

        <div class="timeline-item">
         
          <h3 class="timeline-header">Post a Reply</h3>
          <?php echo form_open('faculty/validate_reply');?>
            <input type="hidden" name="group_id" value="<?php echo $topic_data['group_id'];?>">
            <input type="hidden" name="topic_id" value="<?php echo $topic_data['topic_discussion_id'];?>">
            <div class="timeline-body">
              <div class="form-group">
                <label></label>
                <textarea name="reply" class="form-control" rows="3" placeholder="Post a reply about the discussion."></textarea>
              </div>
            </div>
            <div class="timeline-footer">
              <input type="submit" name="submit_reply" value="Submit" class="btn btn-primary btn-xs">
            </div>
          </form>
        </div>
      </li>
    </ul>
  </div>
</div>