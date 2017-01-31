<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>File Manager</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=site_url('ckeditor/fm/');?>css/jquery-ui.css">
		<script type="text/javascript" src="<?=site_url('ckeditor/fm/');?>js/jquery.min.js"></script>
		<script type="text/javascript" src="<?=site_url('ckeditor/fm/');?>js/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=site_url('ckeditor/fm/');?>css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=site_url('ckeditor/fm/');?>css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="<?=site_url('ckeditor/fm/');?>js/elfinder.min.js"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script type="text/javascript" src="<?=site_url('ckeditor/fm/');?>js/i18n/elfinder.ru.js"></script>

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
	            url : '<?=site_url('ckeditor/fm/');?>php/connector.php',
	            getFileCallback : function(file) {
	                window.opener.CKEDITOR.tools.callFunction(funcNum, file);
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