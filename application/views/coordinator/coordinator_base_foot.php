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

<script type="text/javascript">
  $('.modal').on('shown.bs.modal', function (e) {
    var element_id = $(this).attr("id");
    console.log('this element ' + element_id);
    if(element_id=='modal-panel')
    {
      console.log('it a panel');
    }
    else if(element_id=='modal-defensedate')
    {
      console.log('it a defense');
    }
    else if(element_id=='modal-verdict')
    {
      console.log('it a verdict');
    }
  });
</script>

<!--modal-panel-->
<script type="text/javascript">
  $(document).ready(function() {
    var group_id = "";
    var trigger = "";

    $('.modal').on('shown.bs.modal', function (e) {
      trigger = $(e.relatedTarget);
      group_id = trigger.attr("value");
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
              for(var x = 0; x<data['tag_common'].length; x++)
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
                </div>'
              );
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
                </div>'
              );
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
                </div>'
              );
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