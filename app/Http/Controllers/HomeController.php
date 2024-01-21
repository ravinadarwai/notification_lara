<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification; // Import the Notification facade;
use App\Notifications\WelcomeNotification; // Fix typo in the namespace
use App\Notifications\UserFollowNotification; // Fix typo in the namespace

use Illuminate\Http\Request;
use App\Models\user;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
//      $users=user::get();
// $post=[
//     'title'=>'post title',
//     'slug'=>'post-slug'
// ];
// foreach($users as$user){
//         $user->notify(new WelcomeNotification($post));
// }
//         dd('done');
  
          return  view('welcome');
    }

    public function notify(){
        // dd(auth()->user());

        if (auth()->user()) {

            $user = User::whereId(2)->first(); // Change to the correct model name
            auth()->user()->notify(new UserFollowNotification($user));
        }
    
        dd('done');
    }


    public function markasread($id){
        if($id){
            auth()->user()->unreadnotifications->where('id', $id)->markAsRead();
        }
        return back(); 
    }
}
