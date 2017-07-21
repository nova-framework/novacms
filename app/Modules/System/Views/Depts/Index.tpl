<section class="content-header">
    <h1>{{ __d('system', 'Depts') }}</h1>
    <ol class="breadcrumb">
        <li><a href='{{ admin_url('dashboard') }}'><i class="fa fa-dashboard"></i> {{ __d('system', 'Dashboard') }}</a></li>
    </ol>
</section>

<section class="content">

        {{ Session::getMessages() }}

        <form method="get" class="well">

            <h2>{{ __d('system', 'Filter Depts') }}:</h2>

            <div class="row">

                <div class='col-md-3'>
                    <div class="control-group">
                        <label class="control-label" for='title'> {{ __d('system', 'Title') }}</label>
                        <input class="form-control" id='title' type="text" name="title" value="{{{ Input::old('title', Input::get('title')) }}}" />
                    </div>
                </div>

            </div>

            <br>

            <div class="pull-left">
                <button type="submit" class="btn btn-xs btn-success" name="submit"><i class="fa fa-check"></i> {{ __d('system', 'Filter Depts') }}</button>
                <a href="{{ admin_url('depts') }}" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i> {{ __d('system', 'Reset Filter') }}</a></p>
            </div>

            <div class="pull-right">
                <a href='#' onclick="printDiv('entries')" class='btn btn-xs btn-success'><i class="fa fa-print"></i> {{ __d('system', 'Print') }}</a>
                <a href="{{ admin_url('depts/export/csv?'.http_build_query($queryStrings)) }}" class="btn btn-xs btn-success"><i class="fa fa-file-excel-o"></i> {{ __d('system', 'Export to CSV') }}</a>
                <a href="{{ admin_url('depts/export/pdf?'.http_build_query($queryStrings)) }}" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> {{ __d('system', 'Export to PDF') }}</a>
            </div>

            <div class="clearfix"></div>

            <p> {{ $depts->getTotal() }} {{ __d('system', 'Entries') }}</p>

        </form>

		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __d('system', 'Depts') }}</h3>
            </div>
            <div class="box-body">

                <p><a class='btn btn-sm btn-success' href='{{ admin_url('depts/create') }}'><i class="fa fa-plus"></i> {{ __d('system', 'Create a new dept') }}</a></p>

                @if (! $depts->isEmpty())
                <div class="table-responsive" id="entries">
                    <table class='table table-striped table-hover'>
                        <tr>
                            <th>{{ __d('system', 'Dept') }}</th>
                            <th>{{ __d('system', 'Action') }}</th>
                        </tr>
                        @foreach ($depts as $row)

                            <tr>
                                <td>{{{ $row->title }}}</td>
                                <td>
                                    <a class='btn btn-xs btn-success' href='{{{ admin_url("depts/$row->id/edit") }}}' role='button'><i class='fa fa-pencil'></i> {{ __d('system', 'Edit') }}</a>
                                    <a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_{{{ $row->id }}}' role='button'><i class='fa fa-remove'></i> {{ __d('system', 'Delete') }}</a>
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
                    {{ $depts->appends($queryStrings)->links() }}
            @endif
            </div>
        </div>
</div>


@if (! $depts->isEmpty())
    @foreach ($depts as $row)
<div class="modal modal-default" id="confirm_{{{ $row->id }}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ __d('system', 'Delete the dept') }}</h4>
            </div>
            <div class="modal-body">
                <p>{{ __d('system', 'Are you sure you want to delete this dept?') }}</p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button">{{ __d('system', 'Cancel') }}</button>
                <form action="{{{ admin_url("depts/$row->id/destroy") }}}" method="POST">
                    <input type="hidden" name="csrfToken" value="{{{ $csrfToken }}}" />
                    <input type="submit" name="button" class="btn btn btn-danger pull-right" value="{{ __d('system', 'Delete') }}">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
    @endforeach
@endif
