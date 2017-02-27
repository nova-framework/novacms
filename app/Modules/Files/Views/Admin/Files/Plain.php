<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>File Manager</title>

<?php
Assets::css(array(
    'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css',
    site_url('modules/files/assets/css/elfinder.min.css'),
    site_url('modules/files/assets/css/theme.css')
));
?>

<?php
Assets::js(array(
    site_url('vendor/almasaeed2010/adminlte/plugins/jQuery/jquery-2.2.3.min.js'),
    'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
    // site_url('modules/files/assets/js/elfinder.min.js'),
    site_url('modules/files/assets/js/elfinder.full.js')
));
?>

    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript" charset="utf-8">
        // Helper function to get parameters from the query string.
        function getUrlParam(paramName) {
            var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
            var match = window.location.search.match(reParam) ;
            
            return (match && match.length > 1) ? match[1] : '' ;
        }

        $().ready(function() {
            var funcNum = getUrlParam('CKEditorFuncNum');

            var elf = $('#elfinder').elfinder({
                url : '<?= site_url('admin/files/connector'); ?>',
                getFileCallback : function(file) {
                    window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                    window.close();
                },
                resizable: false
            }).elfinder('instance');
        });
    </script>
    </head>
    <body>

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>

    </body>
</html>