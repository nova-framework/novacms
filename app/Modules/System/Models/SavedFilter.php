<?php
namespace App\Modules\System\Models;

use Nova\Database\ORM\Model;
use DB;

class SavedFilter extends Model
{
    protected static function boot()
    {
        parent::boot();

        DB::statement("CREATE TABLE IF NOT EXISTS `".PREFIX."saved_filters` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL DEFAULT '',
        `module` varchar(255) NOT NULL DEFAULT '',
        `filter` text NOT NULL DEFAULT '',
        `user_id` int(11) NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) DEFAULT CHARSET=utf8;");
    }
}
