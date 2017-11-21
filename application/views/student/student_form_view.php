 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="Title">
        Title
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="studentHome.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="studentForms.html">Forms</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">



<!--aguy -->
<section class="content container-fluid">




      <div class="row" id="scheduleRow">


         
      </div>

      <div class="row">
      <div class="col-lg-12 col-xs-8">
      <div class="box box-primary">
            
            <!-- /.box-header -->
            
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              
            </div>
            <!-- /.box-body -->
            
          </div>
      </div>    

       <div class="col-lg-10 col-xs-8">
        <div class="form-group">
          <h2><?php echo $course['course_code'];?></h2>
        </div>

        
        <div class="form-group">
          <?php foreach($form as $row):?>
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?php echo site_url('student/download_form/'.$row['form_name']);?>"><?php echo $row['form_name'];?></a>
            </div>
          <?php endforeach;?>
        </div>

        


      
            <!-- /.box-header -->
          
            </div>
            <!-- /.box-body -->
          </section>
      <div class="row" id="scheduleRow">


         
      </div>

      <div class="row">
      <div class="col-lg-12 col-xs-8">
      <div class="box box-primary">
            
            <!-- /.box-header -->
            
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              
            </div>
            <!-- /.box-body -->
            
          </div>
      </div>    

       


   
    </section>
    <!-- /.content -->
  </div>