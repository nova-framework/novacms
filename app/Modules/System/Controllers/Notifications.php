<?php
namespace App\Modules\System\Controllers;

use App\Core\BackendController;
use App\Modules\System\Models\Notification;
use Auth;

class Notifications extends BackendController
{
    public function index()
    {
        $notifications = Notification::where('assignedTo', Auth::user()->id)->paginate();

        return $this->getView()
            ->shares('title', 'Notifications')
            ->with('notifications', $notifications);
    }

    public function getNotificationsCount()
    {
        $number = Notification::where('assignedTo', Auth::user()->id)->where('seen', 'No')->count();
        if ($number > 0) {
            echo '<span id="notification_count">'.$number.'</span>';
        }
    }

    public function getNotifications()
    {
        $this->layout = null;
        $notifications = Notification::where('assignedTo', Auth::user()->id)->get();

        return $this->getView()->with('notifications', $notifications);
    }

    public function removeNotificationsCount()
    {
        Notification::where('assignedTo', Auth::user()->id)->update(['seen' => 'Yes']);
    }
}
