<!-- Main Footer -->
  <footer class="main-footer">
  <!-- To the right -->

  <!-- Default to the left -->

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><?php echo $faculty_data['LAST_NAME'].','.$faculty_data['FIRST_NAME'];?><i class="fa fa-home"></i></a></li>

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane active" id="control-sidebar-home-tab">

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

<script src="<?php echo base_url();?>js/ckeditor/ckeditor.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>js/adminlte.min.js"></script>

<script src="<?php echo base_url();?>js/jquery.weekly-schedule-plugin.js"></script>

<script src="<?php echo base_url();?>js/select2.full.min.js"></script>

<script src="<?php echo base_url();?>js/bootstrap-datepicker.min.js"></script>

<script>
  $('#submit_tag').click(function(){
    var sel = $('#tags').select2("val");
    console.log(sel);

    $.ajax({
      type:'POST',
      url: '/tms_ci/index.php/faculty/add_tags',
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

<script type="text/javascript">
  $('#datepicker').datepicker({
    autoclose: true
  })
</script>

<script type="text/javascript">
  $('#datepicker,#datepicker2').datepicker({
    autoclose: true
  })
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

  $('#specialCase').click(function (){
    $('#specialField').html('<input class="text form-control" placeholder="Subject/Date/Time" id="specialText"> </input>');
  });


  $("#submit").click(
    function() {
    var test = $('#target').weekly_schedule("getSelectedHour");
    console.log(test);
    $.ajax({
      type:'POST',
      url: '/tms_ci/index.php/faculty/delete_schedule',
      success: function()
      {
        for(var i = 0; i<=5; i++){
          var i2 = i+"";
          var day = i;
          $.ajax({
            type:'POST',
            url:'/tms_ci/index.php/faculty/insert_schedule',
            data: {'data': test[i2], 'day': day},
            success: function(data)
            {
              var obj = JSON.parse(data);
              console.log('code '+test[i2]);
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

<!-- click edit submit-->
<script>
  var data = $('#allSpecialization').val();
  $('#submit_edit').click(function()
    {
      var data = $('#allSpecialization').val();
      console.log(data);

      $.post('http://[::1]/tms_ci/index.php/faculty/update_faculty_specialization',{'data':data});  
    });
  console.log(data);
</script>

<!--select elements-->
<script>
  $(function () {
  //Initialize Select2 Elements
  $('#allSpecialization option:selected').select2();
  });
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!--data table-->
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>

<!--faculty view profile-->
<script>
  $(function () {
  //Initialize Select2 Elements
    $('.select2').select2();
  });
</script>

<!--date range picker-->
<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  });
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

<!--edit reply in discussion-->
<script type="text/javascript">
  $('#edit_reply').click(function(){
    console.log($("#edit_reply").attr("value"));
    var id = $("#edit_reply").attr("value");
    $('#'+id).empty();
    $.ajax({
      type: 'POST',
      url:'http://[::1]/tms_ci/index.php/faculty/get_discussion_reply/'+id,
      success: function(data)
      {
        $('#'+id+'_foot').empty();
        $('#'+id).empty();
        $('#'+id).append('<div class="form-group"><label></label><textarea name="reply_"'+id+' class="form-control" rows="3" placeholder="Post a reply about the discussion."></textarea></div></div><div class="timeline-footer"><input type="button" name="submit_edit" value="Submit" class="btn btn-primary btn-xs"></div></form>');


        //$('#notification_list').empty();
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

      }
    });
  });
</script>
<!--edit reply-->
<script type="text/javascript">
  $('#submit_edit').click(function(){
    console.log('joke');
  });
</script>
</body>
</html>