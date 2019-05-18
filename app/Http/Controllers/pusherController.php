<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Events\PusherEvent;

class pusherController extends Controller
{
            /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function send(){
        $user = User::find(Auth::id());
        $message = 'Hello world !';
        event(new PusherEvent($message,$user));
    }

     public function chat(){
        
        return view('listentBroadCast');
    }

}
