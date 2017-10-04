<div class="col-md-offset-3 col-md-6 mt20">
    <div>
        <?php echo Session::getMessages(); ?>


        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-"></i> <?php echo __d('system', 'Magic Link Login'); ?></div>
            <div class="panel-body">

                <p><?php echo __d('system', 'We can email you a magic link so you can sign in without having to type your password.'); ?></p>

                <form action="<?php echo admin_url('login/magiclink'); ?>" method="post">
                <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>" />

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary block full-width m-b"><?php echo __d('system', 'Send Magic Link'); ?></button>

                    <a href="<?php echo admin_url('login'); ?>"><small><?php echo __d('system', 'Login with password instead'); ?></small></a>

                </form>

            </div>
        </div>

    </div>
</div>
