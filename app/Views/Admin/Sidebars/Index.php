<section class="content-header">
    <h1>Sidebars</h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Sidebars</li>
    </ol>
</section>	

<section class='content'>

<div class="box box-primary">
    <div class="box-body">

		<?=Session::getMessages();?>

		<p><a href='<?=site_url('admin/sidebars/create');?>' class='btn btn-info btn-xs'><i class='fa fa-plus'></i> Create Sidebar</a></p>

        <div class='row'>

            <div class='col-md-6'>

                <div class='table-responsive'>
                <table class='table table-striped table-hover table-bordered'>  
                <tr>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                <?php
                if (! $leftSidebars->isEmpty()) {
                    foreach($leftSidebars as $row) {
                        echo "<tr>";
                            echo "<td>$row->title</td>";
                            echo "<td>

                            <a href='".site_url('admin/sidebars/'.$row->id.'/edit')."' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> Edit</a>

                            <a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_" .$row->id ."'><i class='fa fa-remove'></i> Delete</a>

                            </td>";
                        echo "</tr>";
                    }
                }
                ?>
                </table>
                </div>

            </div>

             <div class='col-md-6'>

                <div class='table-responsive'>
                <table class='table table-striped table-hover table-bordered'>  
                <tr>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                <?php
                if (! $rightSidebars->isEmpty()) {
                    foreach($rightSidebars as $row) {
                        echo "<tr>";
                            echo "<td>$row->title</td>";
                            echo "<td>

                            <a href='".site_url('admin/sidebars/'.$row->id.'/edit')."' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> Edit</a>

                            <a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_" .$row->id ."'><i class='fa fa-remove'></i> Delete</a>

                            </td>";
                        echo "</tr>";
                    }
                }
                ?>
                </table>
                </div>

            </div>

        </div>

		

        <p><?=$sidebars->links();?></p>



    </div>
</div>	

</section>


<?php
if (! $sidebars->isEmpty()) {
    foreach ($sidebars->getItems() as $sidebar) {
?>
<div class="modal modal-default" id="confirm_<?= $sidebar->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Select sidebar: <?=$sidebar->title;?></h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this sidebar?</p>
   
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">Cancel</button>
                <form action="<?= site_url('admin/sidebars/' .$sidebar->id .'/destroy'); ?>" method="POST">
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