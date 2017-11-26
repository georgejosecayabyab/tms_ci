<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 id="Title">
    Set Term
    
    </h1>
    <ol class="breadcrumb">
      <li><a href="studentHome.html"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="studentGroup.html"><i class="fa fa-home"></i> Group</a></li>
      
    </ol>
  </section>
  <!-- Main content -->
  
  <section class="content container-fluid">
    <?php if($this->session->flashdata('fail')): ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <center><h4><i class="icon fa fa-info"></i> Alert!</h4>
          <?php echo $this->session->flashdata('fail'); ?></center>
        </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('success')): ?>
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center><h4><i class="icon fa fa-info"></i> Alert!</h4>
        <?php echo $this->session->flashdata('success'); ?></center>
      </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-lg-12 col-xs-8">
        <div class="box box-primary">
          <div class="box-header"></div>
          <form action="<?php echo site_url('coordinator/move_to_next_term');?>" method="post" class="form-horizontal">
            <!-- /.box-header -->
            <div  class="box-body">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Current Term</label>
                <div class="col-sm-8">
                  <text>
                    <?php 
                      $year1 = $year['year'] + 1;
                      $year = $year['year'];

                      echo 'Term '.$term['term'].' AY '.$year.'-'.$year1;
                    ?>  
                  </text>
                </div>
              </div>
              <div class="form-group ">
                <label for="term" class="col-sm-2 control-label">Term</label>
                <div class="col-sm-8">
                  <span>
                    <select class="form-control select2" name="term" style="width: 100%;">
                      <?php foreach($all_term as $row):?>
                        <?php if($term['term']==$row['term']):?>
                          <option selected><?php echo $term['term'];?></option>
                        <?php else:?>
                          <option><?php echo $row['term'];?></option>
                        <?php endif;?>
                      <?php endforeach;?>
                    </select>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="year" class="col-sm-2 control-label">School Year</label>
                <div class="col-sm-1">
                  <select class="form-control select2" name="year">
                    <?php foreach($all_year as $row):?>
                      <?php if($year==$row['year']):?>
                        <option selected><?php echo $year;?></option>
                      <?php else:?>
                        <option><?php echo $row['year'];?></option>
                      <?php endif;?>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-4 col-xs-12">
                  </div>
                  <div class="col-lg-3 col-xs-12">
                    <button id="submitbtn" type="submit" class="btn btn-success">Save and Quit</button>
                    <a href="<?php echo site_url('coordinator');?>"><button id="submitbtn2" type="button" class="btn btn-danger">Exit</button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </form>
        </div>
      </div>
    </div>
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->