<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= isset($browserTitle) ? $browserTitle : $title;?> | <?= Config::get('app.name'); ?></title>
<?php
echo isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone

Assets::css([
    vendor_url('dist/css/bootstrap.min.css', 'twbs/bootstrap'),
    vendor_url('dist/css/bootstrap-theme.min.css', 'twbs/bootstrap'),
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
    template_url('css/style.css', 'Default'),
]);

echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone
?>
</head>
<body>

<?= isset($afterBody) ? $afterBody : ''; // Place to pass data / plugable hook zone ?>

<div class="container">

    <div class='row'>

        <div class='col-md-3'>
            <p><img src='<?= template_url('images/nova.png', 'Default'); ?>' alt='<?= Config::get('app.name'); ?>' class='img-responsive'></p>
        </div>

        <div class='col-md-2 pull-right'>
            <?=GlobalBlocks::get('Phone Number', 'input');?>
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
                <?php echo GlobalBlocks::get('Header Nav','input');?>
            </div><!--/.nav-collapse -->
        </div>
    </div>

<div class="container">

    <div class='row'>

        <div class='col-md-2'>
            <?php
            if (isset($leftSidebars)) {
                foreach ($leftSidebars as $row) {
                    echo "<div class='widget $row->class'>";
                        echo "<div class='widgetTitle page-header'><h1>$row->title</h1></div>";
                        echo "<div class='widgetBody'>$row->content</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>

        <div class='col-md-8'>
            <?=$content;?>
            <?php
            if (isset($pageID)) {
                //echo PageBlocks::get($pageID, 'Social Media Info', 'textarea');
            }
            ?>
        </div>

        <div class='col-md-2'>
            <?php
            if (isset($rightSidebars)) {
                foreach ($rightSidebars as $row) {
                    echo "<div class='widget $row->class'>";
                        echo "<div class='widgetTitle page-header'><h1>$row->title</h1></div>";
                        echo "<div class='widgetBody'>$row->content</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>



</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row" style="margin: 15px 0 0;">
            <div class="col-lg-4">
                <p class="text-muted">Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.novaframework.com/" target="_blank"><b>Nova Framework <?= $version; ?> / Kernel <?= VERSION; ?></b></a>

                <?=GlobalBlocks::get('Footer', 'input');?>
                </p>
            </div>
            <div class="col-lg-8">
                <p class="text-muted pull-right">
                    <?php if(Config::get('app.debug')) { ?>
                    <small><!-- DO NOT DELETE! - Profiler --></small>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php
Assets::js([
    'https://code.jquery.com/jquery-1.12.4.min.js',
    vendor_url('dist/js/bootstrap.min.js', 'twbs/bootstrap'),
]);

echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone

echo isset($footer) ? $footer : ''; // Place to pass data / plugable hook zone
?>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
