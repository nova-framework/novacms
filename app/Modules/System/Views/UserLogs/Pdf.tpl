<h1>{{ __d('system', 'User Logs') }}</h1>

<table class='table table-striped table-hover'>
    <tr>
        <th>{{ __d('system', 'Title') }}</th>
        <th>{{ __d('system', 'Reference id') }}</th>
        <th>{{ __d('system', 'Section') }}</th>
        <th>{{ __d('system', 'Type') }}</th>
        <th>{{ __d('system', 'Source') }}</th>
        <th>{{ __d('system', 'View') }}</th>
        <th>{{ __d('system', 'Date Created') }}</th>
    </tr>
    @foreach ($logs as $row)
        <tr>
            <td>{{{ $row->user->username }}} {{{ $row->title }}}</td>
            <td>{{{ $row->refID }}}</td>
            <td>{{{ ucwords($row->section) }}}</td>
            <td>{{{ $row->type }}}</td>
            <td>{{{ $row->source }}}</td>
            <td>
                @if ($row->link !='')
                    <a class='btn btn-xs btn-success' href='{{{ site_url($row->link) }}}'><i class='fa fa-eye'></i> {{ __d('system', 'View') }}</a>
                @endif
            </td>
            <td>{{{ date('jS M Y H:i:s', strtotime($row->created_at)) }}}</td>
        </tr>
    @endforeach
</table>
