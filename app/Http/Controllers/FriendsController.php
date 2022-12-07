<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    //

    public function index(){

    $friends = 
    DB::table('user_follower')
    ->leftJoin('users', 'user_follower.following_id', '=', 'users.id')
    ->get()
    ->where('follower_id', '=', auth()->id());

    return ["friends"=>$friends];
    }
   
}
