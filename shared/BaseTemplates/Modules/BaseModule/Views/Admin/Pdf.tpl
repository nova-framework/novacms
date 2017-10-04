<h1>{{ __d('BaseModuleSlug', 'BaseModuleTitle') }}</h1>

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
