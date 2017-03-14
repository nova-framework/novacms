@php
// Prepare the current User Info.
$user = Auth::user();
$sinceDate = $user->created_at->formatLocalized(__d('adminlite', '%d %b %Y, %R'));
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }} | {{ Config::get('app.name', SITETITLE) }}</title>
    {{ isset($meta) ? $meta : '' }}
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{
    Assets::css(array(
        // Bootstrap 3.3.5
        vendor_url('bootstrap/css/bootstrap.min.css', 'almasaeed2010/adminlte'),
        // Font Awesome
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        // Ionicons
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        // Theme style
        vendor_url('dist/css/AdminLTE.min.css', 'almasaeed2010/adminlte'),
        // AdminLTE Skins
        vendor_url('dist/css/skins/_all-skins.min.css', 'almasaeed2010/adminlte'),
        // Select2
        vendor_url('plugins/select2/select2.min.css', 'almasaeed2010/adminlte'),
        // Custom CSS
        theme_url('css/style.css', 'AdminLite'),
        theme_url('css/custom.css', 'AdminLite'),
        theme_url('nestable/nestable.css', 'AdminLite'),
    ));

    echo isset($css) ? $css : '';
    }}

<style>
.pagination {
    margin: 0;
}

.pagination > li > a, .pagination > li > span {
  padding: 5px 10px;
}
</style>

