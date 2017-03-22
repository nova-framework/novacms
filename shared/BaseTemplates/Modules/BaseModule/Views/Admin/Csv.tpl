id, Title, Date Created

@if ($records)
    @foreach ($records as $row)
        {{{ $row->id }}}, {{{$row->title}}}, {{{$row->created_at}}}
    @endforeach
@endif
