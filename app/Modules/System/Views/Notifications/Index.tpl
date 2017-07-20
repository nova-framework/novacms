<div class="content-header">
    <div class="col-sm-12">
        <h2>{{ __d('system', 'Notifications') }}</h2>
    </div>
</div>

<div class="content">

    {{ Session::getMessages() }}

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __d('system', 'Notifications') }}</h3>
        </div>
        <div class="box-body">

            <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>{{ __d('system', 'Notification') }}</th>
                <th>{{ __d('system', 'Date') }}</th>
                <th>{{ __d('system', 'From') }}</th>
                <th>{{ __d('system', 'Action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($notifications as $row)

                <tr>
                    <td>{{{ $row->title }}}</td>
                    <td>{{{ date('jS M Y H:i:s', strtotime($row->created_at)) }}}</td>
                    <td>{{{ $row->assignedFromUser->username }}}</td>
                    <td>
                        @if ($row->link !='')
                            <a href='{{{ site_url($row->link) }}}' class='btn btn-small btn-success'><i class='fa fa-share-alt'></i> {{ __d('system', 'View') }}</a>
                        @endif
                    </td>
                </tr>

            @endforeach

            </tbody>
            </table>
            {{ $notifications->links() }}

        </div>
    </div>

</div>
