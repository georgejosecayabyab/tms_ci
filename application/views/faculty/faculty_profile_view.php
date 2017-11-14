<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 id="Title">
        Edit Faculty Profile
        
        </h1>
        <ol class="breadcrumb">
          <li><a href="studentHome.html"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="studentGroup.html"><i class="fa fa-home"></i> Group</a></li>
          
        </ol>
      </section>
      <!-- Main content -->
      <section class="content container-fluid">
        
        <div class="row" id="scheduleRow">
          
          <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-red">
              
              
            </div>
          </div>
          <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-yellow">
              
              
            </div>
          </div>
          
          <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-green">
              
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-xs-8">
            <div class="box box-primary">
              
              <!-- /.box-header -->
              <div  class="box-body">
              </div >
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-8">
                    <input class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
               
                
                <div class="form-group ">
                  <label for="inputName" class="col-sm-2 control-label">Rank</label>
                  
                  <div class="col-sm-8">
                    <select class="form-control select2" data-placeholder="Select a Rank"
                      style="width: 100%;">
                      <option>Instructor 1</option>
                      <option>Teaching Associate </option>
                      <option>Assistant Professor 1</option>
                      <option>Full Professor 1</option>
                      <option>Assistant Lecturer</option>
                      <option>Lecturer</option>
                      <option>Assistant Professor Lecturer 1</option>
                      <option>Associate Professor Lecturer 1</option>
                      <option>Professorial Lecturer 1</option>
                      <option>Professional Lecturer</option>
                      <option>Senior Professional Lecturer</option>
                      
                    </select>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputName" class="col-sm-2 control-label">Specialization</label>
                  
                  <div class="col-sm-8">
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select an area of specialization"
                      style="width: 100%;">
                      <option>Algorithms and Complexity</option>
                      <option>Architecture and Organization</option>
                      <option>Computational Science</option>
                      <option>Digital Signal Processing</option>
                      <option>Discrete Structure</option>
                      <option>Embedded and Control System</option>
                      <option>General Computer Science</option>
                      <option>Robotics</option>
                      <option>Software Engineering</option>
                      <option>Graphics and Visual Computing</option>
                      <option>Human-Computer Interaction</option>
                      <option>Information Management</option>
                      <option>Intelligent Systems</option>
                      <option>Net-centric computing</option>
                      <option>Operating Systems</option>
                      <option>Programming Languages</option>
                      <option>Social and Professional Issues</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Current Specializations</label>
                  <p>
                    
                    <span class="label regularLabel">Web Platform</span>
                    <span class="label regularLabel">Web Application</span>
                    <span class="label regularLabel">Information Technology</span>
                    <span class="label regularLabel">Information Systems</span>
                    <span class="label regularLabel">Django Framework</span>
                    
                  </p>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
              <ul class="todo-list">
                
              </ul>
            </div>
            <!-- /.box-body -->
            
          </div>
        </div>
        <div class="col-lg-12 col-xs-8">
          <div class="box box-primary">
            
          </div>
          <!-- /.box-header -->
          
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
  
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- <div class="content-wrapper">
	<div class="content container-fluid" id="profile_section">
		<div>
			<label for="fname">First Name:</label>
			<h5 id="fname"><?php echo $faculty_data['FIRST_NAME'];?></h5>
		</div>
		<div>
			<label for="lname">Last Name:</label>
			<h5 id="lname"><?php echo $faculty_data['LAST_NAME'];?></h5>
		</div>
		<div>
			<label for="email">Email:</label>
			<h5 id="email"><?php echo $faculty_data['EMAIL'];?></h5>
		</div>
		<div>
			<label for="rank">Rank:</label>
			<h5 id="rank"><?php echo $faculty_data['RANK'];?></h5>
		</div>
		<div>	
			<label for="tag">Specialization:</label>
			<h5 id="tag">
				<?php 
	                $list="";
	                foreach($faculty_tag as $row)
	                {
	                	$list .= $row['SPECIALIZATION'].', ';
	                }
	                echo substr(trim($list), 0, -1);
	            ?>
			</h5>
		</div>
		<button id="profile_edit_button" class="btn btn-default">Edit</button>
	</div>
</div>

<div>
	<label for="fname">First Name:</label>
	<input type="text" id="fname" placeholder="first name" value="<?php echo $faculty_data['FIRST_NAME'];?>">
</div>
<div>
	<label for="lname">Last Name:</label>
	<input type="text" id="lname" placeholder="last name" value="<?php echo $faculty_data['LAST_NAME'];?>">
</div>
<div>
	<label for="email">Email:</label>
	<input type="email" id="fname" placeholder="email" value="<?php echo $faculty_data['EMAIL'];?>">
</div>
<div>
	<label for="rank">Rank:</label>
	<input type="text" id="fname" placeholder="email" value="<?php echo $faculty_data['RANK'];?>">
</div>
<div>
	<div class="row">
		<label for="tag">Specialization:</label>
		<select class="selectpicker" multiple id="tag">
			<?php foreach($faculty_tag as $row):?>
				<option><?php echo $row['SPECIALIZATION'];?></option>
			<?php endforeach;?>
		</select>
		<button>add</button>
		<button>remove</button>
		<label for="all_tag">Specialization:</label>
		<select class="selectpicker" multiple id="all_tag">
			<?php foreach($all_tag as $row):?>
				<option><?php echo $row['specialization'];?></option>
			<?php endforeach;?>
		</select>
	</div>
</div>
<button id="profile_submit_button" class="btn btn-primary">Submit</button> -->