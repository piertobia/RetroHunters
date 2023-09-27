<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;



class PublicController extends Controller
{
    public function welcome() {
        $announcements= Announcement::where('is_accepted', true)->take(6)->orderBy('created_at', 'desc')->get();       
        return view('welcome', compact('announcements'));
    }

    public function categoryIndex(Category $category){
        return view ('announcement.categoryIndex', compact('category') );
    }

    public function userIndex(User $user){
        return view ('announcement.userIndex', compact('user') );
    }

    public function platformIndex(Request $request, Announcement $announcement){
        $platform = $announcement->platform;
        $announcements = Announcement::where('platform', $platform)->take(6)->orderBy('created_at', 'desc')->get();
        return view ('announcement.platformIndex', compact('announcements'))->with('platform', $platform);
    }

    public function team(){
        return view ('team');
    }

    public function searchAnnouncements(Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(6);
        return view('announcement.index', compact('announcements'));
    }

    public function setLanguage($lang){
        session()->put('locale',$lang);
        return redirect()->back();
    }

    public function testMail(){
        return view('mail.become_revisor');
    }
}
