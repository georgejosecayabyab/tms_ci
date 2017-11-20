<!-- Main Footer -->
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
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">View Profile</h4>
              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->
      <ul class="control-sidebar-menu">
        <li>
          <a data-toggle="modal" data-target='#modal'>
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Edit Profile</h4>
              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
      </ul>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:;">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Logout Profile</h4>
              <p>Will be 23 on April 24th</p>
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

<script src="<?php echo base_url();?>jquery-1.11.2.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
  $('#table').DataTable();
  } );
</script>

<script src="<?php echo base_url();?>js/bootstrap-datepicker.min.js"></script>

<!--modal-panel-->
<script type="text/javascript">
  $(document).ready(function() {
    var group_id = "";
    var trigger = "";
    var sample_date = "";

    $('.modal').on('shown.bs.modal', function (e) {
      trigger = $(e.relatedTarget);
      group_id = trigger.attr("value");
      sample_date = trigger.attr("id");
      console.log('group_id: ' + group_id);

      
      fill_group_tags();

      $("#firstPanelist").change( function (){

        var firstPan = $('#firstPanelist').val();
        
        $('#firstPanelBox').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
          border"> <h3 class="box-title">' + firstPan +  '</h3> <!-- /.box-tools --></div><!-- /.box-header -->\
          <div class="box-body"><div> <p>\
                Specialization (3): <br>\
                <span></span>\
                <span class="label regularLabel">Web Platform</span>\
                <span class="label regularLabel">Web Application</span>\
                <span class="label regularLabel">Information Technology</span>\
                </p>\
              </div>\
            </div>\
          </div>\
        </div>\
          ');


      });


      $("#secondPanelist").change( function (){
          
        var secondPan = $('#secondPanelist').val();
        
        $('#secondPanelBox').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
          border"> <h3 class="box-title">' + secondPan +  '</h3> <!-- /.box-tools --></div><!-- /.box-header -->\
          <div class="box-body"><div> <p>\
                Specialization (3): <br>\
                <span></span>\
                <span class="label regularLabel">Web Platform</span>\
                <span class="label regularLabel">Web Application</span>\
                <span class="label regularLabel">Information Technology</span>\
                </p>\
              </div>\
            </div>\
          </div>\
        </div>\
          ');


      });

      $("#thirdPanelist").change( function (){

       
        var thirdPan = $('#thirdPanelist').val();

        $('#thirdPanelBox').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
          border"> <h3 class="box-title">' + thirdPan +  '</h3> <!-- /.box-tools --></div><!-- /.box-header -->\
          <div class="box-body"><div> <p>\
                Specialization (3): <br>\
                <span></span>\
                <span class="label regularLabel">Web Platform</span>\
                <span class="label regularLabel">Web Application</span>\
                <span class="label regularLabel">Information Technology</span>\
                </p>\
              </div>\
            </div>\
          </div>\
        </div>\
          ');


      });

      $('#manualPanelButton').click(function (){

        $('#manualPanel').css({
          display: "inline",
          visibility: "visible"
        });


        $('#dynamicPanel').css({
          display: "none",
          visibility: "hidden"
        });

      });

      $('#dynamicPanelButton').click(function (){

        $('#dynamicPanel').css({
          display: "inline",
          visibility: "visible"
        });


        $('#manualPanel').css({
          display: "none",
          visibility: "hidden"
        });

      });
    

      function fill_group_tags()
      {
        $.ajax({
          type: 'POST',
          url: '/tms_ci/index.php/coordinator/get_group_tags/'+group_id,
          success: function(data)
          {
            console.log('got tags');
            var label = "";
            if(data['tags'].length>0)
            {
              for(var i = 0; i <data['tags'].length; i++)
              {
                label = label + '<span class="label regularLabel">'+data['tags'][i]['specialization']+'</span>';
              }
            }
            else
            {
              label = "No Specialization";
            }
            $('#group_tags').empty();
            $('#group_tags').append('<h4> <label>  Group Tags: </label> </h4>'+label);
            //$('#suggestionOne').empty();
            console.log(data['tag_common']);
            console.log(data['tag_count']);
            $('#suggestionOne').empty();
            $('#suggestionTwo').empty();
            $('#suggestionThree').empty();
            
            if(data['tag_count'].length >= 1)
            {
              var tags = "";
              var common = "";
              //panel specializations
              for(var y = 0; y<data['panel_tag'].length; y++)
              {
                if(data['panel_tag'][y]['user_id']==data['tag_count'][0]['USER_ID'])
                {
                  tags = tags + '<span class="label regularLabel">'+data['panel_tag'][y]['specialization']+'</span><br>';
                }
              }
              for(var x = 0; x<data['tag_common'].length)
              {
                if(data['tag_common'][x]['user_id']==data['tag_count'][0]['USER_ID'])
                {
                  common = common + '<span class="label regularLabel">'+data['tag_common'][x]['specialization']+'</span><br>';
                }
              }

              $('#suggestionOne').append('\
                <div class="alert alert-success alert-dismissible">\
                  <h4><i class="icon fa fa-user"></i>'+data['tag_count'][0]['NAME']+'</h4>\
                  <h5> Assistant Professor </h5>\
                  <div> \
                    <p>\
                    <b> Specialization: </b> <br>\
                    <span></span>'
                    + tags +
                    '</p>\
                  </div>\
                  <div> \
                    <p>\
                    <b> Common ('+data['tag_count'][0]['COUNT']+'): </b> <br>\
                    <span></span>'
                    +common+
                    '</p>\
                  </div>\
                </div>');
            }
            if(data['tag_count'].length >= 2)
            {
              var tags = "";
              //panel specializations
              for(var y = 0; y<data['panel_tag'].length; y++)
              {
                if(data['panel_tag'][y]['user_id']==data['tag_count'][1]['USER_ID'])
                {
                  tags = tags + '<span class="label regularLabel">'+data['panel_tag'][y]['specialization']+'</span><br>';
                }
              }

              $('#suggestionTwo').append('\
                <div class="alert alert-success alert-dismissible">\
                  <h4><i class="icon fa fa-user"></i>'+data['tag_count'][1]['NAME']+'</h4>\
                  <h5> Assistant Professor </h5>\
                  <div> \
                    <p>\
                    <b> Specialization: </b> <br>\
                    <span></span>'
                    + tags +
                    '</p>\
                  </div>\
                  <div> \
                    <p>\
                    <b> Common (2): </b> <br>\
                    <span></span>\
                    <span class="label regularLabel">Web Platform</span>\
                    <span class="label regularLabel">Information Technology</span>\
                    </p>\
                  </div>\
                </div>');
            }
            if(data['tag_count'].length >= 3)
            {
              var tags = "";
              //panel specializations
              for(var y = 0; y<data['panel_tag'].length; y++)
              {
                if(data['panel_tag'][y]['user_id']==data['tag_count'][2]['USER_ID'])
                {
                  tags = tags + '<span class="label regularLabel">'+data['panel_tag'][y]['specialization']+'</span><br>';
                }
              }

              $('#suggestionThree').append('\
                <div class="alert alert-success alert-dismissible">\
                  <h4><i class="icon fa fa-user"></i>'+data['tag_count'][2]['NAME']+'</h4>\
                  <h5> Assistant Professor </h5>\
                  <div> \
                    <p>\
                    <b> Specialization: </b> <br>\
                    <span></span>'
                    + tags +
                    '</p>\
                  </div>\
                  <div> \
                    <p>\
                    <b> Common (2): </b> <br>\
                    <span></span>\
                    <span class="label regularLabel">Web Platform</span>\
                    <span class="label regularLabel">Information Technology</span>\
                    </p>\
                  </div>\
                </div>');
            }
            if(data['tag_count'].length == 0)
            {
              console.log('No panel with common specialization');
              $('#suggestionOne').empty();$('#suggestionTwo').empty();$('#suggestionThree').empty();
            }

          },
          error: function(err)
          {
            console.log(err);
          }
        });
      }
      
    });
  });
