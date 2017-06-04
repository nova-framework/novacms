<section class="content-header">
    <h1>Manage Menu Links</h1>
    <ol class="breadcrumb">
        <li><a href='<?= admin_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href='<?= admin_url('menus'); ?>'><i class="fa fa-book"></i> Menus</a></li>
        <li>Manage Menu: <?php echo $menu->title; ?></li>
    </ol>
</section>

<section class='content'>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Manage Menus</h3>
    </div>
    <div class="box-body">

        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Menu:</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav menubar"></ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

		<?=Session::getMessages();?>

        <div class='row'>

            <div class='col-md-4'>

                <br>
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-link"></i> Add Link</div>
                    <div class="panel-body">

                        <div class="panel-group" id="accordion">

                            <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                  Add Page
                                </a>
                              </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                              <div class="panel-body">

                                <form id='addpages' method='post'>

                                <div class="multiselect">
                                <input type="checkbox" id="selectpages"/> Select All<br>
                                <?php
                                    foreach($pages as $page){
                                        echo "<label><input type='checkbox' name='page[]' value='".Config::get('app.path').$page->slug."' data-title='$page->pageTitle' data-id='$page->id' class='checkbox1' /> $page->pageTitle</label><br>";
                                    }
                                ?>
                                </div>

                                <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Add to Menu</button>

                                </form>

                              </div>
                            </div>
                            </div>

                            <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                   Add Custom Link
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body">

                                <form id='addrow' method='post'>

                                    <div class="control-group">
                                        <label class="control-label" for='title'>Title</label>
                                        <input class="form-control" required id='title' type="text" name="title" value="" />
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for='slug'>Url</label>
                                        <input class="form-control" required id='slug' type="text" name="slug" value="" />
                                    </div>

                                    <p><br>
                                    <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Add to Menu</button>
                                    </p>

                                </form>

                              </div>
                            </div>
                            </div>

                        </div>



                    </div>
                </div>

            </div>

            <div class='col-md-8'>

                <div id="nestable-menu">
                    <button type="button" class="btn btn-default" data-action="expand-all"><i class="fa fa-plus"></i> Expand</button>
                    <button type="button" class="btn btn-default" data-action="collapse-all"><i class="fa fa-minus"></i> Collapse</button>
                    <button type="button" class="btn btn-danger" data-action="delete"><i class="fa fa-times"></i> Clear</button>
                </div>

                <div class="dd" id="nestable">
                    <ol class="dd-list outer"></ol>
                </div>

            </div>

        </div>

    </div>
</div>

</section>

