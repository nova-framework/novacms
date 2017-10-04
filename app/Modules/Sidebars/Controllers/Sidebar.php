<?php
namespace App\Modules\Sidebars\Controllers;

use App\Controllers\BaseController as Controller;

use App\Modules\Sidebars\Models\Sidebar as Model;

use Auth;
use Input;

class Sidebar extends Controller
{
    public function updateAjax()
    {
        if (Auth::check()) {

            $input   = Input::all();

            //assign post data
            $id      = $input['id'];
            $col     = $input['col'];
            $content = $input['content'];

            //get page record
            $page    = Model::find($id);

            //update if not empty
            if ($page != null) {
                $page->{$col} = $content;
                $page->save();
            }
        }
    }
}
