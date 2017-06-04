<section class="content-header">
    <h1>{{ __d('system', 'Create Debt') }}</h1>
    <ol class="breadcrumb">
        <li><a href='{{ admin_url('dashboard') }}'><i class="fa fa-dashboard"></i> {{ __d('system', 'Dashboard') }}</a></li>
        <li><a href='{{ admin_url('depts') }}'><i class="fa fa-book"></i> {{ __d('system', 'Depts') }}</a></li>
        <li>{{ __d('system', 'Create Dept') }}</li>
    </ol>
</section>

<div class="content">

        {{ Session::getMessages() }}

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __d('system', 'Create Dept') }}</h3>
            </div>
            <div class="box-body">

                <form action="{{ admin_url('depts') }}" class="form-horizontal" method='POST'>
                <input type="hidden" name="csrfToken" value="{{{ $csrfToken }}}" />

                <div class="control-group">
                    <label class="control-label" for='title'> {{ __d('system', 'Name') }} <span class="text-danger">*</span></label>
                    <input class="form-control" id='title' type="text" name="title" value="{{{ Input::old('title') }}}" />
                </div>

                <p><br><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> {{ __d('system', 'Create Dept') }}</button></p>

            </div>
        </div>

    </div>
</div>
