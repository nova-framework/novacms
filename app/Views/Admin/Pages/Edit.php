<?php

use App\Models\User;

?>
<section class="content-header">
    <h1>Edit Page</h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href='<?= site_url('admin/pages'); ?>'><i class="fa fa-book"></i> Pages</a></li>
        <li>Edit Page</li>
    </ol>
</section>	

<section class='content'>

<div class="box box-primary">
    <div class="box-body">

		<form action='<?=site_url('admin/pages/'.$page->id);?>' method='post'>
		<input type='hidden' name='csrfToken' value='<?=$csrfToken;?>'>

		<?=Session::getMessages();?>

		<div class='row'>

			<div class='col-md-6'>

				<div class="control-group">
				    <label class="control-label" for='browserTitle'> Browser Title</label>
				    <input class="form-control" id='browserTitle' type="text" name="browserTitle" value="<?=Input::old('browserTitle', $page->browserTitle);?>" />
				</div>

				<div class="control-group">
				    <label class="control-label" for='pageTitle'> Page Title</label>
				    <input class="form-control" id='pageTitle' type="text" name="pageTitle" value="<?=Input::old('pageTitle', $page->pageTitle);?>" />
				</div>	

				<div class="control-group">
				    <label class="control-label" for='active'> Active</label>
				    <select name='active' id='active' class='form-control'>
				    <?php
				    $options = ['Yes', 'No'];
				    foreach ($options as $option) {
				    	if (Input::old('active', $page->active) == $option) {
				    		$sel = 'selected=selected';
				    	} else {
				    		$sel = null;
				    	}
				    	echo "<option value='$option' $sel>$option</option>";
				    }
				    ?>
				    </select>
				</div>

			</div>

			<div class='col-md-6'>

				<div class="control-group">
				    <label class="control-label" for='publishedDate'> Published Date</label>
				    <input class="form-control" id='publishedDate' type="text" name="publishedDate" value="<?=Input::old('publishedDate', $page->publishedDate);?>" />
				</div>

				<div class="control-group">
				    <label class="control-label" for='layout'> Layout File</label>
				    <select name='layout' id='layout' class='form-control'>
				    <?php
				    foreach ($layouts as $option) {
				    	if (Input::old('layout', $page->layout) == $option) {
				    		$sel = 'selected=selected';
				    	} else {
				    		$sel = null;
				    	}
				    	echo "<option value='$option' $sel>$option</option>";
				    }
				    ?>
				    </select>
				</div>

			</div>

		</div>

		<br>

		<div class='row'>

			<div class='col-md-6'>

				<div class="control-group">
				    <label class="control-label" for='sidebars'> Left Sidebars</label><br>
				    
				    <?php
				    $sidebars = Input::old('sidebars', $page->sidebars);
				    $sidebars = explode(',', $sidebars);

				    foreach ($leftSidebars as $sidebar) {
				    	if (in_array($sidebar->id, $sidebars)) {
				    		$check = 'checked=checked';
				    	} else {
				    		$check = null;
				    	}
				    	echo "<input type='checkbox' name='sidebars[]' value='$sidebar->id' $check> $sidebar->title<br>";
				    }
				    ?>
				</div>

			</div>

			<div class='col-md-6'>

				<div class="control-group">
				    <label class="control-label" for='sidebars'> Right Sidebars</label><br>
				    
				    <?php
				    $sidebars = Input::old('sidebars', $page->sidebars);
				    $sidebars = explode(',', $sidebars);

				    foreach ($rightSidebars as $sidebar) {
				    	if (in_array($sidebar->id, $sidebars)) {
				    		$check = 'checked=checked';
				    	} else {
				    		$check = null;
				    	}
				    	echo "<input type='checkbox' name='sidebars[]' value='$sidebar->id' $check> $sidebar->title<br>";
				    }
				    ?>
				</div>

			</div>

		</div>

		<br>

		<div class="control-group">
		    <label class="control-label" for='content'> Content</label>
		    <textarea class="form-control ckeditor" id='content' name="content" rows='10'><?=Input::old('content', $page->content);?></textarea>
		</div>	

		<p><br>
		    <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Submit</button>
		</p>	

		</form>

    </div>
</div>	

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-clock-o"></i> Revisions</h3>
    </div>
    <div class="box-body">

	<?php
	if($revisions){

		$i = 0;
		foreach($revisions as $revision){

			$user = User::find($revision->addedBy);

			echo "<div class='panel panel-default'>
			<div class='panel-heading'>
			  <h4 class='panel-title'>
			    <a data-toggle='collapse' data-parent='#accordion' href='#collapse$i'>
			      By ".$user->username." on ".date('jS M Y G:i:s', strtotime($revision->created_at))."
			    </a>
			  </h4>
			</div>
			<div id='collapse$i' class='panel-collapse collapse'>
			  <div class='panel-body'>

				

				<p><a href='/admin/pages/restorerevision/$revision->id' class='btn btn-sm btn-info'><i class='fa fa-refresh'></i> Restore this revision</a></p>

				<table class='table table-striped table-hover table-bordered'>
				<tr>
					<th>Current Version</th>
					<th>This Revision</th>
				</tr>
				<tr>
					<td>".Input::old('content', $page->content)."</th>
					<td>$revision->content</th>
				</tr>
				</table>

				
			  </div>
			</div>
			</div>";
		$i++;}
	}
	?>


    </div>
</div>	


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-cubes"></i> Page Blocks</h3>
    </div>
    <div class="box-body">

	<form action='<?=site_url('admin/pages/updatepageblocks');?>' method='post'>
	<input type='hidden' name='csrfToken' value='<?=$csrfToken;?>'>

	<?php
	if($pageBlocks){

		$x = 0;
		foreach($pageBlocks as $block){

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

	<?php if (count($pageBlocks) > 0 ) { ?>
	<p><button type="submit" class="btn btn-success" name="updatepageblocks"><i class="fa fa-check"></i> Update Page Blocks</button></p>
	<?php } ?>	

	</form>


    </div>
</div>	

<?php
if ($pageBlocks) {
    foreach ($pageBlocks as $block) {
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
                <form action="<?= site_url('admin/pages/pageblocks/' .$block->id .'/destroy'); ?>" method="POST">
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