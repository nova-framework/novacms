<div class="col-md-offset-3 col-md-6 mt20">
    <div>
        <?= Session::getMessages(); ?>

        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-"></i> Login with password</div>
            <div class="panel-body">

                <form action="<?=admin_url('login');?>" method="post">
                <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="<?= admin_url('password/remind'); ?>"><small>Forgot password?</small></a> |
                    <a href="<?= admin_url('login/magiclink'); ?>"><small>Use magic link instead.</small></a>

                </form>

            </div>
        </div>


    </div>
</div>
