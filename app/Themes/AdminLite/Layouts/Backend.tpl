<?php
/**
 * Backend Default Layout
 */

$siteName = Config::get('app.name', SITETITLE);

// Prepare the current User Info.
$user = Auth::user();
$sinceDate = $user->created_at->formatLocalized(__d('admin_lite', '%d %b %Y, %R'));

// Generate the Language Changer menu.
$langCode = Language::code();
$langName = Language::name();

$languages = Config::get('languages');

if (isset($user->image) && $user->image->exists()) {
    $imageUrl = resource_url('images/users/' .basename($user->image->path));
} else {
    $imageUrl = vendor_url('dist/img/avatar5.png', 'almasaeed2010/adminlte');
}

//
ob_start();

foreach ($languages as $code => $info) {
?>
<li class="header <?php if ($code == $langCode) { echo 'active'; } ?>">
    <a href='<?= site_url('language/' .$code); ?>' title='<?= $info['info']; ?>'><?= $info['name']; ?></a>
</li>
<?php
}

$langMenuLinks = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="<?= $langCode; ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?> | <?= $siteName; ?></title>
    <?= isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php
    Assets::css(array(
        // Font Awesome
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        // Ionicons
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        theme_url('plugins/bootstrap/css/bootstrap.min.css', 'AdminLite'),
        theme_url('plugins/toastr/toastr.css', 'AdminLite'),
        theme_url('plugins/bootstrap-switch/bootstrap-switch.min.css', 'AdminLite'),
        theme_url('plugins/bootstrap-tags/bootstrap-tagsinput.css', 'AdminLite'),
        theme_url('plugins/bootstrap-editable/editable.css', 'AdminLite'),
        theme_url('plugins/daterangepicker/daterangepicker-bs3.css', 'AdminLite'),
        theme_url('plugins/timepicker/bootstrap-timepicker.min.css', 'AdminLite'),
        theme_url('plugins/select2/select2.min.css', 'AdminLite'),
        theme_url('plugins/colorpicker/bootstrap-colorpicker.min.css', 'AdminLite'),
        theme_url('plugins/tablesorter/tablesorter.css', 'AdminLite'),
        theme_url('plugins/sweetalerts/sweetalert.css', 'AdminLite'),
        theme_url('plugins/fullcalendar/fullcalendar.css', 'AdminLite'),
        theme_url('plugins/conditionize/conditionize.css', 'AdminLite'),
        theme_url('plugins/dropzone/dropzone.css', 'AdminLite'),
        theme_url('plugins/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css', 'AdminLite'),

        // Theme style
        vendor_url('dist/css/AdminLTE.min.css', 'almasaeed2010/adminlte'),
        // AdminLTE Skins
        vendor_url('dist/css/skins/_all-skins.min.css', 'almasaeed2010/adminlte'),
        // Custom CSS
        theme_url('css/style.css', 'AdminLite'),
        theme_url('css/custom.css', 'AdminLite'),
        theme_url('plugins/nestable/nestable.css', 'AdminLite'),
    ));

    echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone
?>

<style>
.pagination {
    margin: 0;
}

.pagination > li > a, .pagination > li > span {
  padding: 5px 10px;
}
</style>

