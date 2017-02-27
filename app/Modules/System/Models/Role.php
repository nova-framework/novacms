<?php

namespace App\Modules\System\Models;

use Nova\Database\ORM\Model as BaseModel;


class Role extends BaseModel
{
    public function users()
    {
        return $this->hasMany('App\Modules\System\Models\User', 'role_id');
    }
}
