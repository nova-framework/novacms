<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <?= Session::getMessages(); ?>

        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-"></i> Reset Password</div>
            <div class="panel-body">

                <p>Please enter your e-mail address to be sent a link to reset your password.</p>

                <form class="m-t" role="form" method="post">
                <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Reset</button>

                    <a href="<?=admin_url('login');?>"><small>Login with password</small></a> |
                    <a href="<?= admin_url('login/magiclink'); ?>"><small>Use magic link instead.</small></a>

                </form>

            </div>
        </div>


    </div>
</div>
