<section class="content-header">
    <h1>Pages</h1>
    <ol class="breadcrumb">
        <li><a href='<?php echo admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Pages</li>
    </ol>
</section>

<section class='content'>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Pages</h3>
    </div>
    <div class="box-body">

		<?php echo Session::getMessages(); ?>


		<p><a href='<?php echo admin_url('pages/create'); ?>' class='btn btn-info btn-xs'><i class='fa fa-plus'></i> Create Page</a></p>

		<div class='table-responsive'>
        <table class='table table-striped table-hover table-bordered'>
        <tr>
        	<th>Title</th>
        	<th>Action</th>
        </tr>
        <?php if(! $pages->isEmpty()): ?>
        	<?php foreach($pages as $row): ?>
        		<tr>
        			<td><?php echo e($row->pageTitle); ?></td>
        			<td>
        			    <a href='<?php echo e(admin_url("pages/$row->id/edit")); ?>' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> Edit</a>
        			    <a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_<?php echo e($row->id); ?>'><i class='fa fa-remove'></i> Delete</a>
        			</td>
        		</tr>
        	<?php endforeach; ?>
        <?php endif; ?>
        </table>
        </div>

        <p><?php echo $pages->links(); ?></p>

    </div>
</div>

</section>


<?php if(! $pages->isEmpty()): ?>
    <?php foreach($pages->getItems() as $page): ?>

<div class="modal modal-default" id="confirm_<?php echo e($page->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Select Page: <?php echo e($page->pageTitle); ?></h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this page?</p>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">Cancel</button>
                <form action="<?php echo e(admin_url("pages/$page->id/destroy")); ?>" method="POST">
                    <input type="hidden" name="csrfToken" value="<?php echo e($csrfToken); ?>" />
                    <input type="submit" name="button" class="btn btn btn-danger pull-right" value="Delete">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
    <?php endforeach; ?>
<?php endif; ?>
