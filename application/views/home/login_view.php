<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url('sample/home_view');?>"><b>Admin</b>LTE</a>
  </div>
  <?php echo $this->session->flashdata('msg'); ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo site_url('login/index_1');?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8" id="remember">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4" id="signin">
          <input type="submit" name="login" value="Login">
        </div>
        <!-- /.col -->
      </div>
    </form>

   

    
   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

