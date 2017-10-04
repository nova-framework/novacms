<section class="content-header">
    <h1><?php echo __d('dashboard', 'Dashboard'); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?php echo admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> <?php echo __d('dashboard', 'Dashboard'); ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<?php echo Session::getMessages(); ?>


<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo __d('system', 'Dashboard'); ?></h3>
    </div>
    <div class="box-body">

    </div>
</div>

</section>
