<div class="content-header">
	<h2>Users</h2>
	<ol class="breadcrumb">
		<li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><strong>Users</strong></li>
	</ol>
</div>

<div class="content">

    <?= Session::getMessages(); ?>

    <form method="get" class="well">

        <h2>Filter Users:</h2>

        <div class="row">

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='username'> User</label>
                    <input class="form-control" id='username' type="text" name="username" value="<?=Input::old('username', Input::get('username'));?>" />
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='email'> Email</label>
                    <input class="form-control email" id='email' type="text" name="email" value="<?=Input::old('email', Input::get('email'));?>" />
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='role_id'> User Level</label>
                    <select name='role_id' id='role_id' class='form-control'>
                    <option value=''>Select</option>
                    <?php
                    foreach ($roles as $row) {
                        if (Input::old('role_id', Input::get('role_id')) == $row->id) {
                            $sel = 'selected=selected';
                        } else {
                            $sel = null;
                        }
                        echo "<option value='$row->id' $sel>$row->name</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='officeLoginOnly'> Office Login Only</label>
                    <select name='officeLoginOnly' id='officeLoginOnly' class='form-control'>
                    <option value=''>Select</option>
                    <?php
                    $options = ['Yes', 'No'];
                    foreach ($options as $option) {
                        if (Input::old('officeLoginOnly', Input::get('officeLoginOnly')) == $option) {
                            $sel = 'selected=selected';
                        } else {
                            $sel = null;
                        }
                        echo "<option value='$option' $sel>$option</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>

        </div>

        <br>

        <div class="pull-left">
            <button type="submit" class="btn btn-xs btn-success" name="submit"><i class="fa fa-check"></i> Filter Users</button>
            <a href="<?=admin_url('users');?>" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> Reset Filter</a></p>
        </div>

        <div class="pull-right">
            <a href='#' onclick="printDiv('entries')" class='btn btn-xs btn-success'><i class="fa fa-print"></i> Print</a>
            <a href="<?=admin_url('users/export/csv?'.http_build_query($queryStrings));?>" class="btn btn-xs btn-success"><i class="fa fa-file-excel-o"></i> Export to CSV</a>
            <a href="<?=admin_url('users/export/pdf?'.http_build_query($queryStrings));?>" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> Export to PDF</a>
        </div>

        <div class="clearfix"></div>

        <p> <?=$users->getTotal();?> Entries</p>

    </form>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Manage Users</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <?php if(Member::get('role_id') == 1) { ?>
                <p><a class='btn btn-sm btn-success' href='<?= admin_url('users/create'); ?>'><i class="fa fa-plus"></i> Create a new User</a></p>
            <?php } ?>

            <?php if (! $users->isEmpty()) { ?>
            <div class="table-responsive" id="entries">
                <table class='table table-striped table-hover'>
                    <tr>
                        <th>Username</th>
                        <th>Tel</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>E-mail</th>
                        <th>Office Login Only</th>
                        <th>Last Logged In</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    foreach ($users->getItems() as $user) {

                        if ($user->lastLoggedIn == null) {
                            $lastLoggedIn = 'Never';
                        } else {
                            $lastLoggedIn = date('jS M Y H:i A', strtotime($user->lastLoggedIn));
                        }

                        echo "
                        <tr>
                            <td><img src='".resource_url($user->imagePath)."' style='border-radius:50%; width:40px;' alt=''> $user->username</td>
                            <td><a href='tel:$user->tel'>$user->tel</a></td>
                            <td><a href='tel:$user->mobile'>$user->mobile</a></td>
                            <td>".$user->role->name."</td>
                            <td>$user->email</td>
                            <td>$user->officeLoginOnly</td>
                            <td>$lastLoggedIn</td>
                            <td>

                                    <a class='btn btn-xs btn-warning' href='" .admin_url('users/' .$user->id). "' title='Show the Details' role='button'><i class='fa fa-search'></i> Profile</a>";

                                    if (Member::get('id') == $user->id || Member::get('role_id') == 1) {
                                        echo " <a class='btn btn-xs btn-success' href='" .admin_url('users/' .$user->id .'/edit') ."' title='Edit this User' role='button'><i class='fa fa-pencil'></i> Edit</a>";
                                    }

                                    if (Member::get('role_id') == 1) {
                                        echo " <a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_" .$user->id ."' title='Delete this User' role='button'><i class='fa fa-remove'></i> Delete</a>";
                                    }

                                echo "
                            </td>
                        </tr>";

                    }
                    ?>
                </table>
            </div>
                <?=$users->appends($queryStrings)->links();?>
        <?php } ?>
        </div>
    </div>


</div>


<?php
if(Member::get('role_id') == 1) {
    if (! $users->isEmpty()) {
        foreach ($users->getItems() as $user) {
    ?>
    <div class="modal modal-default" id="confirm_<?= $user->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"><?= __d('users', 'Delete the User?'); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?= __d('users', 'Are you sure you want to delete the User <b>{0}</b>, the operation being irreversible?', $user->username); ?></p>
                    <p><?= __d('users', 'Please click the button <b>Delete the User</b> to proceed, or <b>Cancel</b> to abbandon the operation.'); ?></p>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button"><?= __d('users', 'Cancel'); ?></button>
                    <form action="<?= admin_url('users/' .$user->id .'/destroy'); ?>" method="POST">
                        <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />
                        <input type="submit" name="button" class="btn btn btn-danger pull-right" value="<?= __d('users', 'Delete the User'); ?>">
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <?php
        }
    }
}
