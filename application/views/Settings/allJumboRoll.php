<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
<!-- Content Header (Page header) -->
<?php $this->load->view('template/admin/breadcrumb.php'); ?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<?php $this->load->view('message/message_block.php'); ?>
			<div class="box box-warning">
    			<div class="box-header with-border">
            		<h3 class="box-title">All Jumbo Roll</h3>
            		<a class="btn btn-primary pull-right" href="<?php echo base_url('Settings/newJumbo') ?>">New Jumbo Roll</a>
            	</div>
            	<div class="box-body">
            		<table id="example1" class="table table-bordered table-hover table-striped">
            			<thead>
            				<tr>
            					<th>Jumbo Code</th>
            					<th>Jumbo Name</th>
            					<th>Jumbo Color</th>
            					<th>Jumbo Length</th>
            					<th>Jumbo Description</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
            			<?php
            				foreach ($allJumbo as $j) {
            			?>
            				<tr>
            					<td><?php echo $j->jumbo_code; ?></td>
            					<td><?php echo ucwords(str_replace('_', ' ', $j->jumbo_name)); ?></td>
            					<td><?php echo ucwords($j->jumbo_color); ?></td>
            					<td><?php echo ucwords($j->jumbo_length); ?></td>
            					<td><?php echo ucfirst($j->jumbo_description); ?></td>
            					<td style="text-align: right;">
									<?php echo anchor('Settings/editJumbo/' .$j->mat_id, 'Edit', array('class' => 'btn btn-warning btn-xs')) ?>
                                    <?php 
                                    if ($this->session->userdata('admin_rool') == 1){
										//echo anchor('Products/deleteCategory/'.$p->id, 'Delete', array('class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete this Sales Man Info?')"));
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