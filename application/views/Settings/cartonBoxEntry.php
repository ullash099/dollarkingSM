<!-- Content Header (Page header) -->
<?php $this->load->view('template/admin/breadcrumb.php'); ?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-6 col-xs-12">
			<?php $this->load->view('message/message_block.php');
			$id = (isset($thisCartonBox[0]))? $thisCartonBox[0]->carton_id:'';
			echo (isset($thisCartonBox[0]))? form_open('Settings/editCartonBox/'.$id) : form_open('Settings/newCartonBox');
			?>
				<div class="box <?php echo (isset($thisCartonBox[0]))? 'box-warning':'box-success'; ?>">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo (isset($thisCartonBox[0]))? 'Update':'Add' ?> Carton Box</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
				                	<label for="cbName">Carton Box Name<span style="color: red">*</span> </label>
				                  	<input type="text" class="form-control" placeholder="Carton Box" name="cbName" id="cbName" required="required" value="<?php echo (isset($thisCartonBox[0]))? ucwords(str_replace('_', ' ', $thisCartonBox[0]->carton_name)):''; ?>">
				                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
				                	<label for="cbCode">Carton Box Code<span style="color: red">*</span> </label>
				                  	<input type="text" class="form-control" placeholder="CB1" name="cbCode" id="cbCode" required="required" value="<?php echo (isset($thisCartonBox[0]))? $thisCartonBox[0]->carton_code:''; ?>">
				                </div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
				                	<label for="cbSize">Carton Box Size<span style="color: red">*</span> </label>
				                  	<input type="text" class="form-control" placeholder="100X200" name="cbSize" id="cbSize" required="required" value="<?php echo (isset($thisCartonBox[0]))? $thisCartonBox[0]->carton_size:''; ?>">
				                </div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="submit" class="btn <?php echo (isset($thisCartonBox[0]))? 'btn-warning':'btn-primary'; ?> pull-right" name="sub" value="<?php echo (isset($thisCartonBox[0]))? 'Update':'Submit'; ?>">
					</div>
				</div>
			<?php
			echo form_close();
			?>
		</div>
	</div>
</section>