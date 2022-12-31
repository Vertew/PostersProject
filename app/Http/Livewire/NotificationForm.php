<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationForm extends Component
{
    public User $user;

    public function mark_read($id)
    {
        $notification = $this->user->unreadNotifications->find($id);
        $notification->markAsRead();
    }

    public function mark_all_read()
    {
        $this->user->unreadNotifications->markAsRead();
    }

    public function render()
    {
        $this->user = User::find(Auth::id());
        return view('livewire.notification-form', ['unreadNotifications' => $this->user->unreadNotifications->take(10)], 
        ['notif_count'=>$this->user->unreadNotifications->count()], ['user' => $this->user]);
    }
}
