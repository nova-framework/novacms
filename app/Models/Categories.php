<?php
namespace App\Models;

use Nova\Database\ORM\Model;
use Nova\Database\ORM\SoftDeletingTrait;

class Categories extends Model
{
	use SoftDeletingTrait;

    public function children()
	{
	    return $this->hasMany('App\Models\Categories', 'parent_id', 'id');
	}
}
