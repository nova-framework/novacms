<?php
namespace App\Controllers\Admin;

use App\Core\BackendController;
use App\Models\Menu;
use App\Models\Page;
use Input;
use Redirect;
use Validator;
use Str;

class Menus extends BackendController
{
	public function index()
	{
		$menus = Menu::paginate(25);
	    return $this->getView()->shares('title', 'Manage Menus')->withMenus($menus);
	}

	public function create()
	{
		return $this->getView()->shares('title', 'Create Menu');
	}

	public function store()
	{
	    $input = Input::only('title', 'type');

	    $validate = $this->validate($input);

	    if ($validate->passes()) {

	    	$tag = Str::slug($input['title']);

	    	//save
	    	$menu        = new Menu();
	    	$menu->title = $input['title'];
			$menu->type  = $input['type'];
	    	$menu->tag   = "[$tag]";
	    	$menu->save();

	    	return Redirect::to('admin/menus')->withStatus('Menu Created');
	    }

	    return Redirect::back()->withStatus($validate->errors(), 'danger')->withInput();

	}

	public function edit($id)
	{
		$menu = Menu::find($id);

		if ($menu === null) {
			return Redirect::to('admin/menus')->withStatus('Menu not found', 'danger');
		}

	 	return $this->getView()->shares('title', 'Edit Menu')->withMenu($menu);
	}

	public function update($id)
	{
		$menu = Menu::find($id);

		if ($menu === null) {
			return Redirect::to('admin/menus')->withStatus('Menu not found', 'danger');
		}

	    $input = Input::only('title', 'type');

	    $validate = $this->validate($input);

	    if ($validate->passes()) {

	    	$tag = Str::slug($input['title']);

	    	//save
	    	$menu->title = $input['title'];
	    	$menu->type  = $input['type'];
	    	$menu->tag   = "[$tag]";
	    	$menu->save();

	    	return Redirect::to('admin/menus')->withStatus('Menu Updated');
	    }

	    return Redirect::back()->withStatus($validate->errors(), 'danger')->withInput();
	}

	public function destroy($id)
	{
	    $menu = Menu::find($id);

		if ($menu === null) {
			return Redirect::to('admin/menus')->withStatus('Menu not found', 'danger');
		}

		$menu->delete();

		return Redirect::to('admin/menus')->withStatus('Menu Deleted');
	}

	public function manage($id)
	{
		$menu = Menu::find($id);

		if ($menu === null) {
			return Redirect::to('admin/menus')->withStatus('Menu not found', 'danger');
		}

		ob_start();
        ?>

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
              url: '/admin/menus/<?=$id;?>/manage',
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

        <?php
        $js = ob_get_clean();
		$pages = Page::all();

		return $this->getView()
		->shares('title', 'Manage Menu')
		->shares('js', $js)
		->withMenu($menu)
		->withPages($pages);
	}

	public function manageUpdate($id)
	{
    	//save
		$menu = Menu::find($id);

		if ($menu != null) {
	    	$menu->content = Input::get('content');
	    	$menu->save();
		}
	}

	protected function validate($data)
	{
		$rules = [
			'title' => 'required|min:3',
			'type' => 'required|min:3'
		];

		return Validator::make($data, $rules);
	}
}
