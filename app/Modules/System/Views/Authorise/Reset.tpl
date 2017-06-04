<div class="col-md-offset-3 col-md-6 mt20">
    <div>
        {{ Session::getMessages() }}

        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-lock"></i> {{ __d('system', 'Password reset') }}</div>
            <div class="panel-body">

                <form action="{{ admin_url('password/reset') }}" method="post">
                <input type="hidden" name="csrfToken" value="{{ $csrfToken }}" />
                <input type="hidden" name="token" value="{{ $token }}" />

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Insert the current E-Mail" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Insert the new Password" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Verify the new Password" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary block full-width m-b">{{ __d('system', 'Change Password') }}</button>

                    <a href="{{ admin_url('login') }}"><small>{{ __d('system', 'Login with password') }}</small></a> |
                    <a href="{{ admin_url('login/magiclink') }}"><small>{{ __d('system', 'Use magic link instead') }}.</small></a>

                </form>

            </div>
        </div>


    </div>
</div>
