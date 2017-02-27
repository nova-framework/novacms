<!DOCTYPE html>
<html lang="<?php echo Language::code(); ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?> - <?php echo Config::get('app.name', SITETITLE); ?></title>

<?php echo isset($meta) ? $meta : ''; ?>


<?php echo Assets::css([
    vendor_url('dist/css/bootstrap.min.css', 'twbs/bootstrap'),
    vendor_url('dist/css/bootstrap-theme.min.css', 'twbs/bootstrap'),
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
    theme_url('css/style.css', 'Bootstrap'),
]); ?>


<?php echo isset($css) ? $css : ''; ?>


</head>
<body>

<div class="container">

    <div class='row'>

        <div class='col-md-3'>
            <p><img src='<?php echo theme_url('images/nova.png', 'Bootstrap'); ?>' alt='<?php echo Config::get('app.name'); ?>' class='img-responsive'></p>
        </div>

        <div class='col-md-2 pull-right'>
            <?php echo e(GlobalBlocks::get('Phone Number', 'input')); ?>

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
                <?php echo GlobalBlocks::get('Header Nav','input'); ?>

            </div><!--/.nav-collapse -->
        </div>
    </div>

<div class="container">

    <div class='row'>

        <div class='col-md-2'>

            <?php if(isset($leftSidebars)): ?>
                <?php foreach($leftSidebars as $row): ?>
                    <div class='widget <?php echo $row->class; ?>'>
                        <div class='widgetTitle page-header'><h1><?php echo e($row->title); ?></h1></div>
                        <div class='widgetBody'><?php echo $row->content; ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <div class='col-md-8'>
            <?php echo $content; ?>


            <?php if(isset($pageID)): ?>
                <?php /* echo PageBlocks::get($pageID, 'Social Media Info', 'textarea') */ ?>
            <?php endif; ?>

        </div>

        <div class='col-md-2'>
            <?php if(isset($rightSidebars)): ?>
                <?php foreach($rightSidebars as $row): ?>
                    <div class='widget <?php echo $row->class; ?>'>
                        <div class='widgetTitle page-header'><h1><?php echo $row->title; ?></h1></div>
                        <div class='widgetBody'><?php echo $row->content; ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>

</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row" style="margin: 15px 0 0;">
            <div class="col-lg-4">
                <?php echo GlobalBlocks::get('Footer', 'textarea'); ?>

            </div>
            <div class="col-lg-8">
                <p class="text-muted pull-right">Copyright &copy; <?php echo date('Y'); ?> </p>
            </div>
        </div>
    </div>
</footer>

<?php echo Assets::js([
    'https://code.jquery.com/jquery-1.12.4.min.js',
    vendor_url('dist/js/bootstrap.min.js', 'twbs/bootstrap'),
]);; ?>


<?php echo isset($js) ? $js : ''; ?>


<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
