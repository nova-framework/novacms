<?php
namespace App\Modules\Globalblocks\Controllers;

use App\Core\BackendController;
use App\Modules\System\Models\UserLog;

use DB;
use Input;
use Redirect;

class Admin extends BackendController
{
    public function index()
    {
        $blocks = DB::table('global_blocks')->get();
        return $this->getView()
        ->shares('title', 'Mange Global Blocks')
        ->withBlocks($blocks);
    }

    public function update()
    {
        $input = Input::only('id', 'content');

        if (is_array($input['id'])) {

            $i = 0;
            foreach($input['id'] as $id) {
                $content = $input['content'][$i];
                DB::table('global_blocks')->where('id', $id)->update(['content' => $content]);
                $i++;
            }
        }

        return Redirect::back()->withStatus('Global Blocks Updated');

    }

    public function destroy($id)
    {
        $block = DB::table('global_blocks')->where('id', $id)->first();

        if ($block === null) {
            return Redirect::back()->withStatus('Global block not found', 'danger');
        }

        DB::table('global_blocks')->where('id', $id)->delete();

        return Redirect::back()->withStatus('Global block Deleted');
    }

}
