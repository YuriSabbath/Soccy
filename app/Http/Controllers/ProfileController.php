<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function index(){
        $post = 
            DB::table('users')
            ->leftjoin('posts', 'users.id', '=', 'posts.user_id')
            ->where('user_id', '=', auth()->id())
            ->get();

        //SELECT
        //*
        //FROM `users`
        //LEFT JOIN `posts` ON `users`.`id` = `posts`.`user_id` 
        //WHERE users.id = 1

        return ["post"=>$post];
    }

    public function show($id){
         //buscar pela medida
        $profile = User::findOrFail($id);
        $profile = User::where('id', $profile->id)->first();

        $post = 
            DB::table('posts')
            ->leftjoin('users', 'posts.user_id', '=', 'users.id')
            ->where('user_id', '=', $profile->id)
            ->get()
            ->take(4)
            ->reverse();

        $friends = 
            DB::table('user_follower')
            ->leftJoin('users', 'user_follower.following_id', '=', 'users.id')
            ->get()
            ->where('follower_id', '=', $profile->id);

        return view('auth.otherprofile', ['profile' => $profile, 'post' => $post, 'friends' => $friends
        ]);

    }
}
