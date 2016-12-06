<!-- Content Header (Page header) -->
<?php $this->load->view('template/admin/breadcrumb.php'); ?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-6 col-xs-12">
			<?php $this->load->view('message/message_block.php');
			$id = (isset($thisJumbo[0]))? $thisJumbo[0]->mat_id:'';
			echo (isset($thisJumbo[0]))? form_open('Settings/editJumbo/'.$id) : form_open('Settings/newJumbo');
			?>
				<div class="box <?php echo (isset($thisJumbo[0]))? 'box-warning':'box-success'; ?>">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo (isset($thisJumbo[0]))? 'Update':'Add' ?> Jumbo Roll</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
				                	<label for="jName">Jumbo Name<span style="color: red">*</span> </label>
				                  	<input type="text" class="form-control" placeholder="Jondis Jumbo" name="jName" id="jName" required="required" value="<?php echo (isset($thisJumbo[0]))? ucwords(str_replace('_', ' ', $thisJumbo[0]->jumbo_name)):''; ?>">
				                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
				                	<label for="jCode">Jumbo Code<span style="color: red">*</span> </label>
				                  	<input type="text" class="form-control" placeholder="JG1" name="jCode" id="jCode" required="required" value="<?php echo (isset($thisJumbo[0]))? $thisJumbo[0]->jumbo_code:''; ?>">
				                </div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
				                	<label for="jColor">Jumbo Color<span style="color: red">*</span> </label>
				                  	<input type="text" class="form-control" placeholder="Red" name="jColor" id="jColor" required="required" value="<?php echo (isset($thisJumbo[0]))? $thisJumbo[0]->jumbo_color:''; ?>">
				                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
				                	<label for="jLength">Jumbo Length<span style="color: red">*</span> </label>
				                  	<div class="input-group">
						                <span class="input-group-addon">
						                	<i class="fa fa-arrows-h" aria-hidden="true"></i>
						                </span>
						                <input type="number" class="form-control" placeholder="1200" name="jLength" id="jLength" required="required" value="<?php echo (isset($thisJumbo[0]))? $thisJumbo[0]->jumbo_length:''; ?>">
						                <span class="input-group-addon">
						                	METER
						                </span>
						              </div>
				                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="jDesc">Jumbo Description </label>
								<textarea class="form-control" placeholder="A short description of this Jumbo Roll." name="jDesc" id="jDesc" ><?php echo (isset($thisJumbo[0]))? $thisJumbo[0]->jumbo_description:''; ?></textarea>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="submit" class="btn <?php echo (isset($thisJumbo[0]))? 'btn-warning':'btn-primary'; ?> pull-right" name="sub" value="<?php echo (isset($thisJumbo[0]))? 'Update':'Submit'; ?>">
					</div>
				</div>
			<?php
			echo form_close();
			?>
		</div>
	</div>
</section>