<!-- Content Header (Page header) -->
<?php $this->load->view('template/admin/breadcrumb.php'); ?>
<!-- Main content -->
<section class="content">
	<!--deshboard content goes here-->
	<div class="row">
		<div class="col-lg-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Profile of <strong><?php echo strtoupper($this->session->userdata('admin_name')); ?></strong></h3>
				</div>
				<?php
					$UserName = "";
					$Name = "";
					$Email = "";
					$CreatedAt = "";
					$id = '';
					if(isset($userProfileInfo[0])){
						$id = $userProfileInfo[0]->id;
						$UserName = $userProfileInfo[0]->user_name;
						$Name = ucwords(str_replace('_', ' ', $userProfileInfo[0]->admin_name));
						$Email = $userProfileInfo[0]->admin_email;
						$CreatedAt = date("d M. Y",strtotime($userProfileInfo[0]->creating_date));
					}
				?>
				<div class="box-body">
					<table class="table table-hover">
						<tr>
							<td>User Name: </td>
							<td><?php echo $UserName ?></td>
						</tr>
						<tr>
							<td>Full Name</td>
							<td><?php echo $Name ?></td>
						</tr>
						<tr>
							<td>Email </td>
							<td><?php echo $Email ?></td>
						</tr>
						<tr>
							<td>User Created At: </td>
							<td><?php echo $CreatedAt ?></td>
						</tr>
					</table>
				</div>
				<div class="box-footer">
					<a class="btn btn-warning pull-right" href="<?php echo base_url('AdminProfile/updateProfile/'.$id);?>">Update Profile</a>
				</div>
			</div>
		</div>
	</div>
</section>