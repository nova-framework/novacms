<div class="content-header">
	<h2>Roles</h2>
	<ol class="breadcrumb">
		<li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><strong>Roles</strong></li>
	</ol>
</div>

<div class="content">

    <?= Session::getMessages(); ?>

    <form method="get" class="well">

        <h2>Filter Roles:</h2>

        <div class="row">

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='name'> Title</label>
                    <input class="form-control" id='name' type="text" name="name" value="<?=Input::old('name', Input::get('name'));?>" />
                </div>
            </div>

        </div>

        <br>

        <div class="pull-left">
            <button type="submit" class="btn btn-xs btn-success" name="submit"><i class="fa fa-check"></i> Filter Roles</button>
            <a href="<?=admin_url('roles');?>" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> Reset Filter</a></p>
        </div>

        <div class="pull-right">
            <a href='#' onclick="printDiv('entries')" class='btn btn-xs btn-success'><i class="fa fa-print"></i> Print</a>
            <a href="<?=admin_url('roles/export/csv?'.http_build_query($queryStrings));?>" class="btn btn-xs btn-success"><i class="fa fa-file-excel-o"></i> Export to CSV</a>
            <a href="<?=admin_url('roles/export/pdf?'.http_build_query($queryStrings));?>" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> Export to PDF</a>
        </div>

        <div class="clearfix"></div>

        <p> <?=$roles->getTotal();?> Entries</p>

    </form>

	<div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Roles</h3>
        </div>
        <div class="box-body">

            <p><a class='btn btn-sm btn-success' href='<?= admin_url('roles/create'); ?>'><i class="fa fa-plus"></i> Create a new Role</a></p>

            <?php if (! $roles->isEmpty()) { ?>
            <div class="table-responsive" id="entries">
                <table class='table table-striped table-hover'>
                    <tr>
                        <th>Role</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    foreach ($roles->getItems() as $row) {

                        echo "
                        <tr>
                            <td>$row->name</td>
                            <td>$row->description</td>
                            <td>
                                <a class='btn btn-xs btn-success' href='" .admin_url('roles/' .$row->id .'/edit') ."' title='Edit this User' role='button'><i class='fa fa-pencil'></i> Edit</a>
                                <a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_" .$row->id ."' title='Delete this User' role='button'><i class='fa fa-remove'></i> Delete</a>
                            </td>
                        </tr>";

                    }
                    ?>
                </table>
            </div>
                <?=$roles->appends($queryStrings)->links();?>
        <?php } ?>
        </div>
    </div>

</div>


<?php
if (! $roles->isEmpty()) {
    foreach ($roles->getItems() as $row) {
?>
<div class="modal modal-default" id="confirm_<?= $row->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete the role</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this role?</p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">Cancel</button>
                <form action="<?= admin_url('roles/'.$row->id.'/destroy'); ?>" method="POST">
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
