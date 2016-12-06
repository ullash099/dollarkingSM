<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
<!-- Content Header (Page header) -->
<?php $this->load->view('template/admin/breadcrumb.php'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        	<?php $this->load->view('message/message_block.php'); ?>
        	<div class="box box-warning">
        		<div class="box-header">
        			<div class="row"->
        				<div class="col-xs-6">
        					<h3 class="box-title">All Admin's</h3>
        				</div>
        				<div class="col-xs-6">
        					<a href="<?php echo base_url('NewAdmin/addNewAdmin'); ?>" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp; New Admin</a>
        				</div>
        			</div>
        		</div>
        		<div class="box-body">
		        	<table id="example1" class="table table-bordered table-striped">
		        		<thead>
		        			<tr>
		        				<td>Admin Name</td>
                    <td>Email</td>
		        				<td>User Name</td>
		        				<td>User Role</td>
		        				<td>Creating Date</td>
		        				<td></td>
		        			</tr>
		        		</thead>
		        		<tbody>
                <?php 
                $allRoles = array();
                foreach ($roles as $r) {
                  $allRoles[$r->id] = ucwords(str_replace('_', ' ', $r->role_type));
                }

                foreach ($allAdmins as $a) {
                ?>
                  <tr>
                    <td><?php echo ucwords(str_replace('_', ' ', $a->admin_name)) ?></td>
                    <td><?php echo $a->admin_email ?></td>
                    <td><?php echo $a->user_name ?></td>
                    <td><?php echo (isset($allRoles[$a->role_type]))?$allRoles[$a->role_type]:'' ?></td>
                    <td>
                      <?php 
                        echo date('F m, Y',strtotime(str_replace('-', '-', $a->creating_date))) 
                      ?>                        
                    </td>
                    <td style="text-align: right;">
                      <?php 
                        if ($this->session->userdata('admin_role') == 1){
                          if($a->role_type !=1){
                            echo anchor('NewAdmin/deleteAdmin/'.$a->id, 'Delete', array('class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete this Account Head Information?')"));
                          }
                        }
                      ?>
                    </td>
                  </tr>
                <?php 
                  }
                ?>
		        		</tbody>
		        	</table>
		        </div>
	        </div>
        </div>
    </div>
</section>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    //$("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>