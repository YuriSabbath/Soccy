<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class ComentController extends Controller
{
    //
    public function index(){
        $coment = 
            DB::table('coments')
            ->leftjoin('posts', 'coments.post_id', '=', 'posts.id')
            ->join('users', 'coments.user_id', '=', 'users.id')
            ->where('post_id', '=','id')
            ->get()
            ->take(20)
            ->reverse();

        //SELECT
        //*
        //FROM `coments`
        //LEFT JOIN `posts` ON `coments`.`post_id` = `posts`.`id` 
        //WHERE coments.post_id = posts.id

        return ["coment"=>$coment];
    }

    public function store (Request $request, $id){

        $coment = new Coment();
    
        $coment->coment = $request->coment;

        $post = Post::findOrFail($id);
        $coment->post_id = $post->id;

        $user = auth()->user();
        $coment->user_id = $user->id;
        
        $coment->save();

        return redirect('/post');
    }

    public function show($id){

        $coment = Coment::findOrFail($id);

        return view('auth.home', ['coment' => $coment]);
    }

    public function destroy($id){

        Coment::findOrFail($id)->delete();
        return redirect('/home');

    }
}

