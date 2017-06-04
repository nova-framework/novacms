<h1>{{ __d('system', 'Roles') }}</h1>

<table class='table table-striped table-hover'>
    <tr>
        <th>{{ __d('system', 'Role') }}</th>
        <th>{{ __d('system', 'Description') }}</th>
        <th>{{ __d('system', 'Action') }}</th>
    </tr>
    @foreach ($roles->getItems() as $row)

        <tr>
            <td>{{{ $row->name }}}</td>
            <td>{{{ $row->description }}}</td>
            <td>
                <a class='btn btn-xs btn-success' href='{{{ admin_url("roles/$row->id/edit") }}}' role='button'><i class='fa fa-pencil'></i> {{ __d('system', 'Edit') }}</a>
                <a class='btn btn-xs btn-danger' href='#' data-toggle='modal' data-target='#confirm_{{{ $row->id }}}' role='button'><i class='fa fa-remove'></i> {{ __d('system', 'Delete') }}</a>
            </td>
        </tr>

    @endforeach
</table>
