<section class="content-header">
    <h1><?= __d('system', 'Depts'); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('system', 'Dashboard'); ?></a></li>
    </ol>
</section>

<section class="content">

        <?= Session::getMessages(); ?>

        <form method="get" class="well">

            <h2>Filter Depts:</h2>

            <div class="row">

                <div class='col-md-3'>
                    <div class="control-group">
                        <label class="control-label" for='title'> Title</label>
                        <input class="form-control" id='title' type="text" name="title" value="<?=Input::old('title', Input::get('title'));?>" />
                    </div>
                </div>

            </div>

            <br>

            <div class="pull-left">
                <button type="submit" class="btn btn-xs btn-success" name="submit"><i class="fa fa-check"></i> Filter Depts</button>
                <a href="<?=admin_url('admin/depts');?>" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> Reset Filter</a></p>
            </div>

            <div class="pull-right">
                <a href='#' onclick="printDiv('entries')" class='btn btn-xs btn-success'><i class="fa fa-print"></i> Print</a>
                <a href="<?=admin_url('depts/export/csv?'.http_build_query($queryStrings));?>" class="btn btn-xs btn-success"><i class="fa fa-file-excel-o"></i> Export to CSV</a>
                <a href="<?=admin_url('depts/export/pdf?'.http_build_query($queryStrings));?>" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> Export to PDF</a>
            </div>

            <div class="clearfix"></div>

            <p> <?=$depts->getTotal();?> Entries</p>

        </form>

		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Depts</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <p><a class='btn btn-sm btn-success' href='<?= admin_url('depts/create'); ?>'><i class="fa fa-plus"></i> Create a new Dept</a></p>

                <?php if (! $depts->isEmpty()) { ?>
                <div class="table-responsive" id="entries">
                    <table class='table table-striped table-hover'>
                        <tr>
                            <th>Dept</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        foreach ($depts as $row) {

                            echo "
                            <tr>
                                <td>".$row->title."</td>
                                <td>
                                    <a class='btn btn-xs btn-success' href='" .admin_url('depts/' .$row->id .'/edit') ."' role='button'><i class='fa fa-pencil'></i> Edit</a>
                                    <a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_" .$row->id ."' role='button'><i class='fa fa-remove'></i> Delete</a>
                                </td>
                            </tr>";

                        }
                        ?>
                    </table>
                </div>
                    <?=$depts->appends($queryStrings)->links();?>
            <?php } ?>
            </div>
        </div>

</div>


<?php
if (! $depts->isEmpty()) {
    foreach ($depts as $row) {
?>
<div class="modal modal-default" id="confirm_<?= $row->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete the dept</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this dept?</p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">Cancel</button>
                <form action="<?= admin_url('depts/'.$row->id.'/destroy'); ?>" method="POST">
                    <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />
                    <input type="submit" name="button" class="btn btn btn-danger pull-right" value="Delete">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<?php
    }
}
