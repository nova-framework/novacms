<div class="content-header">
    <h2>Edit Dept</h2>
    <ol class="breadcrumb">
        <li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href='<?= admin_url('depts'); ?>'><i class="fa fa-users"></i> Depts</a></li>
        <li><strong>Edit Dept</strong></li>
    </ol>
</div>

<div class="content">
        <?= Session::getMessages(); ?>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Dept</h3>
            </div>
            <div class="box-body">

                <form action="<?= admin_url('depts/'.$dept->id); ?>" class="form-horizontal" method='POST'>
                <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />

                <div class="control-group">
                    <label class="control-label" for='title'> Title <span class="text-danger">*</span></label>
                    <input class="form-control" id='title' type="text" name="title" value="<?=Input::old('title', $dept->title);?>" />
                </div>

                <p><br><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Update Dept</button></p>

            </div>
        </div>

    </div>
</div>
