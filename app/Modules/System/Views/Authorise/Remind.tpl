<div class="col-md-offset-3 col-md-6 mt20">
    <div>
        {{ Session::getMessages() }}

        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-"></i> {{ __d('system', 'Reset password') }}</div>
            <div class="panel-body">

                <p>{{ __d('system', 'Please enter your e-mail address to be sent a link to reset your password.') }}</p>

                <form role="form" method="post">
                <input type="hidden" name="csrfToken" value="{{ $csrfToken }}" />
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary block full-width m-b">{{ __d('system', 'Reset') }}</button>

                    <a href="{{ admin_url('login') }}"><small>{{ __d('system', 'Login with password') }}</small></a> |
                    <a href="{{ admin_url('login/magiclink') }}"><small>{{ __d('system', 'Use magic link instead') }}</small></a>

                </form>

            </div>
        </div>


    </div>
</div>
