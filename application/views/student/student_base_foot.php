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
              <a href="javascript:;">
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
              <a href="javascript:;">
                <i class="menu-icon fa fa-gears bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Edit Profile</h4>

                 
                </div>
              </a>
            </li>
          </ul>



           <ul class="control-sidebar-menu">
            <li>
              <a href="<?php echo site_url('student/logout');?>">
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
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<!--notification refresh-->
<script>
  var interval = 5000;
  get_new_notifications();
  get_all_notifications();

  function get_all_notifications()
  {
    $.ajax({
      type:'POST',
      url:'http://[::1]/tms_ci/index.php/student/get_all_notifications',
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
      url:'http://[::1]/tms_ci/index.php/student/get_new_notifications',
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
      url: 'http://[::1]/tms_ci/index.php/student/update_notification',          
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
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>js/adminlte.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
} );

</script>

</body>
</html>