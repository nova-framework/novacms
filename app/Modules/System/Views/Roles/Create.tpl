<div class="content-header">
    <h2>{{ __d('system', 'Create Role') }}</h2>
    <ol class="breadcrumb">
        <li><a href='{{ admin_url('dashboard') }}'><i class="fa fa-dashboard"></i> {{ __d('system', 'Dashboard') }}</a></li>
        <li><a href='{{ admin_url('roles') }}'><i class="fa fa-users"></i> {{ __d('system', 'Roles') }}</a></li>
        <li><strong>{{ __d('system', 'Create Role') }}</strong></li>
    </ol>
</div>

<div class="content">

    {{ Session::getMessages() }}

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __d('system', 'Create Role') }}e</h3>
        </div>
        <div class="box-body">

            <form action="{{ admin_url('roles') }}" class="form-horizontal" method='POST'>
            <input type="hidden" name="csrfToken" value="{{{ $csrfToken }}}" />

            <div class='row'>

                <div class='col-md-6'>

                    <div class="control-group">
                        <label class="control-label" for='name'> {{ __d('system', 'Name') }} <span class="text-danger">*</span></label>
                        <input class="form-control" id='name' type="text" name="name" value="{{{ Input::old('name') }}}" />
                    </div>

                </div>

                <div class='col-md-6'>

                    <div class="control-group">
                        <label class="control-label" for='description'> {{ __d('system', 'Description') }}</label>
                        <input class="form-control" id='description' type="text" name="description" value="{{{ Input::old('description') }}}" />
                    </div>

                </div>

            </div>

            <p><br><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> {{ __d('system', 'Create Role') }}</button></p>

        </div>
    </div>

</div>
