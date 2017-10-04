<div class="content-header">
    <div class="col-sm-12">
        <h2><?php echo __d('system', 'Notifications'); ?></h2>
    </div>
</div>

<div class="content">

    <?php echo Session::getMessages(); ?>


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo __d('system', 'Notifications'); ?></h3>
        </div>
        <div class="box-body">

            <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th><?php echo __d('system', 'Notification'); ?></th>
                <th><?php echo __d('system', 'Date'); ?></th>
                <th><?php echo __d('system', 'From'); ?></th>
                <th><?php echo __d('system', 'Action'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($notifications as $row): ?>

                <tr>
                    <td><?php echo e($row->title); ?></td>
                    <td><?php echo e(date('jS M Y H:i:s', strtotime($row->created_at))); ?></td>
                    <td><?php echo e($row->assignedFromUser->username); ?></td>
                    <td>
                        <?php if($row->link !=''): ?>
                            <a href='<?php echo e(site_url($row->link)); ?>' class='btn btn-small btn-success'><i class='fa fa-share-alt'></i> <?php echo __d('system', 'View'); ?></a>
                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
            </table>
            <?php echo $notifications->links(); ?>


        </div>
    </div>

</div>
