<h1>BaseModuleTitle</h1>

<table class='table table-striped table-hover table-bordered'>
<thead>
<tr>
    <th>Title</th>
    <th>Created</th>
</tr>
</thead>
<tbody>

@if (! $records->isEmpty())
    @foreach($records as $row)
        <tr>
            <td>{{{ $row->title }}}</td>
            <td>{{{ date('jS M Y', strtotime($row->created_at)) }}}</td>
        </tr>
    @endforeach
@endif

</tbody>
</table>
