<!--  Error message with styles from controller & model given -->
<!--custom info-->
<?php
if (isset($info)) {
    foreach ($info as $key => $value) {
        ?>
        <div class="alert alert-info alert-dismissable">
            <i class="icon fa fa-info"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $value; ?>
        </div>
<?php
    }
}
?>

<!--Flash info-->
<?php
if ($this->session->flashdata('info')){
?>
<div class="alert alert-info alert-dismissable">
        <i class="icon fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata('info'); ?>
</div>
<?php  
}
?>

<!--custom success-->
<?php 
if (isset($success)) {
    foreach ($success as $key => $value) {
?>
<div class="alert alert-success alert-dismissable">
    <i class="icon fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $value; ?>
</div>
<?php
    }
}
?>

<!--Flash success-->
<?php
if($this->session->flashdata('success')){
?>
<div class="alert alert-success alert-dismissable">
    <i class="icon fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata('success'); ?>
</div>
<?php
}
?>

<!--custom warning-->
<?php
if (isset($warning)) {
    foreach ($warning as $key => $value) {
?>
<div class="alert alert-warning alert-dismissable">
    <i class="icon fa fa-warning"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $value; ?>
</div>
<?php
    }
}
?>

<!--Flash warning-->
<?php
if($this->session->flashdata('warning')){
?>
<div class="alert alert-warning alert-dismissable">
    <i class="icon fa fa-warning"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata('warning'); ?>
</div>
<?php
}
?>
<!--custom error-->
<?php
if (isset($error)) {
    foreach ($error as $key => $value) {
?>
<div class="alert alert-danger alert-dismissable">
    <i class="icon fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $value; ?>
</div>
<?php
    }
}
?>
<!--Flash error-->
<?php
if($this->session->flashdata('error')){
?>
<div class="alert alert-danger alert-dismissable">
    <i class="icon fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata('error'); ?>
</div>
<?php
}
?>