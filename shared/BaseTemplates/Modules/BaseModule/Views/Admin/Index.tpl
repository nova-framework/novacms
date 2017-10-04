<section class="content-header">
    <h1>{{ __d('BaseModuleSlug', 'BaseModuleTitle') }} </h1>
    <ol class="breadcrumb">
        <li><a href='{{ site_url('admin/dashboard') }}'><i class="fa fa-dashboard"></i> {{ __d('BaseModuleSlug', 'Dashboard') }}</a></li>
        <li>{{ __d('BaseModuleSlug', 'BaseModuleTitle') }}</li>
    </ol>
</section>

<section class='content'>

{{ Session::getMessages() }}

<form method="get" class="well">

    <h2>{{ __d('BaseModuleSlug', 'Filter BaseModuleTitle') }}:</h2>

    <div class="row">

        <div class='col-md-3'>
            <div class="control-group">
                <label class="control-label" for='title'> {{ __d('BaseModuleSlug', 'Title') }}</label>
                <input class="form-control" id='title' type="text" name="title" value="{{{ Input::get('title', Input::get('title')) }}}" />
            </div>
        </div>

    </div>

    <br>

    <div class="pull-left">
        <button type="submit" class="btn btn-xs btn-success" name="submit"><i class="fa fa-check"></i> {{ __d('BaseModuleSlug', 'Apply Filter') }}</button>
        <a href="{{ admin_url('BaseModuleSlug') }}" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> {{ __d('BaseModuleSlug', 'Reset Filter') }}</a></p>
    </div>

    <div class="pull-right">
        <a href='#' onclick="printDiv('entries')" class='btn btn-xs btn-success'><i class="fa fa-print"></i> {{ __d('BaseModuleSlug', 'Print') }}</a>
        <a href="{{{ admin_url('BaseModuleSlug/export/csv?'.http_build_query($queryStrings)) }}}" class="btn btn-xs btn-success"><i class="fa fa-file-excel-o"></i> {{ __d('BaseModuleSlug', 'Export to CSV') }}</a>
        <a href="{{{ admin_url('BaseModuleSlug/export/pdf?'.http_build_query($queryStrings)) }}}" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> {{ __d('BaseModuleSlug', 'Export to PDF') }}</a>
    </div>

    <div class="clearfix"></div>

    <p> {{{ $records->getTotal() }}} {{ __d('BaseModuleSlug', 'Entries') }}</p>

</form>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ __d('BaseModuleSlug', 'Manage BaseModuleTitle') }}</h3>
    </div>
    <div class="box-body">

        <p><a href='{{ admin_url('BaseModuleSlug/create') }}' class='btn btn-primary btn-xs'><i class='fa fa-plus'></i> Create BaseModuleModalTitle</a></p>

		<div id="entries" class="table-responsive">
        <table class='table table-striped table-hover table-bordered'>
        <thead>
        <tr>
        	<th>{{ __d('BaseModuleSlug', 'Title') }}</th>
        	<th>{{ __d('BaseModuleSlug', 'Created') }}</th>
        	<th>{{ __d('BaseModuleSlug', 'Action') }}</th>
        </tr>
        </thead>
        <tbody>

        @if (! $records->isEmpty())
        	@foreach($records as $row)
        		<tr>
        			<td>{{{ $row->title }}}</td>
        			<td>{{{ date('jS M Y', strtotime($row->created_at)) }}}</td>
        			<td>

                        <a href='#' class='btn btn-xs btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>{{ __d('BaseModuleSlug', 'Action') }} <span class='caret'></span></a>

                        <ul class='dropdown-menu table-dropdown'>

                            <li><a href='{{{ site_url('admin/BaseModuleSlug/' .$row->id .'/edit') }}}'><i class='fa fa-pencil' style='color:#FFC107;'></i> {{ __d('BaseModuleSlug', 'Edit') }}</a></li>

                            <li><a href='#' data-toggle='modal' data-target='#confirm_{{{ $row->id }}}' role='button'><i class='fa fa-remove' style='color:#FF5252;'></i> {{ __d('BaseModuleSlug', 'Delete') }}</a></li>

                        </ul>

        			</td>
        		</tr>
        	@endforeach
        @endif

        </tbody>
        </table>
        </div>

        {{{ $records->appends($queryStrings)->links() }}}

    </div>
</div>

@if (! $records->isEmpty())
    @foreach ($records->getItems() as $row)
        <div class="modal modal-default" id="confirm_{{{ $row->id }}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">{{ __d('BaseModuleSlug', 'Selected') }}: {{{ $row->title }}}</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ __d('BaseModuleSlug', 'Are you sure you want to delete this?') }}</p>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">{{ __d('BaseModuleSlug', 'Cancel') }}</button>
                        <form action="{{{ site_url('admin/BaseModuleSlug/' .$row->id .'/destroy') }}}" method="POST">
                            <input type="hidden" name="csrfToken" value="{{{ $csrfToken }}}" />
                            <input type="submit" name="button" class="btn btn btn-danger pull-right" value="{{ __d('BaseModuleSlug', 'Delete') }}">
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
    @endforeach
@endif
