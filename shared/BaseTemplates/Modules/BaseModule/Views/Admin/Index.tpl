<section class="content-header">
    <h1>BaseModuleTitle</h1>
    <ol class="breadcrumb">
        <li><a href='{{ site_url('admin/dashboard') }}'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>BaseModuleTitle</li>
    </ol>
</section>

<section class='content'>


{{ Session::getMessages() }}

<form method="get" class="well">

    <h2>Filter BaseModuleTitle:</h2>

    <div class="row">

        <div class='col-md-3'>
            <div class="control-group">
                <label class="control-label" for='title'> Title</label>
                <input class="form-control" id='title' type="text" name="title" value="{{{ Input::get('title', Input::get('title')) }}}" />
            </div>
        </div>

    </div>

    <br>

    <div class="pull-left">
        <button type="submit" class="btn btn-xs btn-success" name="submit"><i class="fa fa-check"></i> Apply Filter</button>
        <a href="{{ site_url('BaseModuleSlug') }}" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> Reset Filter</a></p>
    </div>

    <div class="pull-right">
        <a href='#' onclick="printDiv('entries')" class='btn btn-xs btn-success'><i class="fa fa-print"></i> Print</a>
        <a href="{{{ site_url('BaseModuleSlug/export/csv?'.http_build_query($queryStrings)) }}}" class="btn btn-xs btn-success"><i class="fa fa-file-excel-o"></i> Export to CSV</a>
        <a href="{{{ site_url('BaseModuleSlug/export/pdf?'.http_build_query($queryStrings)) }}}" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> Export to PDF</a>
    </div>

    <div class="clearfix"></div>

    <p> {{{ $records->getTotal() }}} Entries</p>

</form>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Manage BaseModuleTitle</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">

        <p><a href='{{ site_url('admin/BaseModuleSlug/create') }}' class='btn btn-primary btn-xs'><i class='fa fa-plus'></i> Create BaseModuleModalTitle</a></p>

		<div id="entries">
        <table class='table table-striped table-hover table-bordered'>
        <thead>
        <tr>
        	<th scope='col'>Title</th>
        	<th scope='col'>Created</th>
        	<th scope='col'>Action</th>
        </tr>
        </thead>
        <tbody>

        @if (! $records->isEmpty())
        	@foreach($records as $row)
        		<tr>
        			<td data-label='Title'>{{{ $row->title }}}</td>
        			<td data-label='Created'>{{{ date('jS M Y', strtotime($row->created_at)) }}}</td>
        			<td data-label='Action'>

                        <a href='#' class='btn btn-xs btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Action <span class='caret'></span></a>

                        <ul class='dropdown-menu table-dropdown'>

                            <li><a href='{{{ site_url('admin/BaseModuleSlug/' .$row->id .'/edit') }}}'><i class='fa fa-pencil' style='color:#FFC107;'></i> Edit</a></li>

                            <li><a href='#' data-toggle='modal' data-target='#confirm_{{{ $row->id }}}' role='button'><i class='fa fa-remove' style='color:#FF5252;'></i> Delete</a></li>

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
                        <h4 class="modal-title">Selected: {{{ $row->title }}}</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this?</p>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">Cancel</button>
                        <form action="{{{ site_url('BaseModuleSlug/' .$row->id .'/destroy') }}}" method="POST">
                            <input type="hidden" name="csrfToken" value="{{{ $csrfToken }}}" />
                            <input type="submit" name="button" class="btn btn btn-danger pull-right" value="Delete">
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
    @endforeach
@endif
