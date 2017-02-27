<div class="content-header">
    <h2>Edit Role</h2>
    <ol class="breadcrumb">
        <li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href='<?= admin_url('roles'); ?>'><i class="fa fa-users"></i> Roles</a></li>
        <li><strong>Edit Role</strong></li>
    </ol>
</div>

<div class="content">

    <?= Session::getMessages(); ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Role</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <form action="<?= admin_url('roles/'.$role->id); ?>" class="form-horizontal" method='POST'>
            <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />

            <div class='row'>

                <div class='col-md-6'>

                    <div class="control-group">
                        <label class="control-label" for='name'> Name <span class="text-danger">*</span></label>
                        <input class="form-control" id='name' type="text" name="name" value="<?=Input::old('name', $role->name);?>" />
                    </div>

                </div>

                <div class='col-md-6'>

                    <div class="control-group">
                        <label class="control-label" for='description'> Description</label>
                        <input class="form-control" id='description' type="text" name="description" value="<?=Input::old('description', $role->description);?>" />
                    </div>

                </div>

            </div>

            <p><br><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Update Role</button></p>

        </div>
    </div>


</div>
