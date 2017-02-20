<section class="content-header">
    <h1><?= __d('dashboard', 'Dashboard'); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('dashboard', 'Dashboard'); ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<?= Session::getMessages(); ?>

<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <h4><strong><?= __d('dashboard', 'Yup. This is the Dashboard.'); ?></strong></h4>
        <p><?= __d('dashboard', 'Someday, we\'ll have widgets and stuff on here...'); ?></p>
    </div>
</div>

</section>
