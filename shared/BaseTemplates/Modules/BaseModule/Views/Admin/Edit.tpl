<section class="content-header">
    <h1>Edit BaseModuleModalTitle</h1>
    <ol class="breadcrumb">
        <li><a href='{{ site_url('admin/dashboard') }}'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href='{{ site_url('admin/BaseModuleSlug') }}'><i class="fa fa-link"></i> BaseModuleTitle</a></li>
		<li>Edit BaseModuleModalTitle</li>
    </ol>
</section>

<section class='content'>

	{{ Session::getMessages() }}

	<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit BaseModuleModalTitle</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">

		<form class="form-horizontal" action='{{ site_url('admin/BaseModuleSlug/'.$record->id) }}' method='post'>
		<input type='hidden' name='csrfToken' value='{{{ $csrfToken }}}'>

		<div class="row">

			<div class="col-md-6">

				<div class="control-group">
                    <label class="control-label" for='title'> Title</label>
                    <input class="form-control" id='title' type="text" name="title" value="{{{ Input::old('title', $record->title) }}}" />
                </div>

			</div>

			<div class="col-md-6">



			</div>

		</div>

		<p><br><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Update</button></p>

		</form>

	</div>
</div>
