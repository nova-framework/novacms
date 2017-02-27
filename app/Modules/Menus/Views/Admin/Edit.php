<section class="content-header">
    <h1>Edit Menu</h1>
    <ol class="breadcrumb">
        <li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href='<?= admin_url('menus'); ?>'><i class="fa fa-book"></i> Menus</a></li>
        <li>Edit Menu</li>
    </ol>
</section>

<section class='content'>

<div class="box box-primary">
	<div class="box-header with-border">
        <h3 class="box-title">Edit Menu</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">

		<form action='<?=admin_url('menus/'.$menu->id);?>' method='post'>
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