<?php
    //Add Controller specific JS files.
    Assets::js(array(
        vendor_url('bower_components/jquery/dist/jquery.min.js', 'almasaeed2010/adminlte'),
    ));

    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-{{ Config::get('app.color_scheme', 'blue'); }} sidebar-mini {{{ Session::get('sidebarState') }}}">

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ admin_url('dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">CP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{ __d('admin_lite', 'Control Panel') }}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" id='sidebarToggle' class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">{{ __d('admin_lite', 'Toggle navigation') }}</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="margin-right: 10px;">

            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-plus"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">{{ __d('admin_lite', 'Quick Create') }}</li>
                    <li>
                        <ul class="menu">
                            @if (isset($menuItemsQuickCreate))
                                @foreach ($menuItemsQuickCreate as $item)
                                    <li><a href='{{ admin_url($item['uri']) }}'><i class='fa fa-{{ $item['icon'] }}'></i> <span> {{$item['title'] }}</span></a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="dropdown language-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class='fa fa-language'></i> {{ $langName }}
                </a>
                <ul class="dropdown-menu">
                  {{ $langMenuLinks }}
                </ul>
            </li>

            <li><a href='{{ site_url() }}'>{{ __d('admin_lite', 'View Site') }}</a></li>

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{ resource_url($user->imagePath) }}" class="user-image" alt="{{ __d('admin_lite', 'User Image') }}">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ $user->username }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                    <li class="user-header">
                        <img src="{{ resource_url($user->imagePath) }}" class="img-circle" alt="{{ __d('admin_lite', 'User Image') }}">

                        <p>
                            {{ $user->realname; }} - {{ $user->role->name; }}
                            <small>{{ __d('admin_lite', 'Member since {0}', $sinceDate); }}</small>
                        </p>
                    </li>

                    <li class="user-footer">

                        <div class="pull-left">

                        <a href="{{ admin_url('users/profile') }}" class="btn btn-xs btn-default btn-flat"><i class="fa fa-user"></i> {{  __d('admin_lite', 'Profile') }}</a>

                        <a href="{{ admin_url('users/'.$user->id.'/edit') }}" class="btn btn-xs btn-default btn-flat"><i class="fa fa-cog"></i> {{  __d('admin_lite', 'My Settings') }}</a>

                        <a class="btn btn-xs btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> {{  __d('admin_lite', 'Sign out') }}</a>
                        <form id="logout-form" action="{{ admin_url('logout') }}" method="post"></form>

                        </div>
                    </li>
                </ul>
            </li>

            <li id="notification_li">
                <span id="notificationcount"></span>
                <a href="#" id="notificationLink"><i class="fa fa-bullhorn"></i></a>

                <div id="notificationContainer">
                    <div id="notificationTitle">{{ __d('admin_lite', 'Notifications') }}</div>
                    <div id="notificationsBody" class="notifications"></div>
                    <div id="notificationFooter"><a href="{{ admin_url('notifications') }}">{{ __d('admin_lite', 'See All') }}</a></div>
                </div>
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
        <ul class="sidebar-menu" data-widget="tree">

            <li class="header">{{ __d('admin_lite', 'Menu') }}</li>

            @if (isset($menuItems))
                @foreach ($menuItems as $item)
                    <li {{ ($baseUri == 'admin/'.$item['uri']) ? 'class="active"' : '' }}><a href='{{ admin_url($item['uri']) }}'><i class='fa fa-{{ $item['icon'] }}'></i> <span> {{$item['title'] }}</span></a></li>
                @endforeach
            @endif

            <li class="header">{{ __d('admin_lite', 'Modules Administration') }}</li>

            @if (isset($menuItemsModules))
            @if (count($menuItemsModules) == 0)
                <li><a href='#'><span>No Items</span></a></li>
            @endif
                @foreach ($menuItemsModules as $item)
                    <li {{ ($baseUri == 'admin/'.$item['uri']) ? 'class="active"' : '' }}><a href='{{ admin_url($item['uri']) }}'><i class='fa fa-{{ $item['icon'] }}'></i> <span> {{$item['title'] }}</span></a></li>
                @endforeach
            @endif

            @if ($user->hasRole('administrator'))
                <li class="header">{{ __d('admin_lite', 'System Administration') }}</li>
                @if (isset($menuItemsSystem))
                    @foreach ($menuItemsSystem as $item)
                        <li {{ ($baseUri == 'admin/'.$item['uri']) ? 'class="active"' : '' }}><a href='{{ admin_url($item['uri']) }}'><i class='fa fa-{{ $item['icon'] }}'></i> <span> {{$item['title'] }}</span></a></li>
                    @endforeach
                @endif
            @endif

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
<?php
Assets::js(array(
    theme_url('plugins/jquery/jquery.min.js', 'AdminLite'),
    theme_url('plugins/jqueryui/jqueryui.min.js', 'AdminLite'),
    theme_url('plugins/sweetalerts/sweetalert.min.js', 'AdminLite'),
    theme_url('plugins/bootstrap/js/bootstrap.min.js', 'AdminLite'),
    theme_url('plugins/bootstrap-switch/bootstrap-switch.min.js', 'AdminLite'),
    theme_url('plugins/bootstrap-editable/editable.min.js', 'AdminLite'),
    theme_url('plugins/bootstrap-hover/bootstrap-hover-dropdown.js', 'AdminLite'),
    theme_url('plugins/bootstrap-typehead/typehead.js', 'AdminLite'),
    theme_url('plugins/bootstrap-tags/bootstrap-tagsinput.min.js', 'AdminLite'),
    theme_url('plugins/tablednd/jquery.tablednd_0_5.js', 'AdminLite'),
    theme_url('plugins/slimScroll/jquery.slimscroll.min.js', 'AdminLite'),
    theme_url('plugins/fastclick/fastclick.min.js', 'AdminLite'),
    theme_url('plugins/prism/prism.js', 'AdminLite'),
    theme_url('plugins/moment/moment.min.js', 'AdminLite'),
    theme_url('plugins/datepicker/datepicker.js', 'AdminLite'),
    theme_url('plugins/daterangepicker/daterangepicker.js', 'AdminLite'),
    theme_url('plugins/select2/select2.full.min.js', 'AdminLite'),
    theme_url('plugins/colorpicker/bootstrap-colorpicker.min.js', 'AdminLite'),
    theme_url('plugins/tablesorter/jquery.tablesorter.js', 'AdminLite'),
    theme_url('plugins/justgage/justgage.1.0.1.min.js', 'AdminLite'),
    theme_url('plugins/conditionize/conditionize.js', 'AdminLite'),
    theme_url('plugins/fullcalendar/fullcalendar.min.js', 'AdminLite'),
    theme_url('plugins/pace/pace.min.js', 'AdminLite'),
    theme_url('plugins/slimScroll/jquery.slimscroll.min.js', 'AdminLite'),
    theme_url('plugins/toastr/toastr.min.js', 'AdminLite'),
    theme_url('plugins/dropzone/dropzone.js', 'AdminLite'),
    theme_url('plugins/jasny/jasny-bootstrap.min.js', 'AdminLite'),
    theme_url('plugins/nestable/nestable.js', 'AdminLite'),

    // AdminLTE App
    vendor_url('dist/js/adminlte.min.js', 'almasaeed2010/adminlte'),

    theme_url('js/scripts.js', 'AdminLite'),
    site_url('ckeditor/ckeditor.js'),
));

echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone

?>

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

    //notifications menu
    function loadlinks(){
        //load count
        $("#notificationcount").load("{{ admin_url('notifications/getnotificationscount') }}");
    }

    loadlinks(); // This will run on page load
    setInterval(function(){
        loadlinks() // this will run after every 5 seconds
    }, 5000);

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

    $('#sidebarToggle').on('click', function(e) {
        $.ajax({
            type: "POST",
            url: "{{ admin_url('dashboard/savestate') }}"
        });
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
