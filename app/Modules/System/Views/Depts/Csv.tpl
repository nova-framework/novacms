{{ __d('system', 'id') }}, {{ __d('system', 'title') }}, {{ __d('system', 'Date Created') }}
@if ($depts)
    @foreach ($depts as $row)
        {{{ $row->id }}}, {{{ $row->title }}}, {{{$row->created_at}}}
    @endforeach
@endif
