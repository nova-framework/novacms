<div class="col-md-offset-3 col-md-6 mt20">
    <div>
        <?php echo Session::getMessages(); ?>


        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-"></i> <?php echo __d('system', 'Login with Password'); ?></div>
            <div class="panel-body">

                <form action="<?php echo admin_url('login'); ?>" method="post">
                <input type="hidden" name="csrfToken" value="<?php echo e($csrfToken); ?>" />
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary block full-width m-b"><?php echo __d('system', 'Login'); ?></button>

                    <a href="<?php echo admin_url('password/remind'); ?>"><small><?php echo __d('system', 'Forgot password?'); ?></small></a> |
                    <a href="<?php echo admin_url('login/magiclink'); ?>"><small><?php echo __d('system', 'Use magic link instead'); ?></small></a>

                </form>

            </div>
        </div>


    </div>
</div>
