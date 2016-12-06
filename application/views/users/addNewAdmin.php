<!-- Content Header (Page header) -->
<?php $this->load->view('template/admin/breadcrumb.php'); ?>
<section class="content">
    <div class="row">
        <div class="col-lg-6 col-xs-12">
        	<?php $this->load->view('message/message_block.php'); ?>
        	<div class="box box-success">
        		<?php
        			$attr = array(
        				'autocomplete'=>'off'
        			);
        			echo form_open('NewAdmin/addNewAdmin',$attr);
        		?>
        		<div class="box-header with-border">
        			<h3 class="box-title">Add New Admin</h3>
        		</div>
        		<div class="box-body">
        			<div class="form-group">
	                  	<label for="adminRole">Admin Role <span style="color:red">*</span></label>
	                  	<select class="form-control" required="required" name="adminRole" id="adminRole">
	                  		<option value="">Select a admin role</option>
	                  		<?php foreach ($role as $r) {
	                  		?>
	                  		<option value="<?php echo $r->id; ?>"><?php echo ucwords(str_replace('_',' ',$r->role_type)); ?></option>
	                  		<?php
	                  		} ?>
	                  	</select>
	                </div>
        			<div class="form-group">
	                  	<label for="adminName">Name<span style="color:red">*</span></label>
	                  	<input type="text" required="required" class="form-control" id="adminName"  name="adminName" placeholder="Md. Masudzzaman">
	                </div>
	                <div class="form-group">
	                  	<label for="AdminEmail">Email<span style="color:red">*</span></label>
	                  	<input type="text" required="required" class="form-control" id="AdminEmail"  name="AdminEmail" placeholder="info.7mmitltd@gmail.com">
	                </div>
	                <div class="form-group">
	                  	<label for="UserName">Username <span style="color:red">*</span></label>
	                  	<input type="text" required="required" class="form-control" id="UserName"  name="UserName" placeholder="UserName">
	                </div>
	                <div class="form-group">
	                  	<label for="UserPass">Password <span style="color:red">*</span></label>
	                  	<input type="password" required="required" class="form-control" id="UserPass"  name="UserPass" placeholder="Password">
	                </div>
	                <div class="form-group">
	                  	<label for="cpassword">Confirm Password <span style="color:red">*</span></label>
	                  	<input type="password" required="required" class="form-control" id="cpassword"  name="cpassword" placeholder="Password">
	                </div>
        		</div>
        		<div class="box-footer">
        			<input type="submit" name="sub" class="btn btn-primary pull-right" value="Submit">
        		</div>
        		<?php echo form_close(); ?>
        	</div>
        </div>
    </div>
</section>