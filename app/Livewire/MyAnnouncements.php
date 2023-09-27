<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class MyAnnouncements extends Component
{

    public function destroy($id){
        Announcement::find($id)->delete();
    }

    public function render()
    {   
        $user = Auth::user();
        $revStatus = '';
        return view('livewire.my-announcements', compact('user'))->with('revStatus', $revStatus);
    }
}
