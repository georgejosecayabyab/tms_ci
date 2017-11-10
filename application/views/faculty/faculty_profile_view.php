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
			<div class="row">
				<label for="tag">Specialization:</label>
				<select class="selectpicker" multiple id="tag">
					<?php foreach($faculty_tag as $row):?>
						<option><?php echo $row['SPECIALIZATION'];?></option>
					<?php endforeach;?>
				</select>

				<label for="tag">Specialization:</label>
				<select class="selectpicker" multiple id="tag">
					<?php foreach($faculty_tag as $row):?>
						<option><?php echo $row['SPECIALIZATION'];?></option>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		<button id="profile_edit_button" class="btn btn-default">Edit</button>
	</div>
</div>

<div>
	<label for="fname">First Name:</label>
	<input type="text" id="fname" placeholder="first name" value="">
	<h5 id="fname"><?php echo $faculty_data['FIRST_NAME'];?></h5>
</div>
<div>
	<label for="lname">Last Name:</label>
	<input type="text" id="lname" placeholder="last name" value="">
	<h5 id="lname"><?php echo $faculty_data['LAST_NAME'];?></h5>
</div>
<div>
	<label for="email">Email:</label>
	<input type="email" id="fname" placeholder="email" value="">
	<h5 id="email"><?php echo $faculty_data['EMAIL'];?></h5>
</div>
<div>
	<label for="rank">Rank:</label>
	<input type="text" id="fname" placeholder="email" value="">
	<h5 id="rank"><?php echo $faculty_data['RANK'];?></h5>
</div>
<div>
	<label for="tag">Specialization:</label>
	<select multiple class="form-control" id="tag">
		<?php foreach($faculty_tag as $row):?>
			<option><?php echo $row['SPECIALIZATION'];?></option>
		<?php endforeach;?>
	</select>
</div>
<button id="profile_edit_button" class="btn btn-default">Edit</button>