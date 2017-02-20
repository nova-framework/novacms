<!DOCTYPE html>
<html lang="{{ Language::code() }}">
<head>
    <meta charset="utf-8">
    <title>{{ $title }} - {{ Config::get('app.name', SITETITLE) }}</title>

{{ $meta or '' }}

{{
Assets::css([
    vendor_url('dist/css/bootstrap.min.css', 'twbs/bootstrap'),
    vendor_url('dist/css/bootstrap-theme.min.css', 'twbs/bootstrap'),
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
    theme_url('css/style.css', 'Bootstrap'),
])
}}

{{ $css or '' }}

</head>
<body>

<div class="container">

    <div class='row'>

        <div class='col-md-3'>
            <p><img src='{{ theme_url('images/nova.png', 'Bootstrap') }}' alt='{{ Config::get('app.name') }}' class='img-responsive'></p>
        </div>

        <div class='col-md-2 pull-right'>
            {{{ GlobalBlocks::get('Phone Number', 'input') }}}
        </div>

    </div>

</div>

    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                {{ GlobalBlocks::get('Header Nav','input') }}
            </div><!--/.nav-collapse -->
        </div>
    </div>

<div class="container">

    <div class='row'>

        <div class='col-md-2'>

            @if (isset($leftSidebars))
                @foreach ($leftSidebars as $row)
                    <div class='widget {{ $row->class }}'>
                        <div class='widgetTitle page-header'><h1>{{{ $row->title }}}</h1></div>
                        <div class='widgetBody'>{{ $row->content }}</div>
                    </div>
                @endforeach
            @endif

        </div>

        <div class='col-md-8'>
            {{ $content }}

            @if (isset($pageID))
                {{-- echo PageBlocks::get($pageID, 'Social Media Info', 'textarea') --}}
            @endif

        </div>

        <div class='col-md-2'>
            @if (isset($rightSidebars))
                @foreach ($rightSidebars as $row)
                    <div class='widget {{ $row->class }}'>
                        <div class='widgetTitle page-header'><h1>{{ $row->title }}</h1></div>
                        <div class='widgetBody'>{{ $row->content }}</div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>

</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row" style="margin: 15px 0 0;">
            <div class="col-lg-4">
                {{ GlobalBlocks::get('Footer', 'textarea') }}
            </div>
            <div class="col-lg-8">
                <p class="text-muted pull-right">Copyright &copy; {{ date('Y') }} </p>
            </div>
        </div>
    </div>
</footer>

{{
Assets::js([
    'https://code.jquery.com/jquery-1.12.4.min.js',
    vendor_url('dist/js/bootstrap.min.js', 'twbs/bootstrap'),
]);
}}

{{ $js or '' }}

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
