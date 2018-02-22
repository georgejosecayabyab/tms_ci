<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
    Forms
    
    </h2>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('student');?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active"><a href="<?php echo site_url('student');?>">Forms</a></li>
      
    </ol>
  </section>
  <!-- Main content -->
  <!--aguy -->
  <style type="text/css">
    #boxx{
      margin-top:20px; 
      margin-left:20px;
      margin-bottom: 20px;
      margin-right: 20px;
    }
  </style>
  <section class="content container-fluid">
    <div class="col-lg-12 col-xs-8">
       <div class="box box-primary">
        <div id="boxx">
          <div class="form-group">
            <h2><?php echo $course['course_code'];?></h2>
          </div>
      
        <div class="form-group">
          <?php foreach($form as $row):?>
          <div class="box-header with-border">
            <h2 class="box-title"><a href="<?php echo site_url('student/download_form/'.$row['form_name']);?>"><?php echo $row['form_name'];?></a></h2>
          </div>
          <?php endforeach;?>
        </div>
      </div>
</div>
      
      
      <!-- /.box-header -->
      
    </div>
    <!-- /.box-body -->
  </section>
  
  
  
</section>
<!-- /.content -->
</div>