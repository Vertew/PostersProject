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
        $this->user = User::find(Auth::id());
    }

    public function render()
    {
        return view('livewire.notification-form', ['user' => $this->user]);
    }
}
