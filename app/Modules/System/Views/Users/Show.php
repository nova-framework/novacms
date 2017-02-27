<div class="content-header">
	<h2>Profile</h2>
	<ol class="breadcrumb">
		<li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href='<?= admin_url('users'); ?>'><i class="fa fa-users"></i> Users</a></li>
		<li><strong>Profile</strong></li>
	</ol>
</div>

<div class="content">

    <?= Session::getMessages(); ?>

	<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Profile</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">

            <div class='table-responsive'>
            <table class='table table-striped table-hover table-bordered'>
            <tr>
                <th style='text-align: center; vertical-align: right;'><?= __d('users', 'ID'); ?></th>
                <td style='text-align: center; vertical-align: middle;' width='70%'><?= $user->id; ?></td>
            <tr>
            <tr>
                <th style='text-align: center; vertical-align: right;'><?= __d('users', 'Username'); ?></th>
                <td style='text-align: center; vertical-align: middle;' width='75%'><?= $user->username; ?></td>
            </tr>
            <tr>
                <th style='text-align: center; vertical-align: right;'><?= __d('users', 'Role'); ?></th>
                <td style='text-align: center; vertical-align: middle;' width='75%'><?= $user->role->name; ?></td>
            </tr>
            <tr>
                <th style='text-align: center; vertical-align: right;'><?= __d('users', 'Name and Surname'); ?></th>
                <td style='text-align: center; vertical-align: middle;' width='75%'><?= $user->realname; ?></td>
            </tr>
            <tr>
                <th style='text-align: center; vertical-align: right;'><?= __d('users', 'E-mail'); ?></th>
                <td style='text-align: center; vertical-align: middle;' width='75%'><?= $user->email; ?></td>
            </tr>
            <tr>
                <th style='text-align: center; vertical-align: right;'><?= __d('users', 'Created At'); ?></th>
                <td style='text-align: center; vertical-align: middle;' width='75%'><?= $user->created_at->formatLocalized('%d %b %Y, %R'); ?></td>
            </tr>
            <tr>
                <th style='text-align: center; vertical-align: right;'><?= __d('users', 'Updated At'); ?></th>
                <td style='text-align: center; vertical-align: middle;' width='75%'><?= $user->updated_at->formatLocalized('%d %b %Y, %R'); ?></td>
            <tr>
        </table>
        </div>

        </div>
    </div>

</div>
