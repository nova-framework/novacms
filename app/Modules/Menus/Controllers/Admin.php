<?php
namespace App\Modules\Menus\Controllers;

use App\Core\BackendController;
use App\Modules\Menus\Models\Menu;
use App\Modules\Pages\Models\Page;
use App\Modules\System\Models\UserLog;

use Auth;
use Input;
use Redirect;
use Validator;
use Str;

class Admin extends BackendController
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

        $validate = $this->validator($input);

        if ($validate->passes()) {

            $tag = Str::slug($input['title']);

            //save
            $menu        = new Menu();
            $menu->title = $input['title'];
            $menu->type  = $input['type'];
            $menu->tag   = "[$tag]";
            $menu->save();

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Created Menu: {$menu->title}.";
            $log->section = "menus";
            $log->link    = "admin/menus/{$menu->id}/edit";
            $log->refID   = $menu->id;
            $log->type    = 'Create';
            $log->save();

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

        $validate = $this->validator($input);

        if ($validate->passes()) {

            $tag = Str::slug($input['title']);

            //save
            $menu->title = $input['title'];
            $menu->type  = $input['type'];
            $menu->tag   = "[$tag]";
            $menu->save();

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Updated Menu: {$menu->title}.";
            $log->section = "menus";
            $log->link    = "admin/menus/{$menu->id}/edit";
            $log->refID   = $menu->id;
            $log->type    = 'Update';
            $log->save();

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

        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Deleted Menu: {$menu->title}.";
        $log->section = "menus";
        $log->refID   = $menu->id;
        $log->type    = 'Delete';
        $log->save();

        $menu->delete();

        return Redirect::to('admin/menus')->withStatus('Menu Deleted');
    }

    public function manage($id)
    {
        $menu = Menu::find($id);

        if ($menu === null) {
            return Redirect::to('admin/menus')->withStatus('Menu not found', 'danger');
        }

        $pages = Page::all();

        return $this->getView()
        ->shares('title', 'Manage Menu')
        ->with(compact('menu', 'pages'));
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

    protected function validator($data)
    {
        $rules = [
            'title' => 'required|min:3',
            'type' => 'required|min:3'
        ];

        return Validator::make($data, $rules);
    }
}
