<div class="content-header">
    <h2>{{ __d('system', 'Edit Dept') }}</h2>
    <ol class="breadcrumb">
        <li><a href='{{ admin_url('dashboard') }}'><i class="fa fa-dashboard"></i> {{ __d('system', 'Dashboard') }}</a></li>
        <li><a href='{{ admin_url('depts') }}'><i class="fa fa-users"></i> {{ __d('system', 'Depts') }}</a></li>
        <li><strong>{{ __d('system', 'Edit Dept') }}</strong></li>
    </ol>
</div>

<div class="content">
        {{ Session::getMessages() }}

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __d('system', 'Edit Dept') }}</h3>
            </div>
            <div class="box-body">

                <form action="{{{ admin_url("depts/$dept->id") }}}" class="form-horizontal" method='POST'>
                <input type="hidden" name="csrfToken" value="{{{ $csrfToken }}}" />

                <div class="control-group">
                    <label class="control-label" for='title'> {{ __d('system', 'Title') }} <span class="text-danger">*</span></label>
                    <input class="form-control" id='title' type="text" name="title" value="{{{ Input::old('title', $dept->title) }}}" />
                </div>

                <p><br><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> {{ __d('system', 'Update Dept') }}</button></p>

            </div>
        </div>

    </div>
</div>