{{
    //Add Controller specific JS files.
    Assets::js(array(
        vendor_url('plugins/jQuery/jquery-2.2.3.min.js', 'almasaeed2010/adminlte'),
    ));
}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-{{ Config::get('app.color_scheme', 'blue'); }} sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ admin_url('dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">CP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{ __d('adminlite', 'Control Panel') }}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">{{ __d('adminlite', 'Toggle navigation') }}</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="margin-right: 10px;">

            <li id="notification_li">
                <span id="notificationcount"></span>
                <a href="#" id="notificationLink"><i class="fa fa-bullhorn"></i></a>

                <div id="notificationContainer">
                    <div id="notificationTitle">{{ __d('adminlite', 'Notifications') }}</div>
                    <div id="notificationsBody" class="notifications"></div>
                    <div id="notificationFooter"><a href="{{ admin_url('notifications') }}">{{ __d('adminlite', 'See All') }}</a></div>
                </div>
            </li>

            <li><a href='{{ site_url() }}'>{{ __d('adminlite', 'View Site') }}</a></li>

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ resource_url($user->imagePath) }}" class="user-image" alt="{{ __d('adminlite', 'User Image') }}">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ $user->username }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
                <li class="user-header">
                    <img src="{{ resource_url($user->imagePath) }}" class="img-circle" alt="{{ __d('adminlite', 'User Image') }}">

                    <p>
                        {{ $user->realname; }} - {{ $user->role->name; }}
                        <small>{{ __d('adminlite', 'Member since {0}', $sinceDate); }}</small>
                    </p>
                </li>

                <li class="user-footer">

                    <div class="pull-left">

                    <a href="{{ admin_url('users/profile') }}" class="btn btn-xs btn-default btn-flat"><i class="fa fa-user"></i> {{  __d('adminlite', 'Profile') }}</a>

                    <a href="{{ admin_url('users/'.$user->id.'/edit') }}" class="btn btn-xs btn-default btn-flat"><i class="fa fa-cog"></i> {{  __d('adminlite', 'My Settings') }}</a>

                    <a class="btn btn-xs btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> {{  __d('adminlite', 'Sign out') }}</a>
                    <form id="logout-form" action="{{ admin_url('logout') }}" method="post"></form>

                    </div>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            <li class="header">{{ __d('adminlite', 'Menu') }}</li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{ __d('adminlite', 'Core Administration') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if (isset($menuItems))
                        @foreach ($menuItems as $item)
                            <li {{ ($baseUri == 'admin/'.$item['uri']) ? 'class="active"' : '' }}><a href='{{ admin_url($item['uri']) }}'><i class='fa fa-{{ $item['icon'] }}'></i> <span> {{$item['title'] }}</span></a></li>
                        @endforeach
                    @endif
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{ __d('adminlite', 'Modules Administration') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if (isset($menuItemsModules))
                    @if (count($menuItemsModules) == 0)
                        <li><a href='#'>No Items</a></li>
                    @endif
                        @foreach ($menuItemsModules as $item)
                            <li {{ ($baseUri == 'admin/'.$item['uri']) ? 'class="active"' : '' }}><a href='{{ admin_url($item['uri']) }}'><i class='fa fa-{{ $item['icon'] }}'></i> <span> {{$item['title'] }}</span></a></li>
                        @endforeach
                    @endif
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{ __d('adminlite', 'System Administration') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if (isset($menuItemsSystem))
                        @foreach ($menuItemsSystem as $item)
                            <li {{ ($baseUri == 'admin/'.$item['uri']) ? 'class="active"' : '' }}><a href='{{ admin_url($item['uri']) }}'><i class='fa fa-{{ $item['icon'] }}'></i> <span> {{$item['title'] }}</span></a></li>
                        @endforeach
                    @endif
                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{ $content }}
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">

    <!-- To the right -->
    <div class="pull-right hidden-xs">
      @if(Config::get('app.debug'))
        <small><!-- DO NOT DELETE! - Profiler --></small>
      @endif
    </div>

    <!-- Default to the left -->
    <strong>Copyright &copy; {{ date('Y') }} <a href="http://www.novaframework.com/" target="_blank"><b>Nova Framework <?= $version; ?> / Kernel {{ VERSION }}</b></a> - </strong> All rights reserved.

  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
{{
Assets::js(array(
    // Bootstrap 3.3.5
    vendor_url('bootstrap/js/bootstrap.min.js', 'almasaeed2010/adminlte'),
    // AdminLTE App
    vendor_url('dist/js/app.min.js', 'almasaeed2010/adminlte'),
    // iCheck
    vendor_url('plugins/iCheck/icheck.min.js', 'almasaeed2010/adminlte'),
    vendor_url('plugins/select2/select2.full.min.js', 'almasaeed2010/adminlte'),
    theme_url('nestable/nestable.js', 'AdminLite'),
    site_url('ckeditor/ckeditor.js')
));

echo isset($js) ? $js : '';

echo isset($footer) ? $footer : '';
}}

<script>
//print function
function printDiv(divName) {
    var data=document.getElementById(divName).innerHTML;
    var myWindow = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    myWindow.document.write('<link href="<?=Config::get('app.url');?>templates/crm/assets/plugins/bootstrap/js/bootstrap.min.css" rel="stylesheet" type="text/css">');
    myWindow.document.write(data);
    myWindow.document.close(); // necessary for IE >= 10
    myWindow.onload=function(){ // necessary if the div contain images
        myWindow.focus(); // necessary for IE >= 10
        myWindow.print();
        myWindow.close();
    };
}

$(function () {
    {{ isset($jq) ? $jq : '' }}

    //Initialize Select2 Elements
    $(".select2").select2();

    //notifications menu
    function loadlinks(){
        //load count
        $("#notificationcount").load("{{ admin_url('notifications/getnotificationscount') }}");
    }

    loadlinks(); // This will run on page load
    /*setInterval(function(){
        loadlinks() // this will run after every 5 seconds
    }, 5000);*/

    $("#notificationLink").click(function(){
        //show window
        $("#notificationContainer").fadeToggle(300);
        //load notifications into the body
        $("#notificationsBody").load("{{ admin_url('notifications/getnotifications') }}");

        //update database
        $.ajax({url: "{{ admin_url('notifications/removenotificationscount') }}"});
        //remove from view
        $("#notification_count").fadeOut("slow");
        return false;
    });

    //make sure links are clickable.
    $("#notificationContainer").click(function(){
        //e.stopPropagation();
    });

    //Document Click hiding the popup
    $(document).click(function(){
      $("#notificationContainer").hide();
    });
});

CKEDITOR.editorConfig = function( config ) {
    config.filebrowserBrowseUrl = '{{ admin_url('files/plain') }}';
    config.baseHref = '{{ site_url() }}';

    if (
        this.name == 'image1' ||
        this.name == 'image2' ||
        this.name == 'image3'
    ) {
        config.toolbar = [
            { name: 'insert', items: [ 'Source', 'Sourcedialog','Image' ] }
        ];
    }
};
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
