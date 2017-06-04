<section class="content-header">
    <h1>{{ __d('BaseModuleSlug', 'Create BaseModuleModalTitle') }}</h1>
    <ol class="breadcrumb">
        <li><a href='{{ site_url('admin/dashboard') }}'><i class="fa fa-dashboard"></i> {{ __d('BaseModuleSlug', 'Dashboard') }}</a></li>
        <li><a href='{{ site_url('admin/BaseModuleSlug') }}'><i class="fa fa-link"></i> {{ __d('BaseModuleSlug', 'BaseModuleTitle') }}</a></li>
		<li>{{ __d('BaseModuleSlug', 'Create BaseModuleModalTitle') }}</li>
    </ol>
</section>

<section class='content'>

	{{ Session::getMessages() }}

	<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ __d('BaseModuleSlug', 'Create BaseModuleModalTitle') }}</h3>
    </div>
    <div class="box-body">

		<form class="form-horizontal" action='{{ admin_url('BaseModuleSlug') }}' method='post'>
		<input type='hidden' name='csrfToken' value='{{{ $csrfToken }}}'>

		<div class="row">

			<div class="col-md-6">

				<div class="control-group">
                    <label class="control-label" for='title'> {{ __d('BaseModuleSlug', 'Title') }}</label>
                    <input class="form-control" id='title' type="text" name="title" value="{{{ Input::old('title') }}}" />
                </div>

			</div>

			<div class="col-md-6">


			</div>

		</div>

		<p><br><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> {{ __d('BaseModuleSlug', 'Create') }}</button></p>

		</form>

	</div>
</div>
