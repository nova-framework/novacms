<section class="content-header">
    <h1><?php echo __d('system', 'Depts'); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?php echo admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> <?php echo __d('system', 'Dashboard'); ?></a></li>
    </ol>
</section>

<section class="content">

        <?php echo Session::getMessages(); ?>


        <form method="get" class="well">

            <h2><?php echo __d('system', 'Filter Depts'); ?>:</h2>

            <div class="row">

                <div class='col-md-3'>
                    <div class="control-group">
                        <label class="control-label" for='title'> <?php echo __d('system', 'Title'); ?></label>
                        <input class="form-control" id='title' type="text" name="title" value="<?php echo e(Input::old('title', Input::get('title'))); ?>" />
                    </div>
                </div>

            </div>

            <br>

            <div class="pull-left">
                <button type="submit" class="btn btn-xs btn-success" name="submit"><i class="fa fa-check"></i> <?php echo __d('system', 'Filter Depts'); ?></button>
                <a href="<?php echo admin_url('depts'); ?>" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> <?php echo __d('system', 'Reset Filter'); ?></a></p>
            </div>

            <div class="pull-right">
                <a href='#' onclick="printDiv('entries')" class='btn btn-xs btn-success'><i class="fa fa-print"></i> <?php echo __d('system', 'Print'); ?></a>
                <a href="<?php echo admin_url('depts/export/csv?'.http_build_query($queryStrings)); ?>" class="btn btn-xs btn-success"><i class="fa fa-file-excel-o"></i> <?php echo __d('system', 'Export to CSV'); ?></a>
                <a href="<?php echo admin_url('depts/export/pdf?'.http_build_query($queryStrings)); ?>" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> <?php echo __d('system', 'Export to PDF'); ?></a>
            </div>

            <div class="clearfix"></div>

            <p> <?php echo $depts->getTotal(); ?> <?php echo __d('system', 'Entries'); ?></p>

        </form>

		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __d('system', 'Depts'); ?></h3>
            </div>
            <div class="box-body">

                <p><a class='btn btn-sm btn-success' href='<?php echo admin_url('depts/create'); ?>'><i class="fa fa-plus"></i> <?php echo __d('system', 'Create a new dept'); ?></a></p>

                <?php if(! $depts->isEmpty()): ?>
                <div class="table-responsive" id="entries">
                    <table class='table table-striped table-hover'>
                        <tr>
                            <th><?php echo __d('system', 'Dept'); ?></th>
                            <th><?php echo __d('system', 'Action'); ?></th>
                        </tr>
                        <?php foreach($depts as $row): ?>

                            <tr>
                                <td><?php echo e($row->title); ?></td>
                                <td>
                                    <a class='btn btn-xs btn-success' href='<?php echo e(admin_url("depts/$row->id/edit")); ?>' role='button'><i class='fa fa-pencil'></i> <?php echo __d('system', 'Edit'); ?></a>
                                    <a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_<?php echo e($row->id); ?>' role='button'><i class='fa fa-remove'></i> <?php echo __d('system', 'Delete'); ?></a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </table>
                </div>
                    <?php echo $depts->appends($queryStrings)->links(); ?>

            <?php endif; ?>
            </div>
        </div>
</div>


<?php if(! $depts->isEmpty()): ?>
    <?php foreach($depts as $row): ?>
<div class="modal modal-default" id="confirm_<?php echo e($row->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo __d('system', 'Delete the dept'); ?></h4>
            </div>
            <div class="modal-body">
                <p><?php echo __d('system', 'Are you sure you want to delete this dept?'); ?></p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button"><?php echo __d('system', 'Cancel'); ?></button>
                <form action="<?php echo e(admin_url("depts/$row->id/destroy")); ?>" method="POST">
                    <input type="hidden" name="csrfToken" value="<?php echo e($csrfToken); ?>" />
                    <input type="submit" name="button" class="btn btn btn-danger pull-right" value="<?php echo __d('system', 'Delete'); ?>">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
    <?php endforeach; ?>
<?php endif; ?>
