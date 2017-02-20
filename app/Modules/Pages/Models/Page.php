<?php
namespace App\Modules\Pages\Models;

use Nova\Database\ORM\Model;
use Nova\Database\ORM\SoftDeletingTrait;

class Page extends Model
{
	use SoftDeletingTrait;
}
