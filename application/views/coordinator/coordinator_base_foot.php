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
          <a href="<?php echo site_url('coordinator/logout');?>">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Logout Profile</h4>
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

<!--add student group-->
<script>
  
  var member = "";

  $('#table').change(function(){
    var student = $('#student_box').attr('name');
    var member = "";
    var id = [];
    $('#user_id').empty();
    $('#users').empty();

    //$('#user_id').empty();
    $('table [type="checkbox"]').each(function(i, chk) {
      if (chk.checked) {
        console.log("Checked!", i, chk);
        var name = $(this).attr("name");
        console.log('id:' + name);
        $.ajax({
          type: 'POST',
          url: '/tms_ci/index.php/coordinator/get_user_info/'+name,
          success: function(data)
          {
            console.log(data);
            member = member + data['user']['first_name']+' '+data['user']['last_name']+', ';
            id.push(data['user']['user_id']);
            console.log('senpai '+member);
            $('#group_members').empty();
            $('#group_members').append(member.substring(0, member.length -2));
            $('#user_id').append('<input value="'+ data['user']['user_id']+'" name="users[]">');
            $('#adviser_id').append('<input value="'+ $('#adviser').val()+'" name="adviser_id">');
            console.log('kill: '+$('#users').attr("value"));
            console.log('adviser id: '+$('#adviser').val());
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

<script>
  ////NONE
</script>

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
    var sample_date = "";
    var first_id = "";
    var second_id = "";
    var third_id = "";
    var firstPan = "";
    var secondPan = "";
    var thirdPan = "";

    $('.modal').on('shown.bs.modal', function (e) {
      trigger = $(e.relatedTarget);
      group_id = trigger.attr("value");
      sample_date = trigger.attr("id");
      console.log('group_id: ' + group_id);

      $('#modal_panel_button').click(function(){
        var fid = $('#firstPanelist').children(":selected").attr("id");
        var sid = $('#secondPanelist').children(":selected").attr("id");
        var tid = $('#thirdPanelist').children(":selected").attr("id");
        console.log('f:'+fid+'  s:'+sid+' t:'+ tid + ' group_id ' + group_id);

        $.ajax({
          type: 'POST',
          url: '/tms_ci/index.php/coordinator/update_group_panelist',
          data: {'fid': fid, 'sid': sid, 'tid': tid, 'group_id': group_id},
          success: function(data)
          {
            console.log('defense panelis has been changed!');
            console.log(data);
          },
          error: function(err)
          {
            console.log(err);
          }
        });

      });

      fill_group_tags();

      fill_panel_selection();

      $("#firstPanelist").change( function (){

        firstPan = $('#firstPanelist').val();
        first_id = $('#firstPanelist').children(":selected").attr("id");
        second_id = $('#secondPanelist').children(":selected").attr("id");
        third_id = $('#thirdPanelist').children(":selected").attr("id");
        console.log('at first change first_id ' + first_id +' '+ 'second_id ' + second_id +' '+ 'third_id ' + third_id +' ');

        $.ajax({
          type:'POST',
          url: '/tms_ci/index.php/coordinator/get_possible_panel/'+ group_id, 
          success: function(data)
          {
            console.log('frist:' + data);
            $('#firstPanelist').empty();
            $('#secondPanelist').empty();
            $('#thirdPanelist').empty();
            var option_1 = "";
            var option_2 = "";
            var option_3 = "";
            var option1 = "";
            var option2 = "";
            var option3 = "";

            console.log('before chane first_id ' + first_id +' '+ 'second_id ' + second_id +' '+ 'third_id ' + third_id +' ');

            for(var x =0; x<data['possible'].length; x++)
            {
              
              if(data['possible'][x]['user_id'] == first_id)
              {
                option_1 = option_1 + '<option selected id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                
              }
              if(data['possible'][x]['user_id'] == second_id)
              {
                option_2 = option_2 + '<option selected id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
              if(data['possible'][x]['user_id'] == third_id)
              {
                option_3 = option_3 + '<option selected id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
            }

            $('#firstPanelist').append(option_1);
            $('#secondPanelist').append(option_2);
            $('#thirdPanelist').append(option_3);

            first_id = $('#firstPanelist').children(":selected").attr("id");
            second_id = $('#secondPanelist').children(":selected").attr("id");
            third_id = $('#thirdPanelist').children(":selected").attr("id");

            console.log('at first cahnge other options first_id ' + first_id +' '+ 'second_id ' + second_id +' '+ 'third_id ' + third_id +' ');
            for(var x =0; x<data['possible'].length; x++)
            {

              if(data['possible'][x]['user_id'] != first_id && data['possible'][x]['user_id'] != second_id && data['possible'][x]['user_id'] != third_id)
              {
                option1 = option1 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                option2 = option2 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                option3 = option3 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
            }

            $('#firstPanelist').append(option1);
            $('#secondPanelist').append(option2);
            $('#thirdPanelist').append(option3);
            console.log('1:' +option_1 +option1);
            console.log('2:' +option_2 +option2);
            console.log('3:' +option_3 +option3);

            
            
          },
          error: function(err)
          {
            console.log(err);
          }
        });

        $.ajax({
          type: 'POST',
          url: '/tms_ci/index.php/coordinator/get_panel_tags/'+first_id,
          success: function(data)
          {
            tags = "";
            for(var x = 0; x<data.length; x++)
            {
              tags = tags + '<span class="label regularLabel">'+data[x]['specialization']+'</span><br>';
            }
            $('#firstPanelBox').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
            border"> <h3 class="box-title">' + firstPan +  '</h3> <!-- /.box-tools --></div><!-- /.box-header -->\
            <div class="box-body"><div> <p>\
                  Specialization ('+data.length+'): <br>\
                  <span></span>'
                  +tags+
                  '</p>\
                </div>\
              </div>\
            </div>\
          </div>\
            ');
          },
          error: function()
          {

          }
        });


      });

      $("#firstPanelistManual").change( function (){

        var firstPan = $('#firstPanelistManual').val();

        $('#firstBoxManual').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
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
          
        secondPan = $('#secondPanelist').val();
        first_id = $('#firstPanelist').children(":selected").attr("id");
        second_id = $('#secondPanelist').children(":selected").attr("id");
        third_id = $('#thirdPanelist').children(":selected").attr("id");
        console.log('at first change first_id ' + first_id +' '+ 'second_id ' + second_id +' '+ 'third_id ' + third_id +' ');

        $.ajax({
          type:'POST',
          url: '/tms_ci/index.php/coordinator/get_possible_panel/'+ group_id, 
          success: function(data)
          {
            console.log('frist:' + data);
            $('#firstPanelist').empty();
            $('#secondPanelist').empty();
            $('#thirdPanelist').empty();
            var option_1 = "";
            var option_2 = "";
            var option_3 = "";
            var option1 = "";
            var option2 = "";
            var option3 = "";

            console.log('before chane first_id ' + first_id +' '+ 'second_id ' + second_id +' '+ 'third_id ' + third_id +' ');

            for(var x =0; x<data['possible'].length; x++)
            {
              
              if(data['possible'][x]['user_id'] == first_id)
              {
                option_1 = option_1 + '<option selected id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                
              }
              if(data['possible'][x]['user_id'] == second_id)
              {
                option_2 = option_2 + '<option selected id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
              if(data['possible'][x]['user_id'] == third_id)
              {
                option_3 = option_3 + '<option selected id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
            }

            $('#firstPanelist').append(option_1);
            $('#secondPanelist').append(option_2);
            $('#thirdPanelist').append(option_3);

            first_id = $('#firstPanelist').children(":selected").attr("id");
            second_id = $('#secondPanelist').children(":selected").attr("id");
            third_id = $('#thirdPanelist').children(":selected").attr("id");

            console.log('at first cahnge other options first_id ' + first_id +' '+ 'second_id ' + second_id +' '+ 'third_id ' + third_id +' ');
            for(var x =0; x<data['possible'].length; x++)
            {

              if(data['possible'][x]['user_id'] != first_id && data['possible'][x]['user_id'] != second_id && data['possible'][x]['user_id'] != third_id)
              {
                option1 = option1 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                option2 = option2 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                option3 = option3 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
            }

            $('#firstPanelist').append(option1);
            $('#secondPanelist').append(option2);
            $('#thirdPanelist').append(option3);
            console.log('1:' +option_1 +option1);
            console.log('2:' +option_2 +option2);
            console.log('3:' +option_3 +option3);

            
            
          },
          error: function(err)
          {
            console.log(err);
          }
        });
        
        $.ajax({
          type: 'POST',
          url: '/tms_ci/index.php/coordinator/get_panel_tags/'+second_id,
          success: function(data)
          {
            tags = "";
            for(var x = 0; x<data.length; x++)
            {
              tags = tags + '<span class="label regularLabel">'+data[x]['specialization']+'</span><br>';
            }
            $('#secondPanelBox').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
            border"> <h3 class="box-title">' + secondPan +  '</h3> <!-- /.box-tools --></div><!-- /.box-header -->\
            <div class="box-body"><div> <p>\
                  Specialization ('+data.length+'): <br>\
                  <span></span>'
                  +tags+
                  '</p>\
                </div>\
              </div>\
            </div>\
          </div>\
            ');
          },
          error: function()
          {

          }
        });


      });

      $("#secondPanelistManual").change( function (){

        var secondPan = $('#secondPanelistManual').val();

        $('#secondBoxManual').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
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

       
        thirdPan = $('#thirdPanelist').val();
        first_id = $('#firstPanelist').children(":selected").attr("id");
        second_id = $('#secondPanelist').children(":selected").attr("id");
        third_id = $('#thirdPanelist').children(":selected").attr("id");
        console.log('at first change first_id ' + first_id +' '+ 'second_id ' + second_id +' '+ 'third_id ' + third_id +' ');

        $.ajax({
          type:'POST',
          url: '/tms_ci/index.php/coordinator/get_possible_panel/'+ group_id, 
          success: function(data)
          {
            console.log('frist:' + data);
            $('#firstPanelist').empty();
            $('#secondPanelist').empty();
            $('#thirdPanelist').empty();
            var option_1 = "";
            var option_2 = "";
            var option_3 = "";
            var option1 = "";
            var option2 = "";
            var option3 = "";

            console.log('before chane first_id ' + first_id +' '+ 'second_id ' + second_id +' '+ 'third_id ' + third_id +' ');

            for(var x =0; x<data['possible'].length; x++)
            {
              
              if(data['possible'][x]['user_id'] == first_id)
              {
                option_1 = option_1 + '<option selected id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                
              }
              if(data['possible'][x]['user_id'] == second_id)
              {
                option_2 = option_2 + '<option selected id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
              if(data['possible'][x]['user_id'] == third_id)
              {
                option_3 = option_3 + '<option selected id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
            }

            $('#firstPanelist').append(option_1);
            $('#secondPanelist').append(option_2);
            $('#thirdPanelist').append(option_3);

            first_id = $('#firstPanelist').children(":selected").attr("id");
            second_id = $('#secondPanelist').children(":selected").attr("id");
            third_id = $('#thirdPanelist').children(":selected").attr("id");

            console.log('at first cahnge other options first_id ' + first_id +' '+ 'second_id ' + second_id +' '+ 'third_id ' + third_id +' ');
            for(var x =0; x<data['possible'].length; x++)
            {

              if(data['possible'][x]['user_id'] != first_id && data['possible'][x]['user_id'] != second_id && data['possible'][x]['user_id'] != third_id)
              {
                option1 = option1 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                option2 = option2 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                option3 = option3 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
            }

            $('#firstPanelist').append(option1);
            $('#secondPanelist').append(option2);
            $('#thirdPanelist').append(option3);
            console.log('1:' +option_1 +option1);
            console.log('2:' +option_2 +option2);
            console.log('3:' +option_3 +option3);

            
            
          },
          error: function(err)
          {
            console.log(err);
          }
        });

        $.ajax({
          type: 'POST',
          url: '/tms_ci/index.php/coordinator/get_panel_tags/'+third_id,
          success: function(data)
          {
            tags = "";
            for(var x = 0; x<data.length; x++)
            {
              tags = tags + '<span class="label regularLabel">'+data[x]['specialization']+'</span><br>';
            }
            $('#thirdPanelBox').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
            border"> <h3 class="box-title">' + thirdPan +  '</h3> <!-- /.box-tools --></div><!-- /.box-header -->\
            <div class="box-body"><div> <p>\
                  Specialization ('+data.length+'): <br>\
                  <span></span>'
                  +tags+
                  '</p>\
                </div>\
              </div>\
            </div>\
          </div>\
            ');
          },
          error: function()
          {

          }
        });


      });

      $("#thirdPanelistManual").change( function (){

        var thirdPan = $('#thirdPanelistManual').val();

        $('#thirdBoxManual').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
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

    $('#addPanel1').click(

      function(){


        var $select = $('#firstPanelist')
        $select.select2();


        var suggest = $("#suggestion1Name").text().toString();
        console.log(suggest.toString());

        $select.val(suggest).trigger('change');

      }

    );


    $('#addPanel2').click(


      function(){


        var $select = $('#secondPanelist')
        $select.select2();


        var suggest = $("#suggestion2Name").text().toString();
        console.log(suggest.toString());

        $select.val(suggest).trigger('change');

      }

    );

    $('#addPanel3').click(

      function(){


        var $select = $('#thirdPanelist')
        $select.select2();


        var suggest = $("#suggestion3Name").text().toString();
        console.log(suggest.toString());

        $select.val(suggest).trigger('change');

      }

    );
    

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
                  <h4 id="suggestion1Name"><i class="icon fa fa-user"></i>'+data['tag_count'][0]['NAME']+'<a href="#"><i id="addPanel1" class="buttonCustom fa fa-fw fa-plus-circle"></i></a></h4>\
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
              var common = "";
              //panel specializations
              for(var y = 0; y<data['panel_tag'].length; y++)
              {
                if(data['panel_tag'][y]['user_id']==data['tag_count'][1]['USER_ID'])
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

              $('#suggestionTwo').append('\
                <div class="alert alert-success alert-dismissible">\
                  <h4 id="suggestion2Name"><i class="icon fa fa-user"></i>'+data['tag_count'][1]['NAME']+'<a href="#"><i id="addPanel2" class="buttonCustom fa fa-fw fa-plus-circle"></i></a></h4>\
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
                    <span></span>'
                    +common+
                    '</p>\
                  </div>\
                </div>');
            }
            if(data['tag_count'].length >= 3)
            {
              var tags = "";
              var common = "";
              //panel specializations
              for(var y = 0; y<data['panel_tag'].length; y++)
              {
                if(data['panel_tag'][y]['user_id']==data['tag_count'][2]['USER_ID'])
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

              $('#suggestionThree').append('\
                <div class="alert alert-success alert-dismissible">\
                  <h4 id="suggestion3Name"><i class="icon fa fa-user"></i>'+data['tag_count'][2]['NAME']+'<a href="#"><i id="addPanel3" class="buttonCustom fa fa-fw fa-plus-circle"></i></a></h4>\
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
                    <span></span>'
                    +common+
                    '</p>\
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

      function fill_panel_selection()
      {
        $.ajax({
          type:'POST',
          url: '/tms_ci/index.php/coordinator/get_possible_panel/'+ group_id, 
          success: function(data)
          {
            console.log('frist:' + data);
            $('#firstPanelist').empty();
            $('#secondPanelist').empty();
            $('#thirdPanelist').empty();
            var option_1 = "";
            var option_2 = "";
            var option_3 = "";
            var option1 = "";
            var option2 = "";
            var option3 = "";

            ////list start
            if(data['panel'].length == 0)
            {
              option_1 = option_1 + '<option selected id="'+ data['possible'][0]['user_id']+'">'+ data['possible'][0]['last_name']+', '+ data['possible'][0]['first_name']+'</option>';

              option_2 = option_2 + '<option selected id="'+ data['possible'][1]['user_id']+'">'+ data['possible'][1]['last_name']+', '+ data['possible'][1]['first_name']+'</option>';

              option_3 = option_3 + '<option selected id="'+ data['possible'][2]['user_id']+'">'+ data['possible'][2]['last_name']+', '+ data['possible'][2]['first_name']+'</option>';
            }
            else
            {
              option_1 = option_1 + '<option selected id="'+ data['panel'][0]['user_id']+'">'+ data['panel'][0]['last_name']+', '+ data['panel'][0]['first_name']+'</option>';

              option_2 = option_2 + '<option selected id="'+ data['panel'][1]['user_id']+'">'+ data['panel'][1]['last_name']+', '+ data['panel'][1]['first_name']+'</option>';

              option_3 = option_3 + '<option selected id="'+ data['panel'][2]['user_id']+'">'+ data['panel'][2]['last_name']+', '+ data['panel'][2]['first_name']+'</option>';
            
            }

            $('#firstPanelist').append(option_1);
            $('#secondPanelist').append(option_2);
            $('#thirdPanelist').append(option_3);

            firstPan = $('#firstPanelist').val();
            secondPan = $('#secondPanelist').val();
            thirdPan = $('#thirdPanelist').val();

            first_id = $('#firstPanelist').children(":selected").attr("id");
            second_id = $('#secondPanelist').children(":selected").attr("id");
            third_id = $('#thirdPanelist').children(":selected").attr("id");
            for(var x =0; x<data['possible'].length; x++)
            {
              if(data['possible'][x]['user_id'] != first_id && data['possible'][x]['user_id'] != second_id && data['possible'][x]['user_id'] != third_id)
              {
                option1 = option1 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                option2 = option2 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
                option3 = option3 + '<option id="'+ data['possible'][x]['user_id']+'">'+ data['possible'][x]['last_name']+', '+ data['possible'][x]['first_name']+'</option>';
              }
            }

            ////lis end
            $('#firstPanelist').append(option1);
            $('#secondPanelist').append(option2);
            $('#thirdPanelist').append(option3);

            $.ajax({
              type: 'POST',
              url: '/tms_ci/index.php/coordinator/get_panel_tags/'+first_id,
              success: function(data)
              {
                tags = "";
                for(var x = 0; x<data.length; x++)
                {
                  tags = tags + '<span class="label regularLabel">'+data[x]['specialization']+'</span><br>';
                }
                $('#firstPanelBox').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
                border"> <h3 class="box-title">' + firstPan +  '</h3> <!-- /.box-tools --></div><!-- /.box-header -->\
                <div class="box-body"><div> <p>\
                      Specialization ('+data.length+'): <br>\
                      <span></span>'
                      +tags+
                      '</p>\
                    </div>\
                  </div>\
                </div>\
              </div>\
                ');
              },
              error: function()
              {

              }
            });

            $.ajax({
              type: 'POST',
              url: '/tms_ci/index.php/coordinator/get_panel_tags/'+second_id,
              success: function(data)
              {
                tags = "";
                for(var x = 0; x<data.length; x++)
                {
                  tags = tags + '<span class="label regularLabel">'+data[x]['specialization']+'</span><br>';
                }
                $('#secondPanelBox').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
                border"> <h3 class="box-title">' + secondPan +  '</h3> <!-- /.box-tools --></div><!-- /.box-header -->\
                <div class="box-body"><div> <p>\
                      Specialization ('+data.length+'): <br>\
                      <span></span>'
                      +tags+
                      '</p>\
                    </div>\
                  </div>\
                </div>\
              </div>\
                ');
              },
              error: function()
              {

              }
            });

            $.ajax({
              type: 'POST',
              url: '/tms_ci/index.php/coordinator/get_panel_tags/'+third_id,
              success: function(data)
              {
                tags = "";
                for(var x = 0; x<data.length; x++)
                {
                  tags = tags + '<span class="label regularLabel">'+data[x]['specialization']+'</span><br>';
                }
                $('#thirdPanelBox').html('<div class="col-md-4"> <div class="box box-success"> <div class="box-header with-\
                border"> <h3 class="box-title">' + thirdPan +  '</h3> <!-- /.box-tools --></div><!-- /.box-header -->\
                <div class="box-body"><div> <p>\
                      Specialization ('+data.length+'): <br>\
                      <span></span>'
                      +tags+
                      '</p>\
                    </div>\
                  </div>\
                </div>\
              </div>\
                ');
              },
              error: function()
              {

              }
            });
            
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
            console.log('this is free: ' + data['free'][0]['START']);
            var common_button = "";
            for(var x = 0; x<data['free'].length; x++)
            {
              var link = '/tms_ci/index.php/coordinator/set_defense_date_link/'+group_id+'/'+new_date+'/'+data['free'][x]['TIME_ID'];
              var time_string = data['free'][x]['START']+'-'+data['free'][x]['END'];
              common_button = common_button + '<a href="'+link+'"><button id="'+data['free'][x]['TIME_ID']+'" class="btn btn-default time_button" name="time_button" value="'+data['free'][x]['TIME_ID']+'">'+ time_string+'</button></a>';
              console.log(common_button);
            }
            for(var x = 0; x<data['panel_defense'].length; x++)
            {
              console.log('kanina '+data['panel_defense'][x]['NAME']);
              conflict = conflict + '<span> <b> '+data['panel_defense'][x]['NAME']+' </b> has a thesis defense at <b> '+data['panel_defense'][x]['START']+' - ' +data['panel_defense'][x]['END'] +' </b> </span> <br>';
            }
            $("#suggestion").html('<div class="alert alert-success alert-dismissible">\
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
              <h4><i class="icon fa fa-check"></i> Available Schedule for ' +  dateVal  + ' </h4>\
              <h5> <span>'+common_button+'</span>\
              </h5> \
              </div>');

            
            if(data['panel_defense'].length > 0 )
            {
              $("#conflict").html('<div class="alert alert-danger alert-dismissible">\
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
              <h4><i class="icon fa fa-ban"></i> Conflict Defense for ' +  dateVal + ' </h4>\
              ' + conflict + '</div>');
            }
            else
            {
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
  
    // function set_defense_date()
    // {
    //   $.ajax({
    //     type: 'POST',
    //     url: '/tms_ci/index.php/coordinator/set_defense_date',
    //     data: {'group_id': group_id, 'verdict': new_date},
    //     success: function()
    //     {
    //       console.log('succ defendse');
    //     },
    //     error: function(err)
    //     {
    //       console.log(err);
    //     }
    //   })
    // }

  });
</script>

<!--modal-verdict-->
<script type="text/javascript">
  var trigger = "";
  var value = "";
  var text = "";
  var text_code = "";
  var chosen_code = "";
  var type = "0";

  $('.modal').on('show.bs.modal', function (e) {
    trigger = $(e.relatedTarget);
    value = trigger.attr("value");
    text = trigger.text();
    text_code = trigger.attr("id")
    chosen_code = text_code;
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: '+ text);
    
  })

  function verdictState(defenseType){

    if (defenseType == "REGULAR DEFENSE"){
      console.log(defenseType);

      $("#initialVerdict").css({
        display: "inline",
        visibility: "visible"
      });


      $("#finalVerdict").css({
        display: "none",
        visibility: "hidden"
      });

    }

    else{
      console.log('finll'+defenseType);
      $("#initialVerdict").css({
        display: "none",
        visibility: "hidden"
      });


      $("#finalVerdict").css({
        display: "inline",
        visibility: "visible"
      });

    }


  }

  $('#modal-verdict').click(function(){

  });
  ///pass verdict
  $('#modal-verdict-pass').click(function(e){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Pass');
    chosen_code = $('#modal-verdict-pass').attr("value");

    console.log(chosen_code);
    console.log($("#finalVerdict").val());
    
  });
  ////Conditional Pass
  $('#modal-verdict-conditional-pass').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Conditional Pass');
    chosen_code = $('#modal-verdict-conditional-pass').attr("value");
    console.log(chosen_code);

    console.log($("#finalVerdict").val());
  });
  ////Fail
  $('#modal-verdict-fail').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Fail');
    chosen_code = $('#modal-verdict-fail').attr("value");
    console.log(chosen_code);

    console.log($("#finalVerdict").val());
  });
  ////No Verdict
  $('#modal-verdict-no-verdict').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: No Verdict');
    chosen_code = $('#modal-verdict-no-verdict').attr("value");
    console.log(chosen_code);

    console.log($("#finalVerdict").val());
  });

  /////Redefense
  $('#modal-verdict-redefense').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Redefense');
    chosen_code = $('#modal-verdict-redefense').attr("value");
    console.log(chosen_code);

    console.log($("#finalVerdict").val());
  });

  $('#modal-verdict-redemo').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Redemo');
    chosen_code = $('#modal-verdict-redemo').attr("value");
    console.log(chosen_code);
  });

  $('#modal-verdict-special-defense').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Special Defense');
    chosen_code = $('#modal-verdict-special-defense').attr("value");

    console.log(chosen_code);

    console.log($("#finalVerdict").val());
  });


  ////final/////////////////////////
  ///pass verdict
  $('#f-modal-verdict-pass').click(function(e){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Pass');
    chosen_code = $('#f-modal-verdict-pass').attr("value");
    console.log(chosen_code);
    type = $("#finalVerdict").attr("value");
    console.log($("#finalVerdict").attr("value"));
    
  });
  $('#f-modal-verdict-conditional-pass').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Conditional Pass');
    chosen_code = $('#f-modal-verdict-conditional-pass').attr("value");
    console.log(chosen_code);
    type = $("#finalVerdict").attr("value");
    console.log($("#finalVerdict").attr("value"));
  });
  ////Fail
  $('#f-modal-verdict-fail').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Fail');
    chosen_code = $('#f-modal-verdict-fail').attr("value");
    console.log(chosen_code);
    type = $("#finalVerdict").attr("value");
    console.log($("#finalVerdict").attr("value"));
  });
  ////No Verdict
  $('#f-modal-verdict-no-verdict').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: No Verdict');
    chosen_code = $('#f-modal-verdict-no-verdict').attr("value");
    console.log(chosen_code);
    type = $("#finalVerdict").attr("value");
  });
  /////Redefense
  $('#f-modal-verdict-redefense').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Redefense');
    chosen_code = $('#f-modal-verdict-redefense').attr("value");
    console.log(chosen_code);
    type = $("#finalVerdict").attr("value");
  });

  $('#f-modal-verdict-redemo').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Redemo');
    chosen_code = $('#f-modal-verdict-redemo').attr("value");
    console.log(chosen_code);
    type = $("#finalVerdict").attr("value");
  });

  $('#f-modal-verdict-special-defense').click(function(){
    $('#modal-verdict-title').empty();
    $('#modal-verdict-title').append('Defense Verdict: Special Defense');
    chosen_code = $('#f-modal-verdict-special-defense').attr("value");

    console.log(chosen_code);
    type = $("#finalVerdict").attr("value");
  });

  function edit_verdict()
  {
    var link = "";
    if(type != 1)
    {
      link = '/tms_ci/index.php/coordinator/update_initial_group_verdict';
    }
    else
    {
      link = '/tms_ci/index.php/coordinator/update_final_group_verdict';
    }
    $.ajax({
      type: 'POST',
      url: link,
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

<!---editor content-->
<script>
  var editor = CKEDITOR.replace('editor1');
  $('#save_discussion').click(function() {
    var topic_info = editor.getData();
    var topic_name = $('#discussion_title').val();
    $('#discussion_title').val(topic_name);
    $('#editor1').val(topic_info);
  });

  function home_fill_in()
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

<!--select-->
<script>
  $(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
  });
</script>

<script>
  function create_faculty()
  {
    var email = $('#faculty_email').val();
    var first_name = $('#faculty_first_name').val();
    var last_name = $('#faculty_last_name').val();
    var rank = $('#faculty_rank').val();

    console.log(email+first_name+last_name+rank);
    
  }
</script>

</body>
</html>