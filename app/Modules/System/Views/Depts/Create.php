<section class="content-header">
    <h1>Create Debt</h1>
    <ol class="breadcrumb">
        <li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href='<?= admin_url('depts'); ?>'><i class="fa fa-book"></i> Debts</a></li>
        <li>Create Debt</li>
    </ol>
</section>

<div class="content">

        <?= Session::getMessages(); ?>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create Dept</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <form action="<?= admin_url('depts'); ?>" class="form-horizontal" method='POST'>
                <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />

                <div class="control-group">
                    <label class="control-label" for='title'> Name <span class="text-danger">*</span></label>
                    <input class="form-control" id='title' type="text" name="title" value="<?=Input::old('title');?>" />
                </div>

                <p><br><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Create Dept</button></p>

            </div>
        </div>

    </div>
</div>
