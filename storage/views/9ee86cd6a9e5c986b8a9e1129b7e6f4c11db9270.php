<div class='row'>

    <div class='col-md-2'>

        <?php if(isset($leftSidebars)): ?>
            <?php foreach($leftSidebars as $row): ?>
                <div class='widget <?php echo $row->class; ?>'>
                    <?php if($row->displayTitle == 'on'): ?>
                        <h1><div class='widgetTitle sidebartitle' id="st<?php echo $row->id; ?>" sid="<?php echo $row->id; ?>" contenteditable="true">
                            <?php echo $row->title; ?>

                        </div></h1>
                    <?php endif; ?>
                    <div class='widgetBody sidebarcontent' id="sc<?php echo $row->id; ?>" sid="<?php echo $row->id; ?>" contenteditable="true"><?php echo Sidebar::display($row->content); ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>

    <div class='col-md-8'>

        <div class='page' id="el1" col="pageTitle" contenteditable="true">
            <h1><?php echo $page->pageTitle; ?></h1>
        </div>

        <div class='page' id="el2" col="content" contenteditable="true">
            <?php echo $page->content; ?>

        </div>

        <?php if(isset($page->id)): ?>
            <?php /* echo PageBlocks::get($pageID, 'Social Media Info', 'textarea') */ ?>
        <?php endif; ?>

    </div>

    <div class='col-md-2'>
        <?php if(isset($rightSidebars)): ?>
            <?php foreach($rightSidebars as $row): ?>
                <div class='widget <?php echo $row->class; ?>'>
                    <?php if($row->displayTitle == 'on'): ?>
                        <div class='widgetTitle page-header'><h1><?php echo e($row->title); ?></h1></div>
                    <?php endif; ?>
                    <div class='widgetBody'><?php echo Sidebar::display($row->content); ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>

<script type="text/javascript">
$(document).ready(function() {

    /*CKEDITOR.disableAutoInline = true;

    $(".page" ).each(function( index ) {

        var content_id = $(this).attr('id');
        var col = $(this).attr('col');

        CKEDITOR.inline( content_id, {
            on: {
                blur: function( event ) {
                    var data    = event.editor.getData();
                    var request = jQuery.ajax({
                        url: "<?php echo site_url('page'); ?>",
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo ($csrfToken) ? $csrfToken : ''; ?>'
                        },
                        type: "POST",
                        data: {
                            content : data,
                            id : <?php echo $page->id; ?>,
                            col : col
                        },
                        dataType: "html"
                    });

                }
            }
        } );

    });

    $(".sidebartitle" ).each(function( index ) {

        var content_id = $(this).attr('id');
        var id = $(this).attr('sid');

        CKEDITOR.inline( content_id, {
            on: {
                blur: function( event ) {
                    var data    = event.editor.getData();
                    var request = jQuery.ajax({
                        url: "<?php echo site_url('sidebar'); ?>",
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo ($csrfToken) ? $csrfToken : ''; ?>'
                        },
                        type: "POST",
                        data: {
                            content : data,
                            id : id,
                            col : 'title'
                        },
                        dataType: "html"
                    });

                }
            }
        } );

    });

    $(".sidebarcontent" ).each(function( index ) {

        var content_id = $(this).attr('id');
        var id = $(this).attr('sid');

        CKEDITOR.inline( content_id, {
            on: {
                blur: function( event ) {
                    var data    = event.editor.getData();
                    var request = jQuery.ajax({
                        url: "<?php echo site_url('sidebar'); ?>",
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo ($csrfToken) ? $csrfToken : ''; ?>'
                        },
                        type: "POST",
                        data: {
                            content : data,
                            id : id,
                            col : 'content'
                        },
                        dataType: "html"
                    });

                }
            }
        } );

    });*/

});
</script>
