<h1>{{ __d('system', 'Depts') }}</h1>

<table class='table table-striped table-hover'>
<tr>
    <th>{{ __d('system', 'Dept') }}</th>
</tr>
@foreach ($depts as $row)
    <tr>
        <td>{{{ $row->title }}}</td>
    </tr>
@endforeach
</table>
