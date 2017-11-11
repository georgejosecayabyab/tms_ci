<div class="content-wrapper">
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
<button id="profile_submit_button" class="btn btn-primary">Submit</button>