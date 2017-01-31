<section class="content-header">
    <h1>Edit Menu</h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href='<?= site_url('admin/menus'); ?>'><i class="fa fa-book"></i> Menus</a></li>
        <li>Edit Menu</li>
    </ol>
</section>

<section class='content'>

<div class="box box-primary">
    <div class="box-body">

		<form action='<?=site_url('admin/menus/'.$menu->id);?>' method='post'>
		<input type='hidden' name='csrfToken' value='<?=$csrfToken;?>'>

		<?=Session::getMessages();?>

		<div class='row'>

			<div class='col-md-6'>

				<div class="control-group">
				    <label class="control-label" for='title'> Title</label>
				    <input class="form-control" id='title' type="text" name="title" value="<?=Input::old('title', $menu->title);?>" />
				</div>

			</div>

			<div class='col-md-6'>

				<div class="control-group">
				    <label class="control-label" for='type'> Type</label>
				    <select name='type' id='type' class='form-control'>
				    <?php
				    $options = ['Bootstrap', 'Plain'];
				    foreach ($options as $option) {
				    	if (Input::old('type', $menu->type) == $option) {
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

		<p><br>
		    <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Submit</button>
		</p>

		</form>

    </div>
</div>

</section>
