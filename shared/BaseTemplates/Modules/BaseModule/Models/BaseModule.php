<?php
namespace App\Modules\BaseModuleController\Models;

use Nova\Database\ORM\Model;
use Nova\Database\ORM\SoftDeletingTrait;
use DB;

class BaseModuleModal extends Model
{
    use SoftDeletingTrait;

    public static function boot()
    {
        parent::boot();

        /*DB::statement('CREATE TABLE IF NOT EXISTS '.PREFIX.'tablename (
          `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
          `title` varchar(255) DEFAULT NULL,
          `created_at` datetime DEFAULT NULL,
          `updated_at` datetime DEFAULT NULL,
          `deleted_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1000 CHARSET=utf8');*/

    }
}
