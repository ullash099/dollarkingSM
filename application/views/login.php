<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>"><b>Stock</b> Management</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php $this->load->view('message/message_block.php'); ?>
    <?php echo form_open('Login'); ?>
      <div class="form-group has-feedback">
        <label for="uname">User Name</label>
        <input type="text" class="form-control" name="uname" id="uname" placeholder="user name">
        <span class="form-control-feedback"><i class="fa fa-fw fa-user"></i></span>
      </div>
      <div class="form-group has-feedback">
        <label for="upass">Password</label>
        <input type="password" class="form-control" name="upass" id="upass" placeholder="Password">
        <span class="form-control-feedback"><i class="fa fa-fw fa-lock"></i></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
        <br><br><br><br>
          userName = admin<br>
          password = 12345678
      </div>
    <?php echo form_close(); ?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->