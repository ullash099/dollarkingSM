<section class="content-header">
    <h1>
        <?php echo ucwords(str_replace('_', ' ', $active_menu)); ?>
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <?php echo (isset($active_menu) && !isset($active_child_menu)) ? "<li class='active'>" . ucwords(str_replace('_', ' ', $active_menu)). "</li>" : ""; ?>
        <?php if (isset($active_menu) && isset($active_child_menu)) : ?>
            <li><?php echo ucwords(str_replace('_', ' ', $active_menu)); ?></li>
            <li class='active'><?php echo ucwords(str_replace('_', ' ', $active_child_menu)); ?></li>
            <?php endif; ?>
    </ol>
</section>