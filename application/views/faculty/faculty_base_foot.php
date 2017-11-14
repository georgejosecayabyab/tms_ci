<!-- Main Footer -->
  <footer class="main-footer">
  <!-- To the right -->

  <!-- Default to the left -->

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane active" id="control-sidebar-home-tab">

    <ul class="control-sidebar-menu">
      <li>
        <a href="<?php echo site_url('faculty/view_profile');?>">
          <i class="menu-icon fa fa-user bg-green"></i>
          <div class="menu-info">
            <h4 class="control-sidebar-subheading">View Profile</h4>
          </div>
        </a>
      </li>
    </ul>
    <!-- /.control-sidebar-menu -->
     <ul class="control-sidebar-menu">
      <li>
        <a href="<?php echo site_url('faculty/edit_profile');?>">
          <i class="menu-icon fa fa-gears bg-green"></i>
          <div class="menu-info">
            <h4 class="control-sidebar-subheading">Edit Profile</h4>
          </div>
        </a>
      </li>
    </ul>
    <ul class="control-sidebar-menu">
      <li>
        <a href="<?php echo site_url('faculty/logout');?>">
          <i class="menu-icon fa fa-sign-out bg-green"></i>
          <div class="menu-info">
            <h4 class="control-sidebar-subheading">Logout</h4>
          </div>
        </a>
      </li>
    </ul>

    <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->
    </div>
  </aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg">

</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>js/adminlte.min.js"></script>

<script src="<?php echo base_url();?>js/jquery.weekly-schedule-plugin.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- schedule-->
<script>    
  $('.schedule').on('selectionmade', function() {
      console.log("Selection Made");
  }).on('selectionremoved', function() {
      console.log("Selection Removed");
  });


  $('#target').weekly_schedule({

    // Days displayed
    days: ["mon", "tue", "wed", "thu", "fri", "sat"], 

    // Hours displyed
    hours: "7:30AM-9:00PM", 

    // Font used in the component
    fontFamily: "Montserrat", 

    // Font colot used in the component
    fontColor: "black", 

    // Font weight used in the component
    fontWeight: "10000", 

    // Font size used in the component
    fontSize: "0.8em", 

    // Background color when hovered
    hoverColor: "#239023", 

    // Background color when selected
    selectionColor: "#6fdc6f", 

    // Background color of headers
    headerBackgroundColor: "transparent"
    
  });


  $("#submit").click(function() {
    var test = $('#target').weekly_schedule("getSelectedHour");
    console.log(test);
  });
</script>
<!--notification refresh-->
<script>
  var interval = 5000;
  get_new_notifications();
  get_all_notifications();

  function get_all_notifications()
  {
    $.ajax({
      type:'POST',
      url:'http://[::1]/tms_ci/index.php/faculty/get_all_notifications',
      success: function(data)
      {
        $('#notification_list').empty();
        num = 10;
        if(data.length < num)
        {
          num = data.length
        }
        for(i=0; i<num;i++)
        {
          console.log(data)
          console.log('gt');
          $('#notification_list').append('<li><a href="#"><i class="fa fa-users text-aqua"></i>'+data[i].notification_details+'</a></li>');
        }
      },
      error: function(data)
      {
        console.log('wrong!');
      }
    });
  }
  function get_new_notifications()
  {
    $.ajax({
      type: 'POST',
      url:'http://[::1]/tms_ci/index.php/faculty/get_new_notifications',
      success: function(data)
      {
        //$('#notification_list').empty();
        console.log(data);
        if(data.length > 0)
        {
          $('#new_notification_number').empty();
          $('#new_notification_number').append(data.length);
          get_all_notifications();
        }
        else
        {
          $('#new_notification_number').empty();
        }

      },
      error: function(data, errorThrown)
      {
        console.log(errorThrown);
      }
    });
  }

  $('#notification').on('click',function()
  {
    $.ajax({
      type: 'POST',
      url: 'http://[::1]/tms_ci/index.php/faculty/update_notification',          
      success: function () {
        console.log('none');
        get_new_notifications();
      },
      error: function(data, errorThrown)
      {
        console.log(errorThrown);
      }
    });
  });

  

  setInterval(get_new_notifications, interval);
  setInterval(get_all_notifications, interval);
</script>
<!-- view profile-->
<script>
  $('#profile_edit_button').on('click',function()
  {
    $.ajax({
      type: 'POST',
      success: function () 
      {
        console.log('profiel edit');
        $('#profile_section').empty();
        $('#profile_section').append('<div><label for="fname">First Name:</label><input type="text" id="fname" placeholder="first name" value="<?php echo $faculty_data['FIRST_NAME'];?>"></div><div><label for="lname">Last Name:</label><input type="text" id="lname" placeholder="last name" value="<?php echo $faculty_data['LAST_NAME'];?>"></div><div><label for="email">Email:</label><input type="email" id="fname" placeholder="email" value="<?php echo $faculty_data['EMAIL'];?>"></div><div><label for="rank">Rank:</label><input type="text" id="fname" placeholder="email" value="<?php echo $faculty_data['RANK'];?>"></div><div><div class="row"><label for="tag">Specialization:</label><select class="selectpicker" multiple id="tag"><?php foreach($faculty_tag as $row):?><option><?php echo $row['SPECIALIZATION'];?></option><?php endforeach;?></select><button id="add_tag">add</button><button id="remove_tag">remove</button><label for="all_tag">Specialization:</label><select class="selectpicker" multiple id="all_tag"><?php foreach($all_tag as $row):?><option><?php echo $row['specialization'];?></option><?php endforeach;?></select></div></div><button id="profile_submit_button" class="btn btn-primary">Submit</button>');
      },
      error: function(data, errorThrown)
      {
        console.log(errorThrown);
      }
    });
  });

  $('#profile_section').on('click', '#profile_submit_button', function()
  {
    $.ajax({
      type: 'POST',
      success: function()
      {
        var values = $('#tag').val();
        console.log(values);
      }
    });
  });

  $('#profile_section').on('click', '#add_tag', function()
  {
    var values = $('#tag').val();
    console.log(values); 
  });

  $('#profile_section').on('click', '#remove_tag', function()
  {
    var values = $('#all_tag').val();
    console.log(values); 
  });
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!--data table-->
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>
</body>
</html>