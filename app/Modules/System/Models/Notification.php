<?php
namespace App\Modules\System\Models;

use Nova\Database\ORM\Model;
use DB;

class Notification extends Model
{
    protected static function boot()
    {
        parent::boot();

        DB::statement("CREATE TABLE IF NOT EXISTS `".PREFIX."notifications` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `title` varchar(255) DEFAULT NULL,
        `assignedTo` int(11) DEFAULT NULL,
        `assignedFrom` int(11) DEFAULT NULL,
        `link` varchar(255) DEFAULT NULL,
        `seen` varchar(255) DEFAULT 'No',
        `created_at` datetime DEFAULT NULL,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) DEFAULT CHARSET=utf8;");
    }

    public function assignedFromUser()
    {
        return $this->hasOne('App\Modules\System\Models\User', 'id', 'assignedFrom');
    }

    public function assignedToUser()
    {
        return $this->hasOne('App\Modules\System\Models\User', 'id', 'assignedTo');
    }
}
