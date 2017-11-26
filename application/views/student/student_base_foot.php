  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
      
    <!-- Default to the left -->
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><?php echo $student_data['last_name'].','.$student_data['first_name'];?><i class="fa fa-home"></i></a></li>
      
    </ul>
    <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
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

<script src="<?php echo base_url();?>js/ckeditor/ckeditor.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>js/adminlte.min.js"></script>

<script src="<?php echo base_url();?>js/select2.full.min.js"></script>

<script src="<?php echo base_url();?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url();?>js/jquery.weekly-schedule-plugin.js"></script>

<script type="text/javascript">
  $('#datepicker').datepicker({
    autoclose: true
  })
</script>

<script>
  $('#tags').change(function(){
    var sel = $('#tags').select2("val");
    console.log(sel);

    
    $('#select_tags').append('<input value="'+ sel+'" name="selected_tags_value">');
  });

  $('#submit_tag').click(function(){
    var sel = $('#tags').select2("val");
    console.log(sel);

    $.ajax({
      type:'POST',
      url: '/tms_ci/index.php/student/add_tags',
      data: {'tags': sel},
      success: function(data)
      {
        for(var x =0; x<data.length; x++)
        {
          console.log('tag is '+data[x]);
        }
      },
      error: function(err)
      {
        console.log(err);
      }
    });
  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>

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
    $.ajax({
      type:'POST',
      url: '/tms_ci/index.php/student/delete_schedule',
      success: function()
      {
        for(var i = 0; i<=5; i++){
          var i2 = i+"";
          var day = i;
          $.ajax({
            type:'POST',
            url:'/tms_ci/index.php/student/insert_schedule',
            data: {'data': test[i2], 'day': day},
            success: function(data)
            {
              console.log('succes');
              console.log('length is '+ JSON.stringify(data));
            },
            error: function(err)
            {
              console.log(err);
            }

          }); 
        }

        alert('Schedule has been uploaded!');
      },
      error: function(err)
      {
        console.log(err);
      }
    });

    
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

<!--editor-->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<!---editor content-->
<script>
  var editor = CKEDITOR.replace('editor1');
  $('#save_discussion').click(function() {
    var topic_info = editor.getData();
    var topic_name = $('#discussion_title').val();
    $('#discussion_title').val(topic_name);
    $('#editor1').val(topic_info);
  });

  function fill_in()
  {
    var topic_info = editor.getData();
    var topic_name = $('#discussion_title').val();
    $('#discussion_title').val(topic_name);
    $('#editor1').val(topic_info);
    console.log('succe');
    console.log($('#editor1').val());
    console.log($('#discussion_title').val());
  }
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