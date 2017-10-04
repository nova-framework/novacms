<div class="content-header">
    <h2><?php echo __d('system', 'User Logs'); ?></h2>
    <ol class="breadcrumb">
        <li><a href='<?php echo admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> <?php echo __d('system', 'Dashboard'); ?></a></li>
        <li><strong><?php echo __d('system', 'User Logs'); ?></strong></li>
    </ol>
</div>

<div class="content">

    <?php echo Session::getMessages(); ?>


     <form method="get" class="well">

        <h2><?php echo __d('system', 'Filter Logs'); ?>:</h2>

        <div class="row">

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='title'> <?php echo __d('system', 'Title'); ?></label>
                    <input class="form-control" id='title' type="text" name="title" value="<?php echo e(Input::old('title', Input::get('title'))); ?>" />
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='daterange'> <?php echo __d('system', 'Date Range'); ?></label>
                    <input class="form-control daterange" id='daterange' type="text" name="daterange" value="<?php echo e(Input::old('daterange', Input::get('daterange'))); ?>" />
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='link'> <?php echo __d('system', 'Link'); ?></label>
                    <input class="form-control" id='link' type="text" name="link" value="<?php echo e(Input::old('link', Input::get('link'))); ?>" />
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='refID'> <?php echo __d('system', 'Reference id'); ?></label>
                    <input class="form-control" id='refID' type="text" name="refID" value="<?php echo e(Input::old('refID', Input::get('refID'))); ?>" />
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='user_id'> <?php echo __d('system', 'User'); ?></label>
                    <select name='user_id' id='user_id' class='form-control'>
                    <option value=''><?php echo __d('system', 'Select'); ?></option>
                    <?php
                    foreach ($users as $row) {
                        if (Input::old('user_id', Input::get('user_id')) == $row->id) {
                            $sel = 'selected=selected';
                        } else {
                            $sel = null;
                        }
                        echo "<option value='$row->id' $sel>$row->username</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='section'> <?php echo __d('system', 'Section'); ?></label>
                    <select name='section' id='section' class='form-control'>
                    <option value=''><?php echo __d('system', 'Select'); ?></option>
                    <?php
                    foreach ($sections as $row) {
                        if (Input::old('section', Input::get('section')) == $row->section) {
                            $sel = 'selected=selected';
                        } else {
                            $sel = null;
                        }
                        echo "<option value='$row->section' $sel>$row->section</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='type'> <?php echo __d('system', 'Type'); ?></label>
                    <select name='type' id='type' class='form-control'>
                    <option value=''><?php echo __d('system', 'Select'); ?></option>
                    <?php
                    foreach ($types as $row) {
                        if (Input::old('type', Input::get('type')) == $row->type) {
                            $sel = 'selected=selected';
                        } else {
                            $sel = null;
                        }
                        echo "<option value='$row->type' $sel>$row->type</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class='col-md-3'>
                <div class="control-group">
                    <label class="control-label" for='source'> <?php echo __d('system', 'Source'); ?></label>
                    <select name='source' id='source' class='form-control'>
                    <option value=''><?php echo __d('system', 'Select'); ?></option>
                    <?php
                    foreach ($sources as $row) {
                        if (Input::old('source', Input::get('source')) == $row->source) {
                            $sel = 'selected=selected';
                        } else {
                            $sel = null;
                        }
                        echo "<option value='$row->source' $sel>$row->source</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>


        </div>

        <br>

        <div class="pull-left">
            <button type="submit" class="btn btn-xs btn-success" name="submit"><i class="fa fa-check"></i> <?php echo __d('system', 'Filter Logs'); ?></button>
            <a href="<?php echo admin_url('userlogs'); ?>" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> <?php echo __d('system', 'Reset Filter'); ?></a></p>
        </div>

        <div class="pull-right">
            <a href='#' onclick="printDiv('entries')" class='btn btn-xs btn-success'><i class="fa fa-print"></i> <?php echo __d('system', 'Print'); ?></a>
            <a href="<?php echo e(admin_url('userlogs/export/csv?'.http_build_query($queryStrings))); ?>" class="btn btn-xs btn-success"><i class="fa fa-file-excel-o"></i> <?php echo __d('system', 'Export to CSV'); ?></a>
            <a href="<?php echo e(admin_url('userlogs/export/pdf?'.http_build_query($queryStrings))); ?>" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> <?php echo __d('system', 'Export to PDF'); ?></a>
        </div>

        <div class="clearfix"></div>

        <p> <?php echo $logs->getTotal(); ?> <?php echo __d('system', 'Entries'); ?></p>

    </form>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo __d('system', 'User Logs'); ?></h3>
        </div>
        <div class="box-body">

            <div class="table-responsive" id='entries'>
                <table class='table table-striped table-hover'>
                    <tr>
                        <th><?php echo __d('system', 'Title'); ?></th>
                        <th><?php echo __d('system', 'Referecne id'); ?></th>
                        <th><?php echo __d('system', 'Section'); ?></th>
                        <th><?php echo __d('system', 'Type'); ?></th>
                        <th><?php echo __d('system', 'Source'); ?></th>
                        <th><?php echo __d('system', 'View'); ?></th>
                        <th><?php echo __d('system', 'Date Created'); ?></th>
                    </tr>
                    <?php foreach($logs as $row): ?>
                        <tr>
                            <td><?php echo e($row->user->username); ?> <?php echo e($row->title); ?></td>
                            <td><?php echo e($row->refID); ?></td>
                            <td><?php echo e(ucwords($row->section)); ?></td>
                            <td><?php echo e($row->type); ?></td>
                            <td><?php echo e($row->source); ?></td>
                            <td>
                                <?php if($row->link !=''): ?>
                                    <a class='btn btn-xs btn-success' href='<?php echo e(admin_url($row->link)); ?>'><i class='fa fa-eye'></i> <?php echo __d('system', 'View'); ?></a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(date('jS M Y H:i:s', strtotime($row->created_at))); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php echo $logs->appends($queryStrings)->links(); ?>

        </div>
    </div>
    
</div>
