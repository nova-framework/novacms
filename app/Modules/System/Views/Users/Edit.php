<div class="content-header">
	<h2>Edit User</h2>
	<ol class="breadcrumb">
		<li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href='<?= admin_url('users'); ?>'><i class="fa fa-users"></i> Users</a></li>
		<li><strong>Edit User</strong></li>
	</ol>
</div>

<div class="content">

    <?= Session::getMessages(); ?>

    <?php if($user->forceChangePassword == 'Yes'){?>
        <div class="alert alert-danger">
            <h1><i class="fa fa-warning"></i> Password Change Required</h1>
            <p>As a security measure you are required to change your password before you can use the CRM again.</p>
        </div>
    <?php } ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit User</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <form action="<?= admin_url('users/'.$user->id); ?>" class="form-horizontal" method='POST' enctype="multipart/form-data" role="form">
            <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />

            <div class='row'>

                <div class='col-md-6'>

                    <div class="control-group">
                        <label class="control-label" for='imagePath'> Profile Picture (to change)</label>
                        <input class="form-control" id='imagePath' type="file" name="imagePath" />
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='username'> Username <span class="text-danger">*</span></label>
                        <input class="form-control" id='username' type="text" name="username" value="<?=Input::old('username', $user->username);?>" />
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='email'> Work Email <span class="text-danger">*</span></label>
                        <input class="form-control" id='email' type="text" name="email" value="<?=Input::old('email', $user->email);?>" />
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='personalEmail'>Personal Email:</label>
                        <input class="form-control" id='personalEmail' type="text" name="personalEmail" value="<?=Input::old('personalEmail', $user->personalEmail);?>" />
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='tel'>Tel:</label>
                        <div class="controls"><input class="form-control" id='tel' type="text" name="tel" value="<?=Input::old('tel', $user->tel);?>" /></div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='mobile'>Mobile:</label>
                        <div class="controls"><input class="form-control" id='mobile' type="text" name="mobile" value="<?=Input::old('mobile', $user->mobile);?>" /></div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='jobTitle'>Job Title:</label>
                        <div class="controls"><input class="form-control" id='jobTitle' type="text" name="jobTitle" value="<?=Input::old('jobTitle', $user->jobTitle);?>" /></div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='dept'> User Level <span class="text-danger">*</span></label>

                        <select name="dept" id="dept" class="form-control select2">
                            <?php foreach ($depts as $dept) { ?>
                            <option value="<?= $dept->id ?>" <?php if (Input::old('dept', $user->dept_id) == $dept->id) echo 'selected'; ?>><?= $dept->title; ?></option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="control-group">
                        <label class="control-label" for='company'>Company:</label>
                        <div class="controls"><input class="form-control" id='company' type="text" name="company" value="<?=Input::old('company', $user->company);?>" /></div>
                    </div>

                </div>

                <div class='col-md-6'>

                    <div class="panel panel-info">
                        <div class="panel-heading"><i class="fa fa-lock"></i>  Only enter a new password if you want to change your existing password.</div>
                        <div class="panel-body">

                            <div class="control-group">
                                <label class="control-label" for='password'> Password</label>
                                <input class="form-control" id='password' type="password" name="password" value="" />
                            </div>

                            <div class="control-group">
                                <label class="control-label" for='password_confirmation'> Password Confirmation</label>
                                <small>Enter the same password as above</small>
                                <input class="form-control" id='password_confirmation' type="password" name="password_confirmation" value="" />
                            </div>

                        </div>
                    </div>



                    <div class="control-group">
                        <label class="control-label" for='tshirtSize'>T-Shirt Size (S/M/L/XL):</label>
                        <div class="controls"><input class="form-control" id='tshirtSize' type="text" name="tshirtSize" value="<?=Input::old('tshirtSize', $user->tshirtSize);?>" /></div>
                    </div>

                    <br>
                    <div class="panel panel-info">
                        <div class="panel-heading"><i class="fa fa-info"></i> Next of Kin</div>
                        <div class="panel-body">

                            <div class="control-group">
                                <label class="control-label" for='nextOfKinName'>Name:</label>
                                <div class="controls"><input class="form-control" id='nextOfKinName' type="text" name="nextOfKinName" value="<?=Input::old('nextOfKinName', $user->nextOfKinName);?>" /></div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for='nextOfKinRelationship'>Relationship:</label>
                                <div class="controls"><input class="form-control" id='nextOfKinRelationship' type="text" name="nextOfKinRelationship" value="<?=Input::old('nextOfKinRelationship', $user->nextOfKinRelationship);?>" /></div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for='nextOfKinNumber'>Emergency Number:</label>
                                <div class="controls"><input class="form-control" id='nextOfKinNumber' type="text" name="nextOfKinNumber" value="<?=Input::old('nextOfKinNumber', $user->nextOfKinNumber);?>" /></div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <?php
    //admin level only
    if (Member::get('role_id') == 1) { ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Admin Settings</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <div class="row">

                <div class="col-md-6">

                    <div class="panel panel-info">
                        <div class="panel-heading"><i class="fa fa-info"></i> Only active users can login.</div>
                        <div class="panel-body">

                            <div class="control-group">
                                 <label class="control-label" for='active'>Active:</label>
                                 <div class="controls">
                                    <select name="active" id='active' class="form-control">
                                        <option value="Yes" <?php if(Input::old('active', $user->active) == 'Yes'){ echo "selected='selected'";}?>>Yes</option>
                                        <option value="No" <?php if(Input::old('active', $user->active) == 'No'){ echo "selected='selected'";}?>>No</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="panel panel-info">
                        <div class="panel-heading"><i class="fa fa-info"></i> When set to Yes user can only login when they are using one of the predefined IP addresses set in the main Settings.</div>
                        <div class="panel-body">

                            <div class="control-group">
                                 <label class="control-label" for='officeLoginOnly'>Office Login Only:</label>
                                 <div class="controls">
                                    <select name="officeLoginOnly" id='officeLoginOnly' class="form-control">
                                        <option value="Yes" <?php if(Input::old('officeLoginOnly', $user->officeLoginOnly) == 'Yes'){ echo "selected='selected'";}?>>Yes</option>
                                        <option value="No" <?php if(Input::old('officeLoginOnly', $user->officeLoginOnly) == 'No'){ echo "selected='selected'";}?>>No</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>

                <div class="col-md-6">

                    <div class="control-group">
                        <label class="control-label" for='role_id'> User Level <span class="text-danger">*</span></label>

                        <select name="role_id" id="role_id" class="form-control select2">
                            <?php foreach ($roles as $role) { ?>
                            <option value="<?= $role->id ?>" <?php if (Input::old('role', $user->role_id) == $role->id) echo 'selected'; ?>><?= $role->name; ?></option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="control-group">
                         <label class="control-label" for='isStaff'>Is a member of Staff:</label>
                         <div class="controls">
                            <select name="isStaff" id='isStaff' class="form-control">
                                <option value="Yes" <?php if(Input::old('isStaff', $user->isStaff) == 'Yes'){ echo "selected='selected'";}?>>Yes</option>
                                <option value="No" <?php if(Input::old('isStaff', $user->isStaff) == 'No'){ echo "selected='selected'";}?>>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                         <label class="control-label" for='forceChangePassword'>Force a password change on next login:</label>
                         <div class="controls">
                            <select name="forceChangePassword" id='forceChangePassword' class="form-control">
                                <option value="Yes" <?php if(Input::old('forceChangePassword', $user->forceChangePassword) == 'Yes'){ echo "selected='selected'";}?>>Yes</option>
                                <option value="No" <?php if(Input::old('forceChangePassword', $user->forceChangePassword) == 'No'){ echo "selected='selected'";}?>>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='target'>Target:</label>
                        <div class="controls"><input class="form-control" id='target' type="text" name="target" value="<?=Input::old('target', $user->target);?>" /></div>
                        <small>Useful for financial targets</small>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <?php } ?>


    <div class="ibox">
        <div class="ibox-content">
            <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Save all changes</button>
        </div>
    </div>



</div>
