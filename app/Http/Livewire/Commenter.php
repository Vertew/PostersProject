<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class Commenter extends Component
{



    public function render()
    {
        return view('livewire.commenter');
    }
}
