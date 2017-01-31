<section class="content-header">
    <h1>Manage Global Blocks</h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Manage Global Blocks</li>
    </ol>
</section>  

<section class='content'>


    <?=Session::getMessages();?>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-cubes"></i> Global Blocks</h3>
    </div>
    <div class="box-body">

    <form action='<?=site_url('admin/globalblocks/update');?>' method='post'>
    <input type='hidden' name='csrfToken' value='<?=$csrfToken;?>'>

    <?php
    if($blocks){

        $x = 0;
        foreach($blocks as $block){

            echo "<div class='panel panel-default'>
            <div class='panel-heading'>
              <h4 class='panel-title'>
                <a data-toggle='collapse' data-parent='#accordion' href='#collapseblock$x'>
                ".$block->title."
                </a>
              </h4>
            </div>
            <div id='collapseblock$x' class='panel-collapse collapse'>
              <div class='panel-body'>

              <input type='hidden' name='id[]' value='$block->id'>
              <a class='btn btn-xs btn-danger pull-right' href='#' data-toggle='modal' data-target='#confirm_" .$block->id ."'><i class='fa fa-remove'></i> Delete</a>
              ";

                switch ($block->type) {
                    case 'input':
                        echo "<input type='text' class='form-control' name='content[]' value='$block->content'>";
                        break;
                    case 'textarea':
                        echo "<textarea class='form-control ckeditor' name='content[]'>$block->content</textarea>";
                        break;
                    case 'plaintextarea':
                        echo "<textarea rows='10' class='form-control' name='content[]'>$block->content</textarea>";
                        break;
                }


              echo "</div>
            </div>
            </div>";
        $x++;}
    }
    ?>

    <?php if (count($blocks) > 0 ) { ?>
    <p><button type="submit" class="btn btn-success" name="updatepageblocks"><i class="fa fa-check"></i> Update Global Blocks</button></p>
    <?php } ?>  

    </form>


    </div>
</div>  

<?php
if ($blocks) {
    foreach ($blocks as $block) {
?>
<div class="modal modal-default" id="confirm_<?= $block->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Select Page Block: <?=$block->title;?></h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this page block?</p>
   
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">Cancel</button>
                <form action="<?= site_url('admin/globalblocks/' .$block->id .'/destroy'); ?>" method="POST">
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
?>

</section>