<script>
$(function () {

var obj = '<?php if($menu->content != ''){ echo $menu->content; } else { echo '[]'; }?>';

//build drag and drop menu
$.each(JSON.parse(obj), function (index, item) {
    $('.outer').append(buildItem(item));
});

function buildNav(item,sublist) {

    if(item.children && sublist =='yes') {
        var html = "<li class='dropdown-submenu'><a href='" + item.slug + "' class='dropdown-toggle' data-toggle='dropdown'>" + item.title + "</a>";
    } else if(item.children && sublist !='yes') {
        var html = "<li class='dropdown'><a href='" + item.slug + "' class='dropdown-caret dropdown-toggle' data-toggle='dropdown'>" + item.title + " <b class='caret'></b></a>";
    } else {
        var html = "<li><a href='" + item.slug + "'>" + item.title + "</a>";
    }

    if (item.children) {
        html += "<ul class='dropdown-menu-right dropdown-menu'>";
        $.each(item.children, function (index, sub) {
            sublist = 'yes';
            html += buildNav(sub,sublist);
        });
        html += "</ul>";
    }

    html += "</li>";

    return html;
}

function buildItem(item) {

    var html = "<li class='dd-item dd3-item' data-id='" + item.id + "' data-title='" + item.title + "' data-slug='" + item.slug + "' id='" + item.id + "'>";
    html += "<div class='dd-handle dd3-handle'><i class='fa fa-server'></i></div>";
    html += "<div class='dd3-content' name='" + item.id + "'><span class='itemtitle'>" + item.title + "</span> <span class='pull-right'>page</span></div>";
    html += "<div class='dd3content' id='c-" + item.id + "'>";
        html += "<a href='#' class='remove'>remove</a>";
    html += "</div>";

    if (item.children) {
        html += "<ol class='dd-list'>";
        $.each(item.children, function (index, sub) {
            html += buildItem(sub);
        });
        html += "</ol>";
    }

    html += "</li>";

    return html;
}

//update drag and drop menu and navbar
var updateOutput = function(e)
{
    var list   = e.length ? e : $(e.target), output = list.data('output');
    var items = list.nestable('serialize');

    jsonobject = window.JSON.stringify(items);

    $.ajax({
      url: '<?=admin_url("menus/$menu->id/manage");?>',
      type: 'POST',
      data: { content: jsonobject}
    });

    //clear navbar
    $('.menubar').html('');

    //rebuild navbar
    $.each(JSON.parse(jsonobject), function (index, item) {
        $('.menubar').append(buildNav(item));
    });
};
// activate Nestable for list 1
$('#nestable').nestable({group: 1}).on('change', updateOutput);

// output initial serialised data
updateOutput($('#nestable'));

$('#nestable-menu').on('click', function(e){
  var action = $(e.target).data('action');
  if (action === 'expand-all') {
    $('.dd').nestable('expandAll');
  }
  if (action === 'collapse-all') {
    $('.dd').nestable('collapseAll');
    $('.dd3content:visible').slideUp();
  }
  if (action === 'delete') {
    $('.outer').html('');
    updateOutput($('#nestable'));
  }
});

//add row
$('#addrow').submit(function() {
    var title = $('#title').val();
    var slug = $('#slug').val();
    id = $.now();
    if(title !='' && slug !=''){
        $('ol.outer').append('<li class="dd-item dd3-item" data-title="'+title+'" data-slug="'+slug+'" data-id="'+id+'"><div class="dd-handle dd3-handle"><i class="fa fa-server"></i></div><div class="dd3-content" name="'+id+'">'+title+'<span class="pull-right">Custom Link</span></div><div id="c-'+id+'" class="dd3content"><a href="#" class="remove">remove</a></div></li>');
        updateOutput($('#nestable'));
    }
    //clear form
    $('#addrow').trigger('reset');
    return false;
});

$('#selectpages').click(function(event) {  //on click
    if(this.checked) { // check select status
        $('.checkbox1').each(function() { //loop through each checkbox
            this.checked = true;  //select all checkboxes with class "checkbox"
        });
    }else{
        $('.checkbox1').each(function() { //loop through each checkbox
            this.checked = false; //deselect all checkboxes with class "checkbox"
        });
    }
});

$('#addpages').submit(function() {

    $('input:checked.checkbox1').each(function () {
        var slug = $(this).val();
        var title = $(this).data('title');
        var pageid = $(this).data('id');
        id = $.now();
        if(title !='' && slug !=''){
            $('ol.outer').append('<li class="dd-item dd3-item" data-title="'+title+'" data-slug="'+slug+'" data-id="'+id+'" data-pageid="'+pageid+'"><div class="dd-handle dd3-handle"><i class="fa fa-server"></i></div><div class="dd3-content" name="'+id+'">'+title+'<span class="pull-right">Page</span></div><div id="c-'+id+'" class="dd3content"> <a href="#" class="remove">remove</a></div></li>');
            updateOutput($('#nestable'));
        }
    });

    //clear form
    $('#addpages').trigger('reset');
    return false;
});

//remove row
$('.outer').on('click', '.remove', function() {
    $(this).closest("li").fadeOut(300, function(){
        $(this).remove();
        updateOutput($('#nestable'));
    });
    return false;
});

$(".outer").delegate(".dd3-content", "click", function(){
  $('.dd3content:visible').slideUp();
  $('#c-'+$(this).attr('name')+':hidden').slideDown();
});

});
</script>