</script>

<!--modal-defense-->
<script type="text/javascript">
  $(document).ready(function() {
    var group_id = "";
    var trigger = "";
    var sample_date = "";

    $('.modal').on('shown.bs.modal', function (e) {
      trigger = $(e.relatedTarget);
      group_id = trigger.attr("value");
      sample_date = trigger.attr("id");
      console.log('group group_id: ' + group_id);

      $('#manual').click( function () {


        $('#manualSched').css({
          display: "inline",
          visibility: "visible"
        });


        $("#suggestionSched").css({
          display: "none",
          visibility: "hidden"
        });
        
      });

      $('#suggested').click( function () {


        $("#suggestionSched").css({
          display: "inline",
          visibility: "visible"
        });

        $("#manualSched").css({
          display: "none",
          visibility: "hidden"
        });


      });


      $("#startHour,#startMinute,#endHour,#endMinute,#startMedDynamic,#endMedDynamic").change(function () {


        var firstHour =  $('#startHour').val();
        var firstMinute =  $('#startMinute').val();
        var firstMeridian = $('#startMedDynamic').val();
        var secondHour =  $('#endHour').val();
        var secondMinute =  $('#endMinute').val();
        var secondMeridian = $('#endMedDynamic').val();


        $("#timePickedSuggested").html("<h4>" + firstHour + ":" + firstMinute + " " + firstMeridian + " - " + secondHour + ":" + secondMinute + " " + secondMeridian + "</h4>");

      });



      $("#startHourMan,#startMinuteMan,#endHourMan,#endMinuteMan,#startMedManual,#endMedManual").change(function () {


        var firstHour =  $('#startHourMan').val();
        var firstMinute =  $('#startMinuteMan').val();
        var firstMeridian = $('#startMedManual').val();
        var secondHour =  $('#endHourMan').val();
        var secondMinute =  $('#endMinuteMan').val();
        var secondMeridian = $('#endMedManual').val();

        $("#timePickedManual").html("<h4>" + firstHour + ":" + firstMinute + " " + firstMeridian + " - " + secondHour + ":" + secondMinute + " " + secondMeridian + "</h4>");

      });
      

      $("#datepicker").change(function () {
       
        var dateVal =  $('#datepicker').val();
        var weekday = ["SU","MO","TU","WE","TH","F","S"];
        var new_day = new Date(dateVal);
        var day = weekday[new_day.getDay()];

        var formattedDate = new Date(dateVal);
        var d = formattedDate.getDate();
        var m =  formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11
        var y = formattedDate.getFullYear();
        var new_date = y + "-" + m + "-" + d;

        $.ajax({
          type:'POST',
          url: '/tms_ci/index.php/coordinator/get_panel_defense_date',
          data: {'group_id': group_id, 'date': new_date, 'day':day},
          success: function(data)
          {
            var conflict = "";
            console.log(data['panel_defense']);
            console.log('this is free: ' + data['free']);
            if(data['panel_defense'].length > 0 )
            {
              for(var x = 0; x<data['panel_defense'].length; x++)
              {
                console.log(data['panel_defense'][x]['NAME']);
                conflict = conflict + '<span> <b> '+data['panel_defense'][x]['NAME']+' </b> has a thesis defense at <b> '+data['panel_defense'][x]['START']+' - ' +data['panel_defense'][x]['END'] +' </b> </span> <br>';
              }
              $("#suggestion").html('<div class="alert alert-success alert-dismissible">\
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
                <h4><i class="icon fa fa-check"></i> Available Schedule for ' +  dateVal  + ' </h4>\
                <h5> <span>'+data['free']+'</span>\
                </h5> \
                </div>');

              $("#conflict").html('<div class="alert alert-danger alert-dismissible">\
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
                <h4><i class="icon fa fa-ban"></i> Conflict Defense for ' +  dateVal + ' </h4>\
                ' + conflict + '</div>');
            }
            else
            {
              $("#suggestion").html('<div class="alert alert-success alert-dismissible">\
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
                <h4><i class="icon fa fa-check"></i> Available Schedule for ' +  dateVal  + ' </h4>\
                <h5> <span>'+data['free']+'</span>\
                </h5> \
                </div>');
              $("#conflict").html('<div class="alert alert-success alert-dismissible">\
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
                <h4><i class="icon fa fa-ban"></i> No Conflict Defense for ' +  dateVal + ' </h4>\
                </div>');
            }
            
          },
          error: function(err)
          {
            console.log(err);
          }
        });

      })


      $('#table').DataTable();

      $('#datepicker,#datepicker2').datepicker({
        autoclose: true
      });

      
      $('#modal-defense-button').click(function(){
        
        var dateVal =  $('#datepicker').val();
        var formattedDate = new Date(dateVal);
        var d = formattedDate.getDate();
        var m =  formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11
        var y = formattedDate.getFullYear();
        var new_date = y + "-" + m + "-" + d;

        var start = $('#startHour').val()+':'+$('#startMinute').val()+$('#startMedDynamic').val();
        var end = $('#endHour').val()+':'+$('#endMinute').val()+$('#endMedDynamic').val();
        console.log(start+'-'+end);

        $.ajax({
          type: 'POST',
          url: '/tms_ci/index.php/coordinator/set_defense_date',
          data: {'group_id': group_id, 'date': new_date, 'start': start, 'end':end},
          success: function()
          {
            console.log('succ defendse');
          },
          error: function(err)
          {
            console.log(err);
          }
        });

      });

    })
  
    function set_defense_date()
    {
      $.ajax({
        type: 'POST',
        url: '/tms_ci/index.php/coordinator/set_defense_date',
        data: {'group_id': group_id, 'verdict': new_date},
        success: function()
        {
          console.log('succ defendse');
        },
        error: function(err)
        {
          console.log(err);
        }
      })
    }
  });
</script>

<!--modal-verdict-->
<script type="text/javascript">
  var trigger = "";
  var value = "";
  var text = "";
  var text_code = "";
  var chosen_code = "";

  $('.modal').on('show.bs.modal', function (e) {
    trigger = $(e.relatedTarget);
    value = trigger.attr("value");
    text = trigger.text();
    text_code = trigger.attr("id")
    chosen_code = text_code;
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: '+ text);
    
  })
  $('#modal-verdict').click(function(){

  });
  ///pass verdict
  $('#modal-verdict-pass').click(function(e){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Pass');
    chosen_code = $('#modal-verdict-pass').attr("value");
    
  });
  ////Conditional Pass
  $('#modal-verdict-conditional-pass').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Conditional Pass');
    chosen_code = $('#modal-verdict-conditional-pass').attr("value");
  });
  ////Fail
  $('#modal-verdict-fail').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Fail');
    chosen_code = $('#modal-verdict-fail').attr("value");
  });
  ////No Verdict
  $('#modal-verdict-no-verdict').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: No Verdict');
    chosen_code = $('#modal-verdict-no-verdict').attr("value");
  });
  /////Redefense
  $('#modal-verdict-redefense').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Redefense');
    chosen_code = $('#modal-verdict-redefense').attr("value");
  });

  function edit_verdict()
  {
    $.ajax({
      type: 'POST',
      url: '/tms_ci/index.php/coordinator/update_group_verdict',
      data: {'group_id': value, 'verdict': chosen_code},
      success: function()
      {
        console.log('succ');
      },
      error: function(err)
      {
        console.log(err);
      }
    })
  }
</script>

<script src="<?php echo base_url();?>js/select2.full.min.js"></script>
<!--select-->
<script>
  $(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
  });
</script>

</body>
</html>