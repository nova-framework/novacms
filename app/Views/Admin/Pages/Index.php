<section class="content-header">
    <h1>Pages</h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Pages</li>
    </ol>
</section>	

<section class='content'>

<div class="box box-primary">
    <div class="box-body">

		<?=Session::getMessages();?>

		<p><a href='<?=site_url('admin/pages/create');?>' class='btn btn-info btn-xs'><i class='fa fa-plus'></i> Create Page</a></p>

		<div class='table-responsive'>
        <table class='table table-striped table-hover table-bordered'>	
        <tr>
        	<th>Title</th>
        	<th>Action</th>
        </tr>
        <?php
        if (! $pages->isEmpty()) {
        	foreach($pages as $row) {
        		echo "<tr>";
        			echo "<td>$row->pageTitle</td>";
        			echo "<td>

        			<a href='".site_url('admin/pages/'.$row->id.'/edit')."' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> Edit</a>

        			<a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_" .$row->id ."'><i class='fa fa-remove'></i> Delete</a>

        			</td>";
        		echo "</tr>";
        	}
        }
        ?>
        </table>
        </div>

        <p><?=$pages->links();?></p>



    </div>
</div>	

</section>


<?php
if (! $pages->isEmpty()) {
    foreach ($pages->getItems() as $page) {
?>
<div class="modal modal-default" id="confirm_<?= $page->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Select Page: <?=$page->pageTitle;?></h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this page?</p>
   
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">Cancel</button>
                <form action="<?= site_url('admin/pages/' .$page->id .'/destroy'); ?>" method="POST">
                    <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />
                    <input type="submit" name="button" class="btn btn btn-danger pull-right" value="Delete">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<?php
    }
}