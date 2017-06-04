{{ __d('system', 'id') }}, {{ __d('system', 'Name') }}, {{ __d('system', 'Slug') }}, {{ __d('system', 'Description') }}, {{ __d('system', 'Date Created') }}
@if ($roles)
    @foreach ($roles as $row)
        {{{ $row->id }}}, {{{ $row->name }}}, {{{ $row->slug }}}, {{{ $row->description }}}, {{{ $row->created_at }}}
    @endforeach
@endif
