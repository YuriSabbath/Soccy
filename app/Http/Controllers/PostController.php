<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Coment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){

        $post = Post::all();

        $search = request('search-post');

        if($search) {
            $post = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where([
                ['topico', 'like', '%'.$search."%"]
            ])->get()
            ->take(20)
            ->reverse();
            
        } else{


            //$post = Post::orderBy('id', 'desc')// post mais recentes
            //->take(4)//quantidade de post a serem mostrados
            //->get()
            //->reverse(); 

            $post = 
            DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->leftjoin('user_follower', 'users.id', '=', 'user_follower.following_id')
            ->where('follower_id', '=', auth()->id())
            ->orWhere('user_id', '=', auth()->id())
            ->get()
            ->take(20)
            ->reverse();
        }

        return ["post"=>$post];
    }


    public function store (Request $request){

        $post = new Post();

        $post->topico = $request->topico;
        $post->legenda = $request->legenda;

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extenssion = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extenssion;

            $requestImage->move(public_path('/images'), $imageName);

            $post->image = $imageName;
        }

        $user = auth()->user();
        $post->user_id = $user->id;

        $post->save();

        return redirect('/home');

    }

    public function destroy($id){

        Post::findOrFail($id)->delete();
        return redirect('/home');
    }

    public function show($id){
        $friendsController = new FriendsController();
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

        $friends = $friendsController->index()["friends"];

         //return view('auth.home', ['post' => $post]);
        return view('auth.otherprofile', ['profile' => $profile, 'post' => $post, 'friends' => $friends
        ]);
    }

    public function post(){

        $post = 
            DB::table('posts')
            ->leftjoin('users', 'posts.user_id', '=', 'users.id')
            ->where('user_id', '=', 'id')
            ->get()
            ->take(4)
            ->reverse();

            return ["post"=>$post];

    }
}
