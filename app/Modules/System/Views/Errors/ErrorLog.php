<section class="content-header">
    <h1><?= __d('system', 'Error Logs'); ?></h1>
</section>

<!-- Main content -->
<section class="content">

<?= Session::getMessages(); ?>

<p><a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm'><i class='fa fa-remove'></i> Clear Log</a></p>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Error Logs</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">

        <?php
        $logs = str_replace('#0', "<br><br>#0", $logs);
        echo '<pre>'; print_r($logs); echo '</pre>';
        ?>

    </div>
</div>

</section>


<div class="modal modal-default" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Clear the log?</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to empty the log, the operation being irreversible.</p>
                <p>Please click the button <b>Delete the User</b> to proceed, or <b>Cancel</b> to abbandon the operation.</p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">Cancel</button>
                <form action="<?= site_url('admin/errorlog'); ?>" method="POST">
                    <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />
                    <input type="submit" name="button" class="btn btn btn-danger pull-right" value="Empty Log">
                </form>
            </div>
        </div>
    </div>
</div>
