<?php echo validation_errors(); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 id="Title">
    Discussions
    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <form action="<?php echo site_url('student/validate_discussion');?>" method="POST">
            <div class="box-header">
              <input type="hidden" value="<?php echo $group_id['group_id'];?>" name="group_id">
              <div class="form-group">
                <label for="discussion_title" class="col-sm-2 control-label">Discussion Title</label>
                <div class="col-sm-6">
                  <input class="form-control" id="discussion_title" name="discussion_title" placeholder="Title">
                </div>
              </div>
              <!-- tools box -->
              <div class="pull-right box-tools">
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-4 col-xs-12">
                    <span></span>
                  </div>
                  <div class="col-lg-3 col-xs-12">
                    <span></span>
                    <input onclick="fill_in()" id="save_discussion" name="save" type="submit" class="btn btn-success" onclick="fill_in()" value="Save and Quit">
                    <a href="<?php echo site_url('student/view_group/'.$group_id['group_id']);?>"><input id="exit" name="exit" type="button" class="btn btn-danger" value="Exit"></a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->