{{ __d('system', 'User ID') }}, {{ __d('system', 'Title') }}, {{ __d('system', 'Link') }}, {{ __d('system', 'Reference id') }}, {{ __d('system', 'Section') }}, {{ __d('system', 'Type') }}, {{ __d('system', 'Source') }}, {{ __d('system', 'Date Created') }}
@if ($logs)
    @foreach ($logs as $log)
        {{{ $log->user_id }}}, {{{ $log->title }}}, {{{ $log->link }}}, {{{ $log->refID }}}, {{{ $log->section }}}, {{{ $log->type }}}, {{{ $log->source }}}, {{{ $log->created_at }}}
    @endforeach
@endif
