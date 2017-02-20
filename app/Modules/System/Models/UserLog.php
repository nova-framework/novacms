<?php
namespace App\Modules\System\Models;

use Nova\Database\ORM\Model;
use DB;

class UserLog extends Model
{
    protected static function boot()
    {
        parent::boot();

        DB::statement("CREATE TABLE IF NOT EXISTS `".PREFIX."user_logs` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `user_id` int(11) NOT NULL,
        `title` varchar(255) NOT NULL DEFAULT '',
        `link` varchar(255) NOT NULL DEFAULT '',
        `refID` int(11) DEFAULT NULL,
        `section` varchar(255) DEFAULT NULL,
        `type` varchar(255) DEFAULT 'View',
        `source` varchar(255) DEFAULT 'View',
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) DEFAULT CHARSET=utf8;");
    }

    public function user()
    {
        return $this->hasOne('App\Modules\System\Models\User', 'id', 'user_id');
    }
}
