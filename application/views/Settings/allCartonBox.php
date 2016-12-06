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
            		<a class="btn btn-primary pull-right" href="<?php echo base_url('Settings/newCartonBox') ?>">New Carton Box</a>
            	</div>
            	<div class="box-body">
            		<table id="example1" class="table table-bordered table-hover table-striped">
            			<thead>
            				<tr>
            					<th>Carton Box Code</th>
            					<th>Carton Box Name</th>
            					<th>Carton Box Size</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
            			<?php
            				foreach ($cartonBox as $c) {
            			?>
            				<tr>
            					<td><?php echo $c->carton_code; ?></td>
            					<td><?php echo ucwords(str_replace('_', ' ', $c->carton_name)); ?></td>
            					<td><?php echo ucwords($c->carton_size); ?></td>
            					<td style="text-align: right;">
									<?php echo anchor('Settings/editCartonBox/' .$c->carton_id, 'Edit', array('class' => 'btn btn-warning btn-xs')) ?>
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