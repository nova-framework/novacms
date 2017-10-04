<!DOCTYPE html>
<html lang="{{ Language::code() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ $meta or '' }}
    <title>{{ $title }} - {{ Config::get('app.name', SITETITLE) }}</title>

{{
Assets::css([
    vendor_url('dist/css/bootstrap.min.css', 'twbs/bootstrap'),
    vendor_url('dist/css/bootstrap-theme.min.css', 'twbs/bootstrap'),
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
    theme_url('css/style.css', 'Bootstrap'),
])
}}

{{ $css or '' }}

{{
Assets::js([
    'https://code.jquery.com/jquery-1.12.4.min.js',
    vendor_url('dist/js/bootstrap.min.js', 'twbs/bootstrap'),
    site_url('ckeditor/ckeditor.js'),
]);
}}

{{ $js or '' }}

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

    {{ $content }}

</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row" style="margin: 15px 0 0;">
            <div class="col-lg-4">
                {{ GlobalBlocks::get('Footer', 'textarea') }}
            </div>
            <div class="col-lg-8">
                <p class="text-muted pull-right">Copyright &copy; {{ date('Y') }} {{ Config::get('app.name', SITETITLE) }} </p>
            </div>
        </div>
    </div>
</footer>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
