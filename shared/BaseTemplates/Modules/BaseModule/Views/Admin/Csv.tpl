{{ __d('BaseModuleSlug', 'id') }}, {{ __d('BaseModuleSlug', 'Title') }}, {{ __d('BaseModuleSlug', 'Date Created') }}

@if ($records)
    @foreach ($records as $row)
        {{{ $row->id }}}, {{{$row->title}}}, {{{$row->created_at}}}
    @endforeach
@endif
