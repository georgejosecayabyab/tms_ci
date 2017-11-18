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
<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. -->

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
    // $.ajax({
    //     type:'POST',
    //     url:'http://[::1]/tms_ci/index.php/student/validate_discussion',
    //     data:{'topic_info':topic_info, 'topic_name':topic_name},
    //     success:function(){
    //       console.log(topic_info);
    //       console.log(topic_name);
    //     },
    //     error: function(XMLHttpRequest, textStatus, errorThrown)
    //     {
    //       console.log(textStatus);
    //       console.log(errorThrown);
    //     }
    // });
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
</body>
</html